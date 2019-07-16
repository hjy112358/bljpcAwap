<?php

namespace app\ticket\controller;


use http\Env\Url;
use think\Db;

class Ticket extends Base {
    public function index(){
        return $this->fetch();
    }

    public function login(){
        return $this->fetch();
    }

    public function login_do(){
        $username = I('username');
        $password = I('password');

        if (empty($username)||empty($password)){
            echo  4;die;
        }
        $user = Db::name('admin_user')->where(['admin_user_name' => $username])->select();
        if (empty($user)){
            echo 3;die;
        }
        $admin_password = $user[0]['admin_user_password'];
        if ($admin_password != $password){
            echo 2;die;
        }
        session('admin_user_id',$user[0]['admin_user_id']);
        return 1;
    }

    public function CouponManage(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $zcoupon = $this->getchangetype(0);
        $zhuce     = $this->getchangetype(1);
        $xiaofei     = $this->getchangetype(2);
        $wanyong     = $this->getchangetype(3);
        $guashou     = $this->getchangetype(4);
        $yue     = $this->getchangetype(5);

        $all_zcoupon = Db::name('ticket_hold')
            ->where("ticket_id = 0")
            ->field('SUM(ticket_number)')
            ->select()[0] ["SUM(ticket_number)"];
        $all_zhuce = Db::name('ticket_hold')
            ->where("ticket_id = 1")
            ->field('SUM(ticket_number)')
            ->select()[0] ["SUM(ticket_number)"];
        $all_xiaofei = Db::name('ticket_hold')
            ->where("ticket_id = 2")
            ->field('SUM(ticket_number)')
            ->select()[0] ["SUM(ticket_number)"];
        $all_wanyong = Db::name('ticket_hold')
            ->where("ticket_id = 3")
            ->field('SUM(ticket_number)')
            ->select()[0] ["SUM(ticket_number)"];
        $all_guashou = Db::name('ticket_hold')
            ->where("ticket_id = 4")
            ->field('SUM(ticket_number)')
            ->select()[0] ["SUM(ticket_number)"];
        $all_yue = Db::name('ticket_hold')
            ->where("ticket_id = 5")
            ->field('SUM(ticket_number)')
            ->select()[0] ["SUM(ticket_number)"];
        $all_sell = Db::name('ticket_sell')
            ->where("on_sell = 1")
            ->field('SUM(sell_number)')
            ->select()[0] ["SUM(sell_number)"];
        $all_lirun = intval(round($all_zcoupon *$ticket_price+$all_zhuce+ $all_xiaofei*$ticket_price+ $all_wanyong*$ticket_price+ $all_guashou*$ticket_price+ $all_sell+ $all_yue));
        $this->assign('zcoupon',json_encode($zcoupon));
        $this->assign('zhuce',json_encode($zhuce));
        $this->assign('xiaofei',json_encode($xiaofei));
        $this->assign('wanyong',json_encode($wanyong));
        $this->assign('guashou',json_encode($guashou));
        $this->assign('yue',json_encode($yue));
        $this->assign('all_lirun',$all_lirun);
        return $this->fetch();
    }





