<?php


namespace app\api\controller;
use think\Db;
use Redis;

class ticket extends Base{
    
    /*
     * z券自动释放
     */
    public function do_release(){

    	$redis = new Redis(); //实例化这个类
        $redis->connect('127.0.0.1',6379); //指定主机和端口进行连接

        // 自动清空交易所
        $this->clear_sell();
        $this->levelup();
        $last_time = date('Y-m-d 00:00:00',time()-24*60*60);
        $today_time = date('Y-m-d 00:00:00',time());
        //联表查询用户id  星级  当日z券获得量
        $today_get_ticket = M('ticket_change ticket_change')
                            ->join('team','ticket_change.ticket_change_user_id = team.user_id')
                            ->field('ticket_change.ticket_change_user_id,sum(ticket_change.ticket_change_number),team.star')
                            ->where("ticket_change.ticket_change_time > '$last_time' AND ticket_change.ticket_change_time < '$today_time' AND ticket_change.ticket_change_add = 1 AND ticket_change.ticket_id = 0")
                            ->group('ticket_change.ticket_change_user_id')
                            ->select();

       if (!empty($today_get_ticket)){
            //转json存入redis
            foreach ($today_get_ticket as $v){
                $arr = array($v['sum(ticket_change.ticket_change_number)'],$last_time,$v['star']);
                $json = json_encode($arr);
                $redis->lpush($v['ticket_change_user_id'], $json); //设置键值对
            }
        }     
//获取所有用户id
        $all_user_id = M('users')
            ->field('user_id')
            ->select();

        //获取所有用户需要释放的队列
        foreach ($all_user_id as $v){
            $arr1[$v['user_id']] = $redis->lrange($v['user_id'],0,-1); //设置键值对
        }
        //获取有效用户释放数据
        $all_user_content = array_filter($arr1);
        //开始释放
        foreach($all_user_content as $k=>$v){
            $user_id = $k;  //用户id

            foreach ($v as $value){
                $number = json_decode($value)[0];  //z券获取数量
                $star = json_decode($value)[2]; // 用户星级
                $time = strtotime(json_decode($value)[1]); // z券获取时间 时间戳
                $today_time = strtotime(date('Y-m-d 00:00:00',time())); //今日时间戳
                $day = ($today_time - $time)/24/60/60;
                if ($star == 0 ){
                    $num = $number*0.01; //z券每天释放的量
                    if ($day==100){             //释放超过100天 从队列中弹出
                        $redis->rpop($user_id);
                    }
                }
                if ($star == 1 ){
                    $num = $number*0.015; //z券每天释放的量
                    if ($day==67){
                        $num = $number*0.01;
                        $redis->rpop($user_id);
                    }
                }
                if ($star == 2 ){
                    $num = $number*0.02; //z券每天释放的量
                    if ($day==50){             //释放超过100天 从队列中弹出
                        $redis->rpop($user_id);
                    }
                }
                if ($star == 3 ){
                    $num = $number*0.025; //z券每天释放的量
                    if ($day=40){             //释放超过100天 从队列中弹出
                        $redis->rpop($user_id);
                    }
                }
                if ($star == 4 ){
                    $num = $number*0.03; //z券每天释放的量
                    if ($day=34){             //释放超过100天 从队列中弹出
                        $num = $number*0.01;
                        $redis->rpop($user_id);
                    }
                }
                if ($star == 5 ){
                    $num = $number*0.035; //z券每天释放的量
                    if ($day==29){             //释放超过100天 从队列中弹出
                        $num = $number*0.02; //z券每天释放的量
                        $redis->rpop($user_id);
                    }
                }
                if ($star >= 6 ){
                    $num = $number*0.04; //z券每天释放的量
                    if ($day==25){             //释放超过100天 从队列中弹出
                        $redis->rpop($user_id);
                    }
                }
                Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>0])->setDec('ticket_number', $num);
                Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>1])->setInc('ticket_number', $num*0.4);
                Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>2])->setInc('ticket_number', $num*0.3);
                Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>3])->setInc('ticket_number', $num*0.2);
                Db::name('ticket_sell')->insert(['sell_user_id'=>$user_id,'sell_number'=>$num*0.1,'sell_time'=>date('Y-m-d H:i:s')]);
                $insert_arr[] = array(          //z券减少
                    'ticket_change_user_id'=> $user_id,  //用户id
                    'ticket_id'            => 0,         //券种类 0为z券
                    'ticket_change_number' => $num,      //变化量
                    'ticket_change_add'    => 0,         //增减  0为减
                    'ticket_change_type'   => 3,         // 变化原因  3为自动释放
                    'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );
                $insert_arr[] = array(          //注册券增加
                    'ticket_change_user_id'=> $user_id,  //用户id
                    'ticket_id'            => 1,         //券种类 1为注册券
                    'ticket_change_number' => $num*0.4,      //变化量
                    'ticket_change_add'    => 1,         //增减  1为增
                    'ticket_change_type'   => 3,         // 变化原因  3为自动释放
                    'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );
                $insert_arr[] = array(          //消费券增加
                    'ticket_change_user_id'=> $user_id,  //用户id
                    'ticket_id'            => 2,         //券种类 2为消费券
                    'ticket_change_number' => $num*0.3,      //变化量
                    'ticket_change_add'    => 1,         //增减  1为增
                    'ticket_change_type'   => 3,         // 变化原因  3为自动释放
                    'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );
                $insert_arr[] = array(          //可用券增加
                    'ticket_change_user_id'=> $user_id,  //用户id
                    'ticket_id'            => 3,         //券种类 3为可用券
                    'ticket_change_number' => $num*0.2,      //变化量
                    'ticket_change_add'    => 1,         //增减  1为增
                    'ticket_change_type'   => 3,         // 变化原因  3为自动释放
                    'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );
                $insert_arr[] = array(          //挂售券增加
                    'ticket_change_user_id'=> $user_id,  //用户id
                    'ticket_id'            => 4,         //券种类 4为挂售券
                    'ticket_change_number' => $num*0.1,      //变化量
                    'ticket_change_add'    => 1,         //增减  1为增
                    'ticket_change_type'   => 3,         // 变化原因  3为自动释放
                    'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );
                $insert_arr[] = array(          //挂售券减少
                    'ticket_change_user_id'=> $user_id,  //用户id
                    'ticket_id'            => 4,         //券种类 4为挂售券
                    'ticket_change_number' => $num*0.1,      //变化量
                    'ticket_change_add'    => 0,         //增减  1为增
                    'ticket_change_type'   => 9,         // 变化原因  3为自动挂售消耗
                    'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );

            }
        }
            $db = Db::name('ticket_change')->insertAll($insert_arr);
            

    }
    /*
     * 清空交易所
     */
    public function clear_sell(){
        $last_time = date('Y-m-d 00:00:00',time()-24*60*60);
        $today_time = date('Y-m-d 00:00:00',time());
        //查询昨日系统释放出的未被购买的挂售券
        $sell_all = M('ticket_sell')
            ->field('sell_id,sell_user_id,sell_number')
            ->where("sell_time > '$last_time' AND sell_time < '$today_time' AND on_sell = 1")
            ->select();
        if(!empty($sell_all)){
            //循环进行系统自动回收
            foreach ($sell_all as $v){
                Db::name('ticket_sell')->where(['sell_id'=>$v['sell_id'],'on_sell'=>1])->save(array('sell_buy_id'=>'','sell_time'=>date('Y-m-d H:i:s',time()),'sell_money'=>0.1*$v['sell_number'],'on_sell'=>2));
                Db::name('ticket_hold')->where(['user_id'=>$v['sell_user_id'],'ticket_id'=>5])->setInc('ticket_number', 0.1*$v['sell_number']);
                $insert_arr[] = array(          //挂售券增加
                    'ticket_change_user_id'=> $v['sell_user_id'],  //用户id
                    'ticket_id'            => 5,         //券种类 4为挂售券
                    'ticket_change_number' => $v['sell_number']*0.1,      //变化量
                    'ticket_change_add'    => 1,         //增减  1为增
                    'ticket_change_type'   => 6,         // 变化原因  3为自动释放
                    'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );
            }
            Db::name('ticket_change')->insertAll($insert_arr);
        }
    }
    /*
     * 星级升级
     */
    public function levelup(){
        $user_id = Db::name('team')->where("team_lirun!=0")->field('user_id,team_lirun,star')->select();
        foreach ($user_id as $v){

            $star = 0;
            if ($v['team_lirun']>10000){
                $star = $this->star($v['team_lirun']);

            }
            if ($star != $v['star']){
                $user_id = $v['user_id'];
                Db::name('team')->where("user_id = $user_id")->save(['star'=> $star]);
            }
        }
    }

    public function star($number){
        $num = 10000;
        $star = 0;
        for ($i = 0;$i<=15;$i++){
            if ($number<$num){
                $star = $i-1;
                break;
            }
            $num = $num*3;
        }
        return $star;
    }




    //查找所有父id
    public function get_all_parents_id($id,$array = array()){
        $parent_id = Db::name('team')->where(['user_id'=>$id])->field('parent_id,user_id')->select();
        if (!empty($parent_id[0]['parent_id'])){
            if (!in_array($parent_id[0]['parent_id'],$array)){
                $array[] = $parent_id[0]['parent_id'];
            }
            if (!in_array($parent_id[0]['user_id'],$array)){
                $array[] = $parent_id[0]['user_id'];
            }
                $array =  $this->get_all_parents_id($parent_id[0]['parent_id'],$array);
        }
        return $array;
    }



    public function erdaishouyi($zquan,$xiauser_id){
        $user_id = Db::name('users')->where(array('user_id'=>$xiauser_id))->field('parent_userid')->select()[0]['parent_userid'];
        if (!empty($user_id)){
            Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>5])->setInc('ticket_number', $zquan*0.1*0.02);
            $insert_arr[] = array(          //挂售券增加
                'ticket_change_user_id'=> $user_id,  //用户id
                'ticket_id'            => 5,         //券种类 4为挂售券
                'ticket_change_number' => $zquan*0.1*0.02,      //变化量
                'ticket_change_add'    => 1,         //增减  1为增
                'ticket_change_type'   => 12,         // 变化原因  10为一代用户对冲消耗注册券
                'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
            );
            $parent_id = Db::name('users')->where(array('user_id'=>$user_id))->field('parent_userid')->select()[0]['parent_userid'];
            if (!empty($parent_id)){
                Db::name('ticket_hold')->where(['user_id'=>$parent_id,'ticket_id'=>5])->setInc('ticket_number', $zquan*0.1*0.08);
                $insert_arr[] = array(          //挂售券增加
                    'ticket_change_user_id'=> $parent_id,  //用户id
                    'ticket_id'            => 5,         //券种类 4为挂售券
                    'ticket_change_number' => $zquan*0.1*0.08,      //变化量
                    'ticket_change_add'    => 1,         //增减  1为增
                    'ticket_change_type'   => 13,         // 变化原因  10为一代用户对冲消耗注册券
                    'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );
            }
        }
        if (!empty($insert_arr)){
            Db::name('ticket_change')->insertAll($insert_arr);
            return true;
        }
    }
    public function duichong($zquan,$xiaji_id){
        $user_id = Db::name('users')->where(array('user_id'=>$xiaji_id))->field('parent_userid')->select()[0]['parent_userid'];
        $zhuce = $zquan*0.04;
        $zhuce1 = Db::name('ticket_hold')->where(array('user_id'=>$user_id,'ticket_id'=>1))->field('ticket_number')->select()[0]['ticket_number'];
        if ($zhuce1 > $zhuce){
            Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>1])->setDec('ticket_number',$zhuce);
            Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>5])->setInc('ticket_number', $zhuce);
            $insert_arr[] = array(          //挂售券增加
                'ticket_change_user_id'=> $user_id,  //用户id
                'ticket_id'            => 1,         //券种类 4为挂售券
                'ticket_change_number' => $zhuce,      //变化量
                'ticket_change_add'    => 0,         //增减  1为增
                'ticket_change_type'   => 10,         // 变化原因  10为一代用户对冲消耗注册券
                'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
            );
            $insert_arr[] = array(          //挂售券增加
                'ticket_change_user_id'=> $user_id,  //用户id
                'ticket_id'            => 5,         //券种类 4为挂售券
                'ticket_change_number' => $zhuce*0.1,      //变化量
                'ticket_change_add'    => 1,         //增减  1为增
                'ticket_change_type'   => 11,         // 变化原因  10为一代用户对冲增加余额券
                'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
            );
            return true;
        }
        return false;
    }
    public function tuanduishouyi($zquan,$user_id){
        $parents = Db::name('team')->where(array('user_id'=>$user_id))->field('parent_id,star')->select()[0];
        if (empty($parents)){
            return true;
        }
        if ($parents['star']!== 0){
            if (!empty($parents['parent_id'])){
                $parent = array(
                    $parents['star']=> $user_id,
                    'a'=>$parents['parent_id']
                );
            }else{
                $parent = array();
            }
        }
        $array = $this->get_parent_info($parents['parent_id'],$parent);

        if (empty($array)){
            return true;
        }
        $key = array_keys($array);
        $value = array_values($array);
        for ($i = 0;$i < count($key);$i++){
            if ($i==0){
                $cha[0] = $key[0];
                continue;
            }
            $cha[$i] = $key[$i]-$key[$i-1];
        }
        for ($i = 0;$i < count($key);$i++){
            $bili[$value[$i]] = $cha[$i]*0.01;
        }
        foreach($bili as $k => $v){
            Db::name('ticket_hold')->where(['user_id'=>$k,'ticket_id'=>5])->setInc('ticket_number', $v*$zquan*0.1);
            $insert_arr[] = array(          //挂售券增加
                'ticket_change_user_id'=> $k,  //用户id
                'ticket_id'            => 5,         //券种类 4为挂售券
                'ticket_change_number' => $v*$zquan*0.1,      //变化量
                'ticket_change_add'    => 1,         //增减  1为增
                'ticket_change_type'   => 15,         // 变化原因  10为一代用户对冲消耗注册券
                'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
            );
        }
        Db::name('ticket_change')->insertAll($insert_arr);
        return true;
    }
    
    public function get_parent_info($user_id,$array = array()){
        $parents = Db::name('team')->where(array('user_id'=>$user_id))->field('parent_id,star')->select()[0];
        if (!isset($array[$parents['star']])){
            if ($parents['star']!==0){
                $array[$parents['star']] = $user_id;
            }
        }
            if (isset($array['a'])){
                if (!empty($array[$parents['star']])&&$parents['star']!==0){
                    unset($array['a']);
                    $array[$parents['star']] = $user_id;
                }
            }

        if ($parents['parent_id']==NULL){
            $array[$parents['star']] = $user_id;
        }
        if (!empty($parents['parent_id'])){
            $array = $this->get_parent_info($parents['parent_id'],$array);
        }
        return $array;
    }

    public function team_add($zquan,$user_id){
        $res = Db::name('team')->where(array('user_id'=>$user_id))->setInc('lirun_number',$zquan*0.1);
        $arr = $this->get_all_parents_id($user_id);
        foreach ($arr as $v){
            Db::name('team')->where(array('user_id'=>$v))->setInc('team_lirun',$zquan*0.1);
        }
        if ($res){
            return true;
        }else{
            return false;
        }
    }
}