    public function getchangetype($ticket_id){
        $today_time = date('Y-m-d 00:00:00',time());
        $change = Db::name('ticket_change')
            ->alias('a')
            ->join('users b','b.user_id = a.ticket_change_user_id','left')
            ->where("ticket_change_time> '$today_time' AND ticket_id = $ticket_id")
            ->field('b.user_id,b.nickname,b.mobile,a.ticket_change_number,a.ticket_change_time,a.ticket_change_type')
            ->order('a.ticket_change_time desc')
            ->select();
        $type_arr = array(
            "1"=> "购买商品获得z券",
            "2"=> "后台添加获得z券",
            "3"=>  "后台自动释放消耗",
            "4"=>  "交易产生增或减",
            "5"=>  "推荐用户消费",
            "6"=>  "自动挂售获得",
            "7"=>  "交易所出售获得",
            "8"=>  "交易所购买消耗",
            "9"=>  "自动挂售消耗",
            "10"=>  "一代消费对冲注册券",
            "11"=>  "一代消费对冲余额",
            "12"=>  "一代消费返利",
            "13"=>  "二代消费返利",
            "14"=>  "使用余额购买商品",
            "15"=>  "团队收益获得",
            "16"=>  "充值",
        );
        foreach($change as $k => $v){
            $change[$k]['ticket_change_type'] = $type_arr[$v['ticket_change_type']];
        }
        return $change;
    }
    public function console(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $all_zcoupon = $this->get_ticket_all();
        $all_zhuce   = $this->get_ticket_all(1);
        $all_xiaofei = $this->get_ticket_all(2);
        $all_wanyong = $this->get_ticket_all(3);
        $all_guashou = $this->get_ticket_all(4);
        $all_yue     = $this->get_ticket_all(5);
        $all_sell    = Db::name('ticket_sell')
                    ->where("on_sell = 1")
                    ->field('SUM(sell_number)')
                    ->select()[0] ["SUM(sell_number)"];
        //总利润
        $all_lirun = intval(round($all_zcoupon *$ticket_price+$all_zhuce+ $all_xiaofei*$ticket_price+ $all_wanyong*$ticket_price+ $all_guashou*$ticket_price+ $all_sell+ $all_yue));


        $zcoupon_change = $this->get_ticket_change();
        $zhuce_change   = $this->get_ticket_change(1);
        $xiaofei_change   = $this->get_ticket_change(2);
        $wanyong_change   = $this->get_ticket_change(3);
        $guashou_change   = $this->get_ticket_change(4);
        $yue_change   = $this->get_ticket_change(5);

        if ($zcoupon_change >0){
            $zcoupon_change = '<span style="color:#06f306">+'.intval(round($zcoupon_change)).'</span>';
        }else{
            $zcoupon_change = '<span style="color:#ff4c4c">'.intval(round($zcoupon_change)).'</span>';
        }

        if ($zhuce_change >0){
            $zhuce_change = '<span style="color:#06f306">+'.intval(round($zhuce_change)).'</span>';
        }else{
            $zhuce_change = '<span style="color:#ff4c4c">'.intval(round($zhuce_change)).'</span>';
        }

        if ($xiaofei_change >0){
            $xiaofei_change = '<span style="color:#06f306">+'.intval(round($xiaofei_change)).'</span>';
        }else{
            $xiaofei_change = '<span style="color:#ff4c4c">'.intval(round($xiaofei_change)).'</span>';
        }

        if ($wanyong_change >0){
            $wanyong_change = '<span style="color:#06f306">+'.intval(round($wanyong_change)).'</span>';
        }else{
            $wanyong_change = '<span style="color:#ff4c4c">'.intval(round($wanyong_change)).'</span>';
        }

        if ($guashou_change >0){
            $guashou_change = '<span style="color:#06f306">+'.intval(round($guashou_change)).'</span>';
        }else{
            $guashou_change = '<span style="color:#ff4c4c">'.intval(round($guashou_change)).'</span>';
        }

        if ($yue_change >0){
            $yue_change = '<span style="color:#06f306">+'.intval(round($yue_change)).'</span>';
        }else{
            $yue_change = '<span style="color:#ff4c4c">'.intval(round($yue_change)).'</span>';
        }
        $all_coupon =array(
                        array(
                            'ticket_name'     => 'Z券',
                            'all_number'    => intval(round($all_zcoupon)),
                            'ticket_change' => $zcoupon_change,
                        ),
                        array(
                            'ticket_name'     => '注册券',
                            'all_number'    => intval(round($all_zhuce)),
                            'ticket_change' => $zhuce_change,
                        ),
                        array(
                            'ticket_name'     => '消费券',
                            'all_number'    => intval(round($all_xiaofei)),
                            'ticket_change' => $xiaofei_change,
                        ),
                        array(
                            'ticket_name'     => '万用券',
                            'all_number'    => intval(round($all_wanyong)),
                            'ticket_change' => $wanyong_change,
                        ),
                        array(
                            'ticket_name'     => '挂售券',
                            'all_number'    => intval(round($all_guashou)),
                            'ticket_change' => $guashou_change,
                        ),
                        array(
                            'ticket_name'     => '余额',
                            'all_number'    => intval(round($all_yue)),
                            'ticket_change' => $yue_change,
                        )
                     );
        $ticket_price = array(
            array(
                'name'   => 'Z券',
                'value' => intval(round($all_zcoupon*$ticket_price)),
            ),
            array(
                'name'   => '注册券',
                'value' => intval(round($all_zhuce)),
            ),
            array(
                'name'   => '消费券',
                'value' => intval(round($all_xiaofei*$ticket_price)),
            ),
            array(
                'name'   => '万用券',
                'value' => intval(round($all_wanyong*$ticket_price)),
            ),
            array(
                'name'   => '挂售券',
                'value' => intval(round($all_guashou*$ticket_price)),
            ),
            array(
                'name'   => '余额券',
                'value' => intval(round($all_yue)),
            )
        );
        $this->assign('ticket_price',json_encode($ticket_price));
        $this->assign('all_lirun',$all_lirun);
        $this->assign('all_coupon',$all_coupon);
        return $this->fetch();
    }
    public function form(){
        $ticket_price_change = Db::name('coupon_price_change')
            ->select();
        $now = Db::name('coupon_price')->where('id = 1')->select()[0]['coupon_price'] ;
        $this->assign('now',$now);
        $this->assign('ticket_price_change',json_encode($ticket_price_change));
        return $this->fetch();
    }
    public function get_ticket_all($ticket_id = 0){
        $all_coupon = Db::name('ticket_hold')
                ->where("ticket_id = $ticket_id")
                ->field('SUM(ticket_number)')
                ->select()[0] ["SUM(ticket_number)"];
        return $all_coupon;
    }
    public function get_ticket_change($ticket_id = 0){
        $today_time = date('Y-m-d 00:00:00',time());
        $ticket_change_1 = Db::name('ticket_change')
            ->where("ticket_change_add = 1 AND ticket_change_time>'$today_time' AND ticket_id = $ticket_id")
            ->field('SUM(ticket_change_number)')
            ->select()[0] ["SUM(ticket_change_number)"];
        $ticket_change_0 = Db::name('ticket_change')
            ->where("ticket_change_add = 0 AND ticket_change_time>'$today_time' AND ticket_id = $ticket_id")
            ->field('SUM(ticket_change_number)')
            ->select()[0] ["SUM(ticket_change_number)"];
        $ticket_change = $ticket_change_1 - $ticket_change_0;
        return $ticket_change;
    }
    public function form_do(){
        $price = I('price');
        $pwd   = I('pwd');
        if ($pwd != '123456'){
            echo 2;
            exit;
        }
        $patt1 = '/^\d+$/';
        $patt2 = '/^\d+\.\d+$/';
        if($price==''){
            echo 3;
            exit;
        }
        if (!preg_match($patt1,$price) && !preg_match($patt2,$price)){
            echo 3;
            exit;
        }
        Db::name('coupon_price')->where('id = 1')->save(["coupon_price" =>$price]) ;
        Db::name('coupon_price_change')->Insert(["ticket_price"=>$price,'ticket_price_change_time'=>date('Y-m-d H:i:s')]) ;
        echo 1;
    }


    //用户券列表 
    public function couponList(){
        $arr[0] = Db::name('ticket_hold')
            ->alias('a')
            ->join('users b','b.user_id = a.user_id','left')
            ->where("ticket_id = 0 AND ticket_number!=0")
            ->field('b.user_id,b.nickname,b.mobile,a.ticket_number,a.ticket_last_change_time')
            ->select();
        $arr[1] = Db::name('ticket_hold')
            ->alias('a')
            ->join('users b','b.user_id = a.user_id','left')
            ->where("ticket_id = 1 AND ticket_number!=0")
            ->field('b.user_id,b.nickname,b.mobile,a.ticket_number,a.ticket_last_change_time')
            ->select();
        $arr[2] = Db::name('ticket_hold')
            ->alias('a')
            ->join('users b','b.user_id = a.user_id','left')
            ->where("ticket_id = 2 AND ticket_number!=0")
            ->field('b.user_id,b.nickname,b.mobile,a.ticket_number,a.ticket_last_change_time')
            ->select();
        $arr[3] = Db::name('ticket_hold')
            ->alias('a')
            ->join('users b','b.user_id = a.user_id','left')
            ->where("ticket_id = 3 AND ticket_number!=0")
            ->field('b.user_id,b.nickname,b.mobile,a.ticket_number,a.ticket_last_change_time')
            ->select();
        $arr[4] = Db::name('ticket_hold')
            ->alias('a')
            ->join('users b','b.user_id = a.user_id','left')
            ->where("ticket_id = 4 AND ticket_number!=0")
            ->field('b.user_id,b.nickname,b.mobile,a.ticket_number,a.ticket_last_change_time')
            ->select();
        $arr[5] = Db::name('ticket_hold')
            ->alias('a')
            ->join('users b','b.user_id = a.user_id','left')
            ->where("ticket_id = 5 AND ticket_number!=0")
            ->field('b.user_id,b.nickname,b.mobile,a.ticket_number,a.ticket_last_change_time')
            ->select();
        $hold[0] = json_encode($arr[0]);
        $hold[1] = json_encode($arr[1]);
        $hold[2] = json_encode($arr[2]);
        $hold[3] = json_encode($arr[3]);
        $hold[4] = json_encode($arr[4]);
        $hold[5] = json_encode($arr[5]);
        $this->assign('hold',$hold);
        return $this->fetch();
    }
    
    public function couponSearchList(){
        return $this->fetch();
    }
    public function search(){
        $conpun_type = I('contype');
        $conpunsearch = I('conpunsearch');
        $gtnumber = I('gtnumber');
        $ltnumber = I('ltnumber');
        $data     = I('data');
        $mobile   = I('mobile');
        $where = array();
        if ($conpunsearch == 0){
            if (!empty($conpun_type)){
                if ($conpun_type == 9){
                    $conpun_type = 0;
                }
                $where[] = "a.ticket_id = $conpun_type";
            }
            if (!empty($gtnumber)){
                $where[] = "a.ticket_change_number > $gtnumber";
            }
            if (!empty($ltnumber)){
                $where[] = "a.ticket_change_number < $ltnumber";
            }
            if (!empty($data)){
                $data_arr = explode(' - ',$data);

                if ($data_arr[0] == $data_arr[1]){
                    $where[] = "a.ticket_change_time < $data_arr[0] 00:00:00";
                }else{
                    $where[] = "a.ticket_change_time > $data_arr[0] 00:00:00 AND a.ticket_change_time < $data_arr[1] 00:00:00";
                }
            }
            if (!empty($mobile)){
                $where[]  = "b.mobile = $mobile";
            }
            if (!empty($where)){
                $wheres = implode(' AND ',$where);
            }
            $change = Db::name('ticket_change')
                ->alias('a')
                ->join('users b','b.user_id = a.ticket_change_user_id','left')
                ->where($wheres)
                ->order('ticket_change_time desc')
                ->field('b.user_id,b.nickname,b.mobile,a.ticket_change_number,a.ticket_id,a.ticket_change_time,a.ticket_change_type,a.ticket_change_add')
                ->select();
            $type_arr = array(
                "1"=> "购买商品获得z券",
                "2"=> "后台添加获得z券",
                "3"=>  "后台自动释放消耗",
                "4"=>  "交易产生增或减",
                "5"=>  "推荐用户消费",
                "6"=>  "自动挂售获得",
                "7"=>  "交易所出售获得",
                "8"=>  "交易所购买消耗",
                "9"=>  "自动挂售消耗",
                "10"=>  "一代消费对冲注册券",
                "11"=>  "一代消费对冲余额",
                "12"=>  "一代消费返利",
                "13"=>  "二代消费返利",
                "14"=>  "使用余额购买商品",
                "15"=>  "团队收益获得",
                "16"=>  "充值",
            );
            $id_array = array(
                "0"=>'Z券',
                "1"=>'注册券',
                "2"=>'消费券',
                "3"=>'万用券',
                "4"=>'挂售券',
                "5"=>'余额',
            );

            foreach($change as $k => $v){
                if ($v['ticket_change_type'] == 4){
                    if ($v['ticket_change_add']==1){
                        $change[$k]['ticket_change_type'] = '通过他人转账获得';
                    }else{
                        $change[$k]['ticket_change_type'] = '给他人转账消耗';
                    }
                }else{
                    $change[$k]['ticket_change_type'] = $type_arr[$v['ticket_change_type']];
                }
                $change[$k]['ticket_id'] = $id_array[$v['ticket_id']];
            }
            echo json_encode($change);
        }
        if ($conpunsearch == 1){
            if (!empty($conpun_type)){
                if ($conpun_type == 9){
                    $conpun_type = 0;
                }
                $where[] = "a.ticket_id = $conpun_type";
            }
            if (!empty($gtnumber)){
                $where[] = "a.ticket_number > $gtnumber";
            }
            if (!empty($ltnumber)){
                $where[] = "a.ticket_number < $ltnumber";
            }
            if (!empty($mobile)){
                $where[]  = "b.mobile = $mobile";
            }
            $where[] = 'ticket_id !=6';
            if (!empty($where)){
                $wheres = implode(' AND ',$where);
            }
            $hold = Db::name('ticket_hold')
                ->alias('a')
                ->join('users b','b.user_id = a.user_id','left')
                ->where($wheres)
                ->field('b.user_id,b.nickname,b.mobile,a.ticket_id,a.ticket_number,a.ticket_last_change_time')
                ->select();
            $id_array = array(
                "0"=>'Z券',
                "1"=>'注册券',
                "2"=>'消费券',
                "3"=>'万用券',
                "4"=>'挂售券',
                "5"=>'余额',
            );
            foreach($hold as $k => $v){
                $hold[$k]['ticket_id'] = $id_array[$v['ticket_id']];
            }
            echo json_encode($hold);
        }
    }
        // 券充值
    public function recharge(){
        return $this->fetch();
    }
    public function getusernickname(){
        $mobile = I('mobile');
        $mobiles = M('users')->where(['mobile' => $mobile])->field('user_id,mobile,nickname')->limit(1)->select();
        if(!empty($mobiles)){
            if ($mobiles[0]['nickname']==''){
                echo $mobiles[0]['user_id'];
                die;
            }
            echo $mobiles[0]['nickname'];
            die;
        }
        echo 0;die;
    }
    public function recharge_do(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $mobile = I('mobile');
        $ticket = I('ticket');
        $number = I('number');
        if (empty($mobile)){
            echo '手机号不能为空';
            die;
        }
        if ($ticket == ''){
            echo '券类型不能为空';
            die;
        }
        if (empty($number)){
            echo '券量不能为空';
            die;
        }

        $mobiles = M('users')->where(['mobile' => $mobile])->field('mobile,user_id')->limit(1)->select();
        if (empty($mobiles)){
            echo '未找到用户';
            die;
        }
        Db::name('ticket_hold')->where(array('user_id' => $mobiles[0]['user_id'],'ticket_id' => $ticket))->setInc('ticket_number', $number);
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $mobiles[0]['user_id'],  //用户id
            'ticket_id'            => $ticket,         //券种类
            'ticket_change_number' => $number,      //变化量
            'ticket_change_add'    => 1,         //增减  1为增
            'ticket_change_type'   => 16,         // 变化原因
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        $user_id = session('admin_user_id');
        $admin_name = $user = Db::name('admin_user')->where(['admin_user_id' => $user_id])->select()[0]['admin_user_name'];
        $insert_log[] = array(          //挂售券增加
            'recharge_admin_name'  => $admin_name,  //用户id
            'recharge_user_id'  => $mobiles['0']['user_id'],  //用户id
            'recharge_ticket_type' => $ticket,         //券种类
            'recharge_number'      => $number,      //变化量
            'recharge_time'        => date('Y-m-d H:i:s',time()) //变化时间
        );
        Db::name('ticket_change')->insertAll($insert_arr);
        Db::name('admin_recharge_log')->insertAll($insert_log);
        echo 1;die;
    }
     // 券充值明细
     public function rechargedetail(){
        return $this->fetch();
    }
    public function recharge_detail_do(){
        $conpun_type = I('contype');
        $data        = I('data');
        $admin_name  = I('admin_name');
        $mobile      = I('mobile');
        $where = array();
        if (!empty($conpun_type)){
            if ($conpun_type == 9){
                $conpun_type = 0;
            }
            $where[] = "a.recharge_ticket_type = $conpun_type";
        }
        if (!empty($data)){
            $data_arr = explode(' - ',$data);

            if ($data_arr[0] == $data_arr[1]){
                $where[] = "a.recharge_time < $data_arr[0] 00:00:00";
            }else{
                $where[] = "a.recharge_time > '$data_arr[0] 00:00:00' AND a.recharge_time < '$data_arr[1] 00:00:00'";
            }
        }
        if (!empty($admin_name)){
            $where[]  = "a.recharge_admin_name = '$admin_name'";
        }
        if (!empty($mobile)){
            $where[]  = "b.mobile = '$mobile'";
        }
        if (!empty($where)){
            $wheres = implode(' AND ',$where);
        }

        $recharge = Db::name('admin_recharge_log')
            ->alias('a')
            ->join('users b','b.user_id = a.recharge_user_id','left')
            ->where($wheres)
            ->field('b.user_id,b.nickname,b.mobile,a.recharge_ticket_type,a.recharge_number,a.recharge_time,a.recharge_admin_name')
            ->select();
        $id_array = array(
            "0"=>'Z券',
            "1"=>'注册券',
            "2"=>'消费券',
            "3"=>'万用券',
            "4"=>'挂售券',
            "5"=>'余额',
        );
        foreach($recharge as $k => $v){
            $recharge[$k]['recharge_ticket_type'] = $id_array[$v['recharge_ticket_type']];
        }
        echo json_encode($recharge);
    }


    public function transfer(){
        return $this->fetch();
    }
}
