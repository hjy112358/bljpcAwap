<?php
/**
 * tpshop
 * ============================================================================
 * * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 2015-11-21
 */
namespace app\mobile\controller;

use app\home\logic\StoreLogic;
use app\home\logic\UsersLogic;
use app\mobile\logic\OrderGoodsLogic;
use think\Page;
use think\Verify;
use think\Db;

class User extends MobileBase
{

    public $user_id = 0;
    public $user = array();

    /*
    * 初始化操作
    */
    public function _initialize()
    {
        parent::_initialize();
        if (session('?user')) {
            $user = session('user');
            $user = M('users')->where("user_id",$user['user_id'])->find();
            session('user', $user);  //覆盖session 中的 user
            $this->user = $user;
            $this->user_id = $user['user_id'];
            $this->assign('user', $user); //存储用户信息
        }
        $nologin = array(
            'login', 'pop_login', 'do_login', 'logout', 'verify', 'set_pwd', 'finished',
            'verifyHandle', 'reg', 'send_sms_reg_code', 'find_pwd', 'check_validate_code',
            'forget_pwd', 'check_captcha', 'check_username', 'send_validate_code', 'express',
            'userRecharge','userRecharge_do','getusernickname'
        );
        if (!$this->user_id && !in_array(ACTION_NAME, $nologin)) {
            header("location:" . U('Mobile/User/login'));
            exit;
        }

        $order_status_coment = array(
            'WAITPAY' => '待付款 ', //订单查询状态 待支付
            'WAITSEND' => '待发货', //订单查询状态 待发货
            'WAITRECEIVE' => '待收货', //订单查询状态 待收货
            'WAITCCOMMENT' => '待评价', //订单查询状态 待评价
        );
        $this->assign('order_status_coment', $order_status_coment);
    }

    /*
     * 用户中心首页
     */
    public function index()
    {

        $order_count = M('order')->where("user_id" ,$this->user_id)->count(); // 我的订单数
        $goods_collect_count = M('goods_collect')->where("user_id" ,$this->user_id)->count(); // 我的商品收藏
        $comment_count = M('comment')->where("user_id" ,$this->user_id)->count();//  我的评论数
        $coupon_count = M('coupon_list')->where("uid",$this->user_id)->count(); // 我的优惠券数量
        $level_name = M('user_level')->where("level_id",$this->user['level'])->getField('level_name'); // 等级名称
        $this->assign('level_name', $level_name);
        $this->assign('order_count', $order_count);
        $this->assign('goods_collect_count', $goods_collect_count);
        $this->assign('comment_count', $comment_count);
        $this->assign('coupon_count', $coupon_count);
        return $this->fetch();
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        setcookie('cn', '', time() - 3600, '/');
        setcookie('user_id', '', time() - 3600, '/');
        //$this->success("退出成功",U('Mobile/Index/index'));
        header("Location:" . U('Mobile/Index/index'));
        exit();
    }

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

    /*
     * 账户资金
     */
    public function account()
    {
        $user = session('user');
        //获取账户资金记录
        $logic = new UsersLogic();
        $data = $logic->get_account_log($this->user_id, I('get.type'));
        $account_log = $data['result'];

        $this->assign('user', $user);
        $this->assign('account_log', $account_log);
        $this->assign('page', $data['show']);

        if ($_GET['is_ajax']) {
            return $this->fetch('ajax_account_list');
            exit;
        }
        return $this->fetch();
    }

    public function coupon()
    {
        //
        $logic = new UsersLogic();
        $data = $logic->get_coupon($this->user_id, $_REQUEST['type']);
        $coupon_list = $data['result'];
        $this->assign('coupon_list', $coupon_list);
        $this->assign('page', $data['show']);
        if ($_GET['is_ajax']) {
            return $this->fetch('ajax_coupon_list');
            exit;
        }
        return $this->fetch();
    }

    /**
     *  登录
     */
    public function login()
    {
        if ($this->user_id > 0) {
            header("Location: " . U('Mobile/User/indexnew'));
        }
        
        $store_id = I('store_id');
        $mode = I('mode');

        if(($store_id != '') && ($mode != '')){
            $referurl = U("Mobile/Order/pay?store_id=".$store_id.'&mode='.$mode);
            
        }else{
            $referurl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : U("Mobile/User/indexnew");
        }
        
        
        $this->assign('referurl', $referurl);
        return $this->fetch();
    }


    public function do_login()
    {
        $username = I('post.username');
        $password = I('post.password');
        $username = trim($username);
        $password = trim($password);
        $logic = new UsersLogic();
        $res = $logic->login($username, $password);
        if ($res['status'] == 1) {
            $res['url'] = urldecode(I('post.referurl'));
            session('user', $res['result']);
            setcookie('user_id', $res['result']['user_id'], null, '/');
            setcookie('is_distribut', $res['result']['is_distribut'], null, '/');
            $nickname = empty($res['result']['nickname']) ? $username : $res['result']['nickname'];
            setcookie('uname', $nickname, null, '/');
            setcookie('cn',0,time()-3600,'/');
            $cartLogic = new \app\home\logic\CartLogic();
            $cartLogic->login_cart_handle($this->session_id, $res['result']['user_id']);  //用户登录后 需要对购物车 一些操作
        }
        exit(json_encode($res));
    }

    /**
     *  注册
     */
    public function reg()
    {
    	if($this->user_id > 0) header("Location: ".U('Mobile/User/newindex'));
        $reg_sms_enable = tpCache('sms.regis_sms_enable');
        $reg_smtp_enable = tpCache('sms.regis_smtp_enable');
        if (IS_POST) {
            $logic = new UsersLogic();
            //验证码检验
            //$this->verifyHandle('user_reg');
            $username = I('post.username', '');
            $password = I('post.password', '');
            $password2 = I('post.password2', '');
            //是否开启注册验证码机制
            $code = I('post.mobile_code', '');
            $scene = I('post.scene', 1);

            $nickname = I('post.nickname','');
            $invitatecode = I('post.invitatecode','');

            $session_id = session_id();

            if(check_mobile($username)){
                $check_code = $logic->check_validate_code($code, $username, 'phone', $session_id , $scene);
                if($check_code['status'] != 1){
                    $this->error($check_code['msg']);
                }
            }
            //是否开启注册邮箱验证码机制
            // if(check_email($username)){
            //     $check_code = $logic->check_validate_code($code, $username);
            //     if($check_code['status'] != 1){
            //         $this->error($check_code['msg']);
            //     }
            // }
            //验证邀请码
            $parent_user = M('users')->where('invitatecode',$invitatecode)->find();
            if(!$parent_user){
                return array('status'=>-1,'msg'=>'邀请码不存在','result'=>'');
            }
            $data = $logic->reg($username, $password, $password2,$invitatecode,$nickname);

            if ($data['status'] != 1){
                $this->error($data['msg']);
                die;
            }


            for ($i = 0;$i<7; $i++ ){
                $insert_arr[] = array(          //挂售券增加
                    'user_id'=> $data['result']['user_id'],  //用户id
                    'ticket_id'            => $i,         //券种类 5为余额券
                    'ticket_number' => 0,      //变化量
                    'ticket_last_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
                );
            }
            Db::name('ticket_hold')->insertAll($insert_arr);
            $insert_arr1[] = array(          //挂售券增加
                'user_id'=> $data['result']['user_id'],  //用户id
                'parent_id'            => $parent_user['user_id'],         //邀请人id
                'last_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
            );
            Db::name('team')->insertAll($insert_arr1);

            $arr = $this->get_all_parents_id($data['result']['user_id']);
            foreach ($arr as $v){
                Db::name('team')->where(array('user_id'=>$v))->setInc('team_people',1);
            }
            session('user', $data['result']);
            setcookie('user_id', $data['result']['user_id'], null, '/');
            setcookie('is_distribut', $data['result']['is_distribut'], null, '/');
            $cartLogic = new \app\home\logic\CartLogic();
            $cartLogic->login_cart_handle($this->session_id, $data['result']['user_id']);  //用户登录后 需要对购物车 一些操作
            $this->success($data['msg'],'https://dibaqu.com/UJFbb','',0 );
            exit;
        }
        $invite_id = I('invite_id', '');
        $this->assign('invite_id',$invite_id);
        $this->assign('regis_sms_enable',$reg_sms_enable); // 注册启用短信：
        $this->assign('regis_smtp_enable',$reg_smtp_enable); // 注册启用邮箱：
        $sms_time_out = tpCache('sms.sms_time_out')>0 ? tpCache('sms.sms_time_out') : 120;
        $this->assign('sms_time_out', $sms_time_out); // 手机短信超时时间
        return $this->fetch();
    }

    /*
     * 订单列表
     */
    public function order_list()
    {
        $where = ' user_id=' . $this->user_id;
        //条件搜索 
        if (in_array(strtoupper(I('type')), array('WAITCCOMMENT', 'COMMENTED'))) {
            $where .= " AND order_status in(1,4) "; //代评价 和 已评价
        } elseif (I('type')) {
            $where .= C(strtoupper(I('type')));
        }
        $count = M('order')->where($where)->count();
        $Page = new Page($count, 10);

        $show = $Page->show();
        $order_str = "order_id DESC";
        $order_list = M('order')->order($order_str)->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();

        //获取订单商品
        $model = new UsersLogic();
        foreach ($order_list as $k => $v) {
            $order_list[$k] = set_btn_order_status($v);  // 添加属性  包括按钮显示属性 和 订单状态显示属性
            //$order_list[$k]['total_fee'] = $v['goods_amount'] + $v['shipping_fee'] - $v['integral_money'] -$v['bonus'] - $v['discount']; //订单总额
            $data = $model->get_order_goods($v['order_id']);
            $order_list[$k]['goods_list'] = $data['result'];
        }
        $storeList = M('store')->getField('store_id,store_name,store_qq'); // 找出所有商品对应的店铺id
        $this->assign('storeList', $storeList); // 店铺列表
        $this->assign('order_status', C('ORDER_STATUS'));
        $this->assign('shipping_status', C('SHIPPING_STATUS'));
        $this->assign('pay_status', C('PAY_STATUS'));
        $this->assign('page', $show);
        $this->assign('lists', $order_list);
        $this->assign('active', 'order_list');
        $this->assign('active_status', I('get.type'));
        if ($_GET['is_ajax']) {
            return $this->fetch('ajax_order_list');
            exit;
        }
        return $this->fetch();
    }

    /*
     * 订单详情
     */
    public function order_detail()
    {
        $id = I('get.id/d');
        if (empty($id)) {
            $this->error('参数错误');
        }
        $map['order_id'] = $id;
        $map['user_id'] = $this->user_id;
        $order_info = M('order')->where($map)->find();
        $order_info = set_btn_order_status($order_info);  // 添加属性  包括按钮显示属性 和 订单状态显示属性
        if (!$order_info) {
            $this->error('没有获取到订单信息');
            exit;
        }
        //获取订单商品
        $model = new UsersLogic();
        $data = $model->get_order_goods($order_info['order_id']);
        $order_info['goods_list'] = $data['result'];
        $order_info['total_fee'] = $order_info['goods_price'] + $order_info['shipping_price'] - $order_info['integral_money'] - $order_info['coupon_price'] - $order_info['discount'];
        //$region_list = get_region_list();
        $store = M('store')->where("store_id",$order_info['store_id'])->find(); // 找出这个商家
        // 店铺地址id
        $ids[] = $store['province_id'];
        $ids[] = $store['city_id'];
        $ids[] = $store['district'];

        $ids[] = $order_info['province'];
        $ids[] = $order_info['city'];
        $ids[] = $order_info['district'];
        if (!empty($ids))
            $regionLits = M('region')->where("id in (" . implode(',', $ids) . ")")->getField("id,name");

        $region_list = get_region_list();
        $invoice_no = M('DeliveryDoc')->where("order_id" , $id)->getField('invoice_no', true);
        $order_info[invoice_no] = implode(' , ', $invoice_no);
        //获取订单操作记录
        $order_action = M('order_action')->where(array('order_id' => $id))->select();
        $this->assign('store', $store);
        $this->assign('order_status', C('ORDER_STATUS'));
        $this->assign('shipping_status', C('SHIPPING_STATUS'));
        $this->assign('pay_status', C('PAY_STATUS'));
        //$this->assign('region_list',$region_list);
        $this->assign('regionLits', $regionLits);
        $this->assign('order_info', $order_info);
        $this->assign('order_action', $order_action);
        return $this->fetch();
    }

    public function express()
    {
        $order_id = I('get.order_id/d', 195);
        $order_goods = M('order_goods')->where("order_id" , $order_id)->select();
        $delivery = M('delivery_doc')->where("order_id" , $order_id)->limit(1)->find();
        $this->assign('order_goods', $order_goods);
        $this->assign('delivery', $delivery);
        return $this->fetch();
    }

    /*
     * 取消订单
     */
    public function cancel_order()
    {
        $id = I('get.id/d');
        //检查是否有积分，余额支付
        $logic = new UsersLogic();
        $data = $logic->cancel_order($this->user_id, $id);
        if ($data['status'] < 0)
            $this->error($data['msg']);
        $this->success($data['msg']);
    }

    /*
     * 用户地址列表
     */
    public function address_list()
    {
        $address_lists = get_user_address_list($this->user_id);
        $region_list = get_region_list();
        $this->assign('region_list', $region_list);
        $this->assign('lists', $address_lists);
        return $this->fetch();
    }

    /*
     * 添加地址
     */
    public function add_address()
    {
        if (IS_POST) {
            $logic = new UsersLogic();
            $data = $logic->add_address($this->user_id, 0, I('post.'));
            if ($data['status'] != 1)
                $this->error($data['msg']);
            elseif ($_POST['source'] == 'cart2') {
                header('Location:' . U('/Mobile/Cart/cart2', array('address_id' => $data['result'])));
                exit;
            }

            $this->success($data['msg'], U('/Mobile/User/address_list'));
            exit();
        }
        $p = M('region')->where(array('parent_id' => 0, 'level' => 1))->select();
        $this->assign('province', $p);
        //return $this->fetch('edit_address');
        return $this->fetch();

    }

    /*
     * 地址编辑
     */
    public function edit_address()
    {
        $id = I('id/d');
        $address = M('user_address')->where(array('address_id' => $id, 'user_id' => $this->user_id))->find();
        if (IS_POST) {
            $logic = new UsersLogic();
            $data = $logic->add_address($this->user_id, $id, I('post.'));
            if ($_POST['source'] == 'cart2') {
                header('Location:' . U('/Mobile/Cart/cart2', array('address_id' => $id)));
                exit;
            } else
                $this->success($data['msg'], U('/Mobile/User/address_list'));
            exit();
        }
        //获取省份
        $p = M('region')->where(array('parent_id' => 0, 'level' => 1))->select();
        $c = M('region')->where(array('parent_id' => $address['province'], 'level' => 2))->select();
        $d = M('region')->where(array('parent_id' => $address['city'], 'level' => 3))->select();
        if ($address['twon']) {
            $e = M('region')->where(array('parent_id' => $address['district'], 'level' => 4))->select();
            $this->assign('twon', $e);
        }

        $this->assign('province', $p);
        $this->assign('city', $c);
        $this->assign('district', $d);

        $this->assign('address', $address);
        return $this->fetch();
    }

    /*
     * 设置默认收货地址
     */
    public function set_default()
    {
        $id = I('get.id/d');
        $source = I('get.source');
        M('user_address')->where(array('user_id' => $this->user_id))->save(array('is_default' => 0));
        $row = M('user_address')->where(array('user_id' => $this->user_id, 'address_id' => $id))->save(array('is_default' => 1));
        if ($source == 'cart2') {
            header("Location:" . U('Mobile/Cart/cart2'));
        } else {
            header("Location:" . U('Mobile/User/address_list'));
        }
        exit();
    }

    /*
     * 地址删除
     */
    public function del_address(){
        $id = I('get.id/d','');
        
        $address = M('user_address')->where("address_id" , $id)->find();
        $row = M('user_address')->where(array('user_id'=>$this->user_id,'address_id'=>$id))->delete();                
        // 如果删除的是默认收货地址 则要把第一个地址设置为默认收货地址
        if($address['is_default'] == 1)
        {
            $address2 = M('user_address')->where("user_id",$this->user_id)->find();            
            $address2 && M('user_address')->where("address_id",$address2['address_id'])->save(array('is_default'=>1));
        }        
        if(!$row)
            $this->error('操作失败',U('User/address_list'));
        else
            $this->success("操作成功",U('User/address_list'));
    } 

    /*
     * 评论晒单
     */
    public function comment()
    {
        $user_id = $this->user_id;
        $status = I('get.status');
        $logic = new UsersLogic();
        $result = $logic->get_comment($user_id, $status); //获取评论列表
        $this->assign('comment_list', $result['result']);
        if ($_GET['is_ajax']) {
            return $this->fetch('ajax_comment_list');
            exit;
        }
        return $this->fetch();
    }

    /*
     *添加评论
     */
    public function add_comment()
    {
        if (IS_POST) {
            // 晒图片
            $files = request()->file('comment_img_file');
            $save_url = 'public/upload/comment/' . date('Y', time()) . '/' . date('m-d', time());
            foreach ($files as $file) {
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->rule('uniqid')->validate(['size' => 1024 * 1024 * 3, 'ext' => 'jpg,png,gif,jpeg'])->move($save_url);
                if ($info) {
                    // 成功上传后 获取上传信息
                    // 输出 jpg
                    $comment_img[] = '/'.$save_url . '/' . $info->getFilename();
                } else {
                    // 上传失败获取错误信息
                    $this->error($file->getError());
                }
            }
            if (!empty($comment_img)) {
                $add['img'] = serialize($comment_img);
            }

            $user_info = session('user');
            $logic = new UsersLogic();
            $add['goods_id'] = I('goods_id/d');
            $add['email'] = $user_info['email'];
            $hide_username = I('hide_username');
            if (empty($hide_username)) {
                $add['username'] = $user_info['nickname'];
            }
            $add['order_id'] = I('order_id/d');
            $add['service_rank'] = I('service_rank');
            $add['deliver_rank'] = I('deliver_rank');
            $add['goods_rank'] = I('goods_rank');
            //$add['content'] = htmlspecialchars(I('post.content'));
            $add['content'] = I('content');
            $add['add_time'] = time();
            $add['ip_address'] = getIP();
            $add['user_id'] = $this->user_id;

            //添加评论
            $row = $logic->add_comment($add);
            if ($row[status] == 1) {
                $this->success('评论成功', U('/Mobile/Goods/goodsInfo', array('id' => $add['goods_id'])));
                exit();
            } else {
                $this->error($row[msg]);
            }
        }
        $rec_id = I('rec_id/d', 0);
        $order_goods = M('order_goods')->where("rec_id",$rec_id)->find();
        $this->assign('order_goods', $order_goods);
        return $this->fetch();
    }


    /**
     * @time 2016/8/5
     * @author dyr
     * 订单评价列表
     */
    public function comment_list()
    {
        $order_id = I('get.order_id/d');
        $store_id = I('get.store_id/d');
        $goods_id = I('get.goods_id/d');
        $part_finish = I('get.part_finish/d', 0);
        if (empty($order_id) || empty($store_id)) {
            $this->error("参数错误");
        } else {
            //查找店铺信息
            $store_where['store_id'] = $store_id;
            $store_info = M('store')->field('store_id,store_name,store_phone,store_address,store_logo')->where($store_where)->find();
            if (empty($store_info)) {
                $this->error("该商家不存在");
            }
            //查找订单是否已经被用户评价
            $order_comment_where['order_id'] = $order_id;
            $order_comment_where['deleted'] = 0;
            $order_info = M('order')->field('order_id,order_sn,is_comment,add_time')->where($order_comment_where)->find();
            //查找订单下的所有未评价的商品
            $order_goods_logic = new OrderGoodsLogic();
            $no_comment_goods = $order_goods_logic->get_no_comment_goods($order_id, $goods_id);
            $this->assign('store_info', $store_info);
            $this->assign('order_info', $order_info);
            $this->assign('no_comment_goods', $no_comment_goods);
            $this->assign('part_finish', $part_finish);
            return $this->fetch();
        }
    }

    /**
     * @time 2016/8/5
     * @author dyr
     *  添加评论
     */
    public function conmment_add()
    {
        if ($_FILES[comment_img_file][tmp_name][0]) {
            $files = $this->request->file('comment_img_file');
            $validate = ['size'=>1024 * 1024 * 3,'ext'=>'jpg,png,gif,jpeg'];
            $dir = 'public/upload/comment/';
            
            if (!($_exists = file_exists($dir))){
                $isMk = mkdir($dir);
            }
            $parentDir = date('Ymd');
             
            
            foreach($files as $file){
                $info = $file->validate($validate)->move($dir, true);
                if($info){
                    $filename = $info->getFilename();
                    $new_name = '/'.$dir.$parentDir.'/'.$filename;
                    $comment_img[] = $new_name;
                }else{
                    $this->error($info->getError());//上传错误提示错误信息
                }
            }
            $comment['img'] = serialize($comment_img); // 上传的图片文件
        }
         
        $anonymous = I('post.anonymous');
        $store_score['describe_score'] = I('post.store_packge_hidden');
        $store_score['seller_score'] = I('post.store_speed_hidden');
        $store_score['logistics_score'] = I('post.store_sever_hidden');
        $order_id = $store_score['order_id'] = $store_score_where['order_id'] = I('post.order_id/d');
        $goods_id = I('post.goods_id/d');
        $content = I('post.content');
        $spec_key_name = I('post.spec_key_name');
        $rank = I('post.rank');
        $tag = I('post.tag');
        $store_score['user_id'] = $store_score_where['user_id'] = $this->user_id;
        $store_score_where['deleted'] = 0;
        $store_id = M('order')->where(array('order_id' => $store_score_where['order_id']))->getField('store_id');
        $store_score['store_id'] = $store_id;
        //处理订单评价
        if (!empty($store_score['describe_score']) && !empty($store_score['seller_score']) && !empty($store_score['logistics_score'])) {
            $order_comment = M('order_comment')->where($store_score_where)->find();
            if ($order_comment) {
                M('order_comment')->where($store_score_where)->save($store_score);
                M('order')->where(array('order_id' => $order_id))->save(array('is_comment' => 1));
            } else {
                M('order_comment')->add($store_score);//订单打分
                M('order')->where(array('order_id' => $order_id))->save(array('is_comment' => 1));
            }
            //订单打分后更新店铺评分
            $store_logic = new StoreLogic();
            $store_logic->updateStoreScore($store_id);
        }
        //处理商品评价
        $comment['goods_id'] = $goods_id;
        $comment['order_id'] = $order_id;
        $comment['store_id'] = $store_id;
        $comment['user_id'] = $this->user_id;
        $comment['content'] = $content;
        $comment['ip_address'] = getIP();
        $comment['spec_key_name'] = $spec_key_name;
        $comment['goods_rank'] = $rank;
//        $comment['img'] = (empty($value['commment_img'][0])) ? '' : serialize($value['commment_img']);
        $comment['impression'] = (empty($tag[0])) ? '' : implode(',', $tag);
        $comment['is_anonymous'] = empty($anonymous) ? 1 : 0;
        $comment['add_time'] = time();
        M('comment')->add($comment);//想评论表插入数据
        M('order_goods')->where(array('order_id' => $store_score['order_id'], 'goods_id' => $goods_id))->save(array('is_comment' => 1));
        M('goods')->where(array('goods_id' => $goods_id))->setInc('comment_count', 1);
        unset($comment);
        $this->success("评论成功", U('User/comment'));
    }

    /*
     * 个人信息
     */
    public function userinfo()
    {
        $userLogic = new UsersLogic();
        $user_info = $userLogic->get_info($this->user_id); // 获取用户信息
        $user_info = $user_info['result'];
        if (IS_POST) {
            I('post.nickname') ? $post['nickname'] = I('post.nickname') : false; //昵称
            I('post.qq') ? $post['qq'] = I('post.qq') : false;  //QQ号码
            I('post.head_pic') ? $post['head_pic'] = I('post.head_pic') : false; //头像地址
            I('post.sex') ? $post['sex'] = I('post.sex') :  $post['sex'] = 0;  // 性别
            I('post.birthday') ? $post['birthday'] = strtotime(I('post.birthday')) : false;  // 生日
            I('post.province') ? $post['province'] = I('post.province') : false;  //省份
            I('post.city') ? $post['city'] = I('post.city') : false;  // 城市
            I('post.district') ? $post['district'] = I('post.district') : false;  //地区
            I('post.email') ? $post['email'] = I('post.email') : false; //邮箱
            I('post.mobile') ? $post['mobile'] = I('post.mobile') : false; //手机
            $email = I('post.email');
            $mobile = I('post.mobile');
            $code = I('post.mobile_code', '');
            $scene = I('post.scene', 6);

            if (!empty($email)) {
                $c = M('users')->where(['email' => input('post.email'), 'user_id' => ['<>', $this->user_id]])->count();
                $c && $this->error("邮箱已被使用");
            }
            if (!empty($mobile)) {
                $c = M('users')->where(['mobile' => input('post.mobile'), 'user_id' => ['<>', $this->user_id]])->count();
                $c && $this->error("手机已被使用");
                if (!$code)
                    $this->error('请输入验证码');
                $check_code = $userLogic->check_validate_code($code, $mobile, 'phone', $this->session_id, $scene);
                if ($check_code['status'] != 1)
                    $this->error($check_code['msg']);
            }

            if (!$userLogic->update_info($this->user_id, $post))
                $this->error("保存失败");
            $this->success("操作成功");
            exit;
        }
        //  获取省份
        $province = M('region')->where(array('parent_id' => 0, 'level' => 1))->select();
        //  获取订单城市
        $city = M('region')->where(array('parent_id' => $user_info['province'], 'level' => 2))->select();
        //  获取订单地区
        $area = M('region')->where(array('parent_id' => $user_info['city'], 'level' => 3))->select();
        $this->assign('province', $province);
        $this->assign('city', $city);
        $this->assign('area', $area);
        $this->assign('user', $user_info);
        $this->assign('sex', C('SEX'));
        return $this->fetch();
    }

    /*
     * 邮箱验证
     */
    public function email_validate()
    {
        $userLogic = new UsersLogic();
        $user_info = $userLogic->get_info($this->user_id); // 获取用户信息
        $user_info = $user_info['result'];
        $step = I('get.step', 1);
        //验证是否未绑定过
        if ($user_info['email_validated'] == 0)
            $step = 2;
        //原邮箱验证是否通过
        if ($user_info['email_validated'] == 1 && session('email_step1') == 1)
            $step = 2;
        if ($user_info['email_validated'] == 1 && session('email_step1') != 1)
            $step = 1;
        if (IS_POST) {
            $email = I('post.email');
            $code = I('post.code');
            $info = session('email_code');
            if (!$info)
                $this->error('非法操作');
            if ($info['email'] == $email || $info['code'] == $code) {
                if ($user_info['email_validated'] == 0 || session('email_step1') == 1) {
                    session('email_code', null);
                    session('email_step1', null);
                    if (!$userLogic->update_email_mobile($email, $this->user_id))
                        $this->error('邮箱已存在');
                    $this->success('绑定成功', U('Home/User/index'));
                } else {
                    session('email_code', null);
                    session('email_step1', 1);
                    redirect(U('Home/User/email_validate', array('step' => 2)));
                }
                exit;
            }
            $this->error('验证码邮箱不匹配');
        }
        $this->assign('step', $step);
        return $this->fetch();
    }

    /*
    * 手机验证
    */
    public function mobile_validate()
    {
        $userLogic = new UsersLogic();
        $user_info = $userLogic->get_info($this->user_id); // 获取用户信息
        $user_info = $user_info['result'];
        $step = I('get.step', 1);
        //验证是否未绑定过
        if ($user_info['mobile_validated'] == 0)
            $step = 2;
        //原手机验证是否通过
        if ($user_info['mobile_validated'] == 1 && session('mobile_step1') == 1)
            $step = 2;
        if ($user_info['mobile_validated'] == 1 && session('mobile_step1') != 1)
            $step = 1;
        if (IS_POST) {
            $mobile = I('post.mobile');
            $code = I('post.code');
            $info = session('mobile_code');
            if (!$info)
                $this->error('非法操作');
            if ($info['email'] == $mobile || $info['code'] == $code) {
                if ($user_info['email_validated'] == 0 || session('email_step1') == 1) {
                    session('mobile_code', null);
                    session('mobile_step1', null);
                    if (!$userLogic->update_email_mobile($mobile, $this->user_id, 2))
                        $this->error('手机已存在');
                    $this->success('绑定成功', U('Home/User/index'));
                } else {
                    session('mobile_code', null);
                    session('email_step1', 1);
                    redirect(U('Home/User/mobile_validate', array('step' => 2)));
                }
                exit;
            }
            $this->error('验证码手机不匹配');
        }
        $this->assign('step', $step);
        return $this->fetch();
    }

    /**
     *  我的收藏
     * $author lxl
     * $time 17-3-28
     */
    public function collect_list()
    {
//        $userLogic = new UsersLogic();
//        $data = $userLogic->get_goods_collect($this->user_id);
//        $this->assign('page', $data['show']);// 赋值分页输出
//        $this->assign('goods_list', $data['result']);
//        if ($_GET['is_ajax']) {
//            return $this->fetch('ajax_collect_list');
//            exit;
//        }
//        return $this->fetch();

        $type = I('get.collect_type/d', '');
        if ($type == '') {
            //商品收藏
            $userLogic = new UsersLogic();
            $data = $userLogic->get_goods_collect($this->user_id);
            $this->assign('page', $data['show']);// 赋值分页输出
        } else {
            //店铺收藏
            $sc_id = I('get.sc_id/d');
            $storeLogic = new StoreLogic();
            $data= $storeLogic->getCollectStore($this->user_id, $sc_id);
        }
        $this->assign('lists', $data['result']);
        if ($_GET['is_ajax']) {
            return $this->fetch('ajax_collect_list');
            exit;
        }
        return $this->fetch();
    }

    /*
     *取消收藏
     */
    public function cancel_collect()
    {
        $collect_id = I('collect_id/d');
        $user_id = $this->user_id;
        if (M('goods_collect')->where(["collect_id" => $collect_id, "user_id" => $user_id])->delete()) {
            $this->success("取消收藏成功", U('User/collect_list'));
        } else {
            $this->error("取消收藏失败", U('User/collect_list'));
        }
    }

    /**
     *  删除一个收藏店铺
     * $author lxl
     * $time 17-3-28
     */
    public function del_store_collect()
    {
        $id = I('get.log_id/d');
        if (!$id)
            $this->error("缺少ID参数");
        $store_id = M('store_collect')->where(array('log_id' => $id, 'user_id' => $this->user_id))->getField('store_id');
        $row = M('store_collect')->where(array('log_id' => $id, 'user_id' => $this->user_id))->delete();
        M('store')->where(array('store_id' => $store_id))->setDec('store_collect');
        if ($row){
            $this->success("取消收藏成功", U('User/collect_list'));
        } else {
            $this->error("取消收藏失败", U('User/collect_list'));
        }
    }

    public function message_list()
    {
        C('TOKEN_ON', true);
        if (IS_POST) {
            $this->verifyHandle('message');

            $data = I('post.');
            $data['user_id'] = $this->user_id;
            $user = session('user');
            $data['user_name'] = $user['nickname'];
            $data['msg_time'] = time();
            if (M('feedback')->add($data)) {
                $this->success("留言成功", U('User/message_list'));
                exit;
            } else {
                $this->error('留言失败', U('User/message_list'));
                exit;
            }
        }
        $msg_type = array(0 => '留言', 1 => '投诉', 2 => '询问', 3 => '售后', 4 => '求购');
        $count = M('feedback')->where("user_id=" . $this->user_id)->count();
        $Page = new Page($count, 100);
        $Page->rollPage = 2;
        $message = M('feedback')->where("user_id=" . $this->user_id)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $showpage = $Page->show();
        header("Content-type:text/html;charset=utf-8");
        $this->assign('page', $showpage);
        $this->assign('message', $message);
        $this->assign('msg_type', $msg_type);
        return $this->fetch();
    }

    public function points()
    {
    	$type = I('type','all');
    	$this->assign('type',$type);
    	if($type == 'recharge'){
    		$count = M('recharge')->where("user_id=" . $this->user_id)->count();
    		$Page = new Page($count, 16);
    		$account_log = M('recharge')->where("user_id=" . $this->user_id)->order('order_id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
    	}else if($type == 'points'){
    		$count = M('account_log')->where("user_id=" . $this->user_id ." and pay_points!=0 ")->count();
    		$Page = new Page($count, 16);
    		$account_log = M('account_log')->where("user_id=" . $this->user_id." and pay_points!=0 ")->order('log_id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
    	}else{
    		$count = M('account_log')->where("user_id=" . $this->user_id)->count();
    		$Page = new Page($count, 16);
    		$account_log = M('account_log')->where("user_id=" . $this->user_id)->order('log_id desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
    	}
		$showpage = $Page->show();
        $this->assign('account_log', $account_log);
        $this->assign('page', $showpage);
        if ($_GET['is_ajax']) {
            return $this->fetch('ajax_points');
            exit;
        }
        return $this->fetch();
    }

    /*
     * 密码修改
     */
    public function password()
    {
        //检查是否第三方登录用户
        $logic = new UsersLogic();
        $data = $logic->get_info($this->user_id);
        $user = $data['result'];
        if ($user['mobile'] == '' && $user['email'] == '')
            $this->error('请先到电脑端绑定手机', U('/Mobile/User/index'));
        if (IS_POST) {
            $userLogic = new UsersLogic();
            $data = $userLogic->password($this->user_id, I('post.new_password'), I('post.confirm_password')); // 获取用户信息
            if ($data['status'] == -1)
                $this->error($data['msg']);
            $this->success($data['msg']);
            exit;
        }
        return $this->fetch();
    }

    // function forget_pwd()
    // {
    //     if ($this->user_id > 0) {
    //         header("Location: " . U('User/Index'));
    //     }
    //     $username = I('username');
    //     if (IS_POST) {
    //         if (!empty($username)) {
    //             $this->verifyHandle('forget');
    //             $field = 'mobile';
    //             if (check_email($username)) {
    //                 $field = 'email';
    //             }
    //             $user = M('users')->where("email='$username' or mobile='$username'")->find();
    //             if ($user) {
    //                 session('find_password', array('user_id' => $user['user_id'], 'username' => $username,
    //                     'email' => $user['email'], 'mobile' => $user['mobile'], 'type' => $field));
    //                 header("Location: " . U('User/find_pwd'));
    //                 exit;
    //             } else {
    //                 $this->error("用户名不存在，请检查");
    //             }
    //         }
    //     }
    //     return $this->fetch();
    // }

    function forget_pwd()
    {
        if($this->user_id > 0){
            header("Location: " . U('User/Index'));
        }

        $username = I('username');
        if(IS_POST){
            $logic = new UsersLogic();
            $username = I('username');
            $code = I('mobile_code');
            $password = I('password');
            $scene = 1;
            $user = M('users')->where("mobile='$username'")->find();
            if($user){  
                $session_id = session_id();
                if(check_mobile($username)){
                    $check_code = $logic->check_validate_code($code, $username, 'phone', $session_id , $scene);
                    if($check_code['status'] != 1){
                        $this->error($check_code['msg']);
                    }

                }
                M('users')->where("user_id=" . $user['user_id'])->save(array('password' => encrypt($password)));
                $this->success('新密码已设置行牢记新密码', U('User/index')); 
                    exit;
            }else{
                $this->error("用户名不存在，请检查");
            }

        }
        return $this->fetch();

    }

    function find_pwd()
    {
        if ($this->user_id > 0) {
            header("Location: " . U('User/Index'));
        }
        $user = session('find_password');
        if (empty($user)) {
            $this->error("请先验证用户名", U('User/forget_pwd'));
        }
        $this->assign('user', $user);
        return $this->fetch();
    }


    public function set_pwd()
    {
        if ($this->user_id > 0) {
            header("Location: " . U('User/Index'));
        }
        $check = session('validate_code');
        if (empty($check)) {
            header("Location:" . U('User/forget_pwd'));
        } elseif ($check['is_check'] == 0) {
            $this->error('验证码还未验证通过', U('User/forget_pwd'));
        }
        if (IS_POST) {
            $password = I('post.password');
            $password2 = I('post.password2');
            if ($password2 != $password) {
                $this->error('两次密码不一致', U('User/forget_pwd'));
            }
            if ($check['is_check'] == 1) {
                $user = M('users')->where("mobile = '{$check['sender']}' or email = '{$check['sender']}'")->find();
                if($user){
                	M('users')->where("user_id=" . $user['user_id'])->save(array('password' => encrypt($password)));
			session('validate_code', null);
                	$this->success('新密码已设置行牢记新密码', U('User/index')); 
                	exit;
                }else{
                	$this->error('操作失败，请稍后再试',U('User/forget_pwd'));
                }               
            } else {
                $this->error('验证码还未验证通过', U('User/forget_pwd'));
            }
        }
        $is_set = I('is_set', 0);
        $this->assign('is_set', $is_set);
        return $this->fetch();
    }
 
    /**
     * 验证码验证
     * $id 验证码标示
     */
    private function verifyHandle($id)
    {
        $verify = new Verify();
        if (!$verify->check(I('post.verify_code'), $id ? $id : 'user_login')) {
            $this->error("验证码错误");
        }
    }

    /**
     * 验证码获取
     */
    public function verify()
    {
        //验证码类型
        $type = I('get.type') ? I('get.type') : 'user_login';
        $config = array(
            'fontSize' => 40,
            'length' => 4,
            'useCurve' => true,
            'useNoise' => false,
        );
        $Verify = new Verify($config);
        $Verify->entry($type);
    }

    /**
     * 账户管理
     */
    public function accountManage()
    {
        return $this->fetch();
    }

    public function order_confirm()
    {
        $id = I('get.id/d', 0);
        $data = confirm_order($id,$this->user_id);
        if (!$data['status'])
            $this->error($data['msg']);
        else
            $this->success($data['msg']);
    }

    /**
     * 申请退货
     */
    public function return_goods()
    {
        $order_id = I('order_id/d', 0);
        $order_sn = I('order_sn', 0);
        $goods_id = I('goods_id/d', 0);
        $spec_key = I('spec_key');
        
        $c = M('order')->where(["order_id"=>$order_id,"user_id" =>$this->user_id])->count();
        if($c == 0)
        {
            $this->error('非法操作');
            exit;
        }
        $goods = M('goods')->where("goods_id = $goods_id")->find();
        $store = M('store')->where(array('store_id' => $goods['store_id']))->find();
        $return_goods = M('return_goods')->where("order_id = $order_id and goods_id = $goods_id and spec_key = '$spec_key'")->find();
        if (!empty($return_goods)) {
            $this->success('已经提交过退货申请!', U('Mobile/User/return_goods_info', array('id' => $return_goods['id'])));
            exit;
        }
        if (IS_POST) {
            $files = $this->request->file("return_imgs");
            $validate = ['size'=>1024 * 1024 * 3,'ext'=>'jpg,png,gif,jpeg'];
            $dir = 'public/upload/return_goods/';
            if (!($_exists = file_exists($dir))){
                $isMk = mkdir($dir);
            }
            $parentDir = date('Ymd');
            
            foreach($files as $key => $file){
                $info = $file->rule($parentDir)->validate($validate)->move($dir, true);
                if($info){
                    $filename = $info->getFilename();
                    $new_name = '/'.$dir.$parentDir.'/'.$filename;
                    $return_imgs[]= $new_name;
                }else{
                    $this->error($info->getError());//上传错误提示错误信息
                }
            }
            $data['imgs'] = implode(',', $return_imgs);// 上传的图片文件

            $data['order_id'] = $order_id;
            $data['order_sn'] = $order_sn;
            $data['goods_id'] = $goods_id;
            $data['addtime'] = time();
            $data['user_id'] = $this->user_id;
            $data['type'] = I('type'); // 服务类型  退货 或者 换货
            $data['reason'] = I('reason'); // 问题描述     
            $data['spec_key'] = I('spec_key'); // 商品规格
            $data['store_id'] = $store['store_id'];
            M('return_goods')->add($data);
            $this->success('申请成功,客服第一时间会帮你处理', U('Mobile/User/order_list'));
            exit;
        }

        $province_name = M('region')->where(array('id'=>$store['province_id']))->getField('name');
        $city_name= M('region')->where(array('id'=>$store['city_id']))->getField('name');
        $district_name = M('region')->where(array('id'=>$store['district']))->getField('name');
        $store_region = $province_name . ',' . $city_name . ',' . $district_name . ',';
        $this->assign('goods', $goods);
        $this->assign('order_id', $order_id);
        $this->assign('order_sn', $order_sn);
        $this->assign('goods_id', $goods_id);
        $this->assign('store_region', $store_region);
        $this->assign('store', $store);
        return $this->fetch();
    }

    /**
     * 退换货列表
     */
    public function return_goods_list()
    {
        $count = M('return_goods')->where("user_id = {$this->user_id}")->count();
        $page = new Page($count, 4);
        $list = M('return_goods')->where("user_id = {$this->user_id}")->order("id desc")->limit("{$page->firstRow},{$page->listRows}")->select();
        $goods_id_arr = get_arr_column($list, 'goods_id');
        if (!empty($goods_id_arr))
            $goodsList = M('goods')->where("goods_id in (" . implode(',', $goods_id_arr) . ")")->getField('goods_id,goods_name');
        $this->assign('goodsList', $goodsList);
        $this->assign('list', $list);
        $this->assign('page', $page->show());// 赋值分页输出                    	    	
        if ($_GET['is_ajax']) {
            return $this->fetch('return_ajax_goods_list');
            exit;
        }
        return $this->fetch();
    }

    /**
     *  退货详情
     */
    public function return_goods_info()
    {
        $id = I('id/d', 0);
        $return_goods = M('return_goods')->where("id = $id")->find();
        if ($return_goods['imgs'])
            $return_goods['imgs'] = explode(',', $return_goods['imgs']);
        $goods = M('goods')->where("goods_id = {$return_goods['goods_id']} ")->find();
        $this->assign('goods', $goods);
        $this->assign('return_goods', $return_goods);
        return $this->fetch();
    }
    
    public  function recharge(){
       	$order_id = I('order_id/d');
        $paymentList = M('Plugin')->where("`type`='payment' and code!='cod' and status = 1 and  scene in(0,1)")->select();        
        //微信浏览器
        if(strstr($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
            $paymentList = M('Plugin')->where("`type`='payment' and status = 1 and code='weixin'")->select();            
        }        
        $paymentList = convert_arr_key($paymentList, 'code');

        foreach($paymentList as $key => $val)
        {
            $val['config_value'] = unserialize($val['config_value']);
            if($val['config_value']['is_bank'] == 2)
            {
                $bankCodeList[$val['code']] = unserialize($val['bank_code']);
            }
        }
        $bank_img = include 'Application/Home/Conf/bank.php'; // 银行对应图片
        $payment = M('Plugin')->where("`type`='payment' and status = 1")->select();
        $this->assign('paymentList',$paymentList);
        $this->assign('bank_img',$bank_img);
        $this->assign('bankCodeList',$bankCodeList);
        
        if($order_id>0){
        	$order = M('recharge')->where("order_id = $order_id")->find();    
        	$this->assign('order',$order);
        }    
    	return $this->fetch();
    }
    /**
     * 申请提现记录
     */
    public function withdrawals(){

        C('TOKEN_ON',true);
        if(IS_POST)
        {
            $this->verifyHandle('withdrawals');                               
    		$data = I('post.');
    		$data['user_id'] = $this->user_id;    		    		
    		$data['create_time'] = time();                
            $distribut_min = tpCache('distribut.min'); // 最少提现额度
            $distribut_need  = tpCache('distribut.need'); //满多少才能提
            if($data['money'] < $distribut_min)
            {
                $this->error('每次最少提现额度'.$distribut_min);
            }
            if($data['money'] > $this->user['user_money'])
            {
                $this->error("你最多可提现{$this->user['user_money']}账户余额.");
            } 
            if($this->user['user_money']<$distribut_need){
                $this->error('账户余额最少达到'.$distribut_need.'才能提现');
            }    

            $withdrawal = M('withdrawals')->where(array('user_id'=>$this->user_id,'status'=>0))->sum('money');
            if($this->user['user_money'] < ($withdrawal+$data['money'])){
            	$this->error('您有提现申请待处理，本次提现余额不足');
            }
    		if(M('withdrawals')->add($data)){
    			$bank['bank_name'] = $data['bank_name'];
    			$bank['bank_card'] = $data['account_bank'];
    			$bank['realname'] = $data['account_name'];
    			M('users')->where(array('user_id'=>$this->user_id))->save($bank);
    			$this->success("已提交申请");exit;
    		}else{
    			$this->error('提交失败,联系客服!');
    		}
        }

        $where = " user_id = {$this->user_id}";
        $count = M('withdrawals')->where($where)->count();
        $page = new Page($count,16);
        $list = M('withdrawals')->where($where)->order("id desc")->limit("{$page->firstRow},{$page->listRows}")->select();

        $this->assign('page', $page->show());// 赋值分页输出
        $this->assign('list',$list); // 下线
        if($_GET['is_ajax'])
        {
            return $this->fetch('ajaxx_withdrawals_list');
      
        }
        $order_count = M('order')->where("user_id = {$this->user_id}")->count(); // 我的订单数
        $goods_collect_count = M('goods_collect')->where("user_id = {$this->user_id}")->count(); // 我的商品收藏
        $comment_count = M('comment')->where("user_id = {$this->user_id}")->count();//  我的评论数
        $coupon_count = M('coupon_list')->where("uid = {$this->user_id}")->count(); // 我的优惠券数量
        $level_name = M('user_level')->where("level_id = '{$this->user['level']}'")->getField('level_name'); // 等级名称
        $this->assign('level_name', $level_name);
        $this->assign('order_count', $order_count);
        $this->assign('goods_collect_count', $goods_collect_count);
        $this->assign('comment_count', $comment_count);
        $this->assign('coupon_count', $coupon_count);
        return $this->fetch();
    }



    // 选择城市
    public function choosecity(){
		return $this->fetch();
    }
    // 我的-设置-个人资料-绑定手机号
    public function bindPhone(){
        $mobile = M('users')->where(array('user_id' => $this->user_id))->field('mobile')->limit(1)->select();
        if (!empty($mobile)){
            $mobile = $mobile[0]['mobile'];
        }else{
            $mobile = '未获取到绑定手机号';
        }
        $this->assign('mobile', $mobile);
		return $this->fetch();
    }
     // 我的-设置-个人资料-更改手机号
    public function changephone(){
        $mobile = M('users')->where(array('user_id' => $this->user_id))->field('mobile')->limit(1)->select();
        if (!empty($mobile)){
            $mobile = $mobile[0]['mobile'];
        }else{
            $mobile = '未获取到绑定手机号';
        }
        $this->assign('mobile', $mobile);
		return $this->fetch();
    }
    // 收货人信息列表
    public function confirmOrder(){
		return $this->fetch();
    
    }
    // 我的-设置-个人资料-联系我们
    public function contact(){
		return $this->fetch();
    }
    // 我的-我的优惠券
    public function couponew(){
        $quan = M('ticket_hold')->where(array('user_id' => $this->user_id))->field('ticket_id,ticket_number')->select();
        $arr = array();
       foreach ($quan as $key => &$value) {
           $arr[$value['ticket_id']] = $value['ticket_number'];

       }
       if(!$arr[0]){
        $arr[0] =0;
       }
        if(!$arr[1]){
        $arr[1] =0;
       }
        if(!$arr[2]){
        $arr[2] =0;
       }
        if(!$arr[3]){
        $arr[3] =0;
       }
        if(!$arr[4]){
        $arr[4] =0;
       }
        if(!$arr[5]){
        $arr[5] =0;
       }
       if(!$arr[6]){
        $arr[6] =0;
       }
       //var_dump($arr);
        
        $this->assign('quan',$arr);

		return $this->fetch();
    }
    // 我的-设置-个人资料-修改密码
    public function editPass(){
		return $this->fetch();
    }
    // 订单详情
    public function evaluate(){

        $order_id = I('order_id');
        if(!$order_id){
            $this->error('违规操作');
        }
        $user_id = $this->user_id;
        //查出订单商品
        $order_goods= Db::name('order_goods')->alias('a')
        ->join('goods b','b.goods_id = a.goods_id','LEFT')
        ->where('a.order_id',$order_id)
        ->field('a.goods_id,b.store_id,b.original_img')
        ->find();

        $this->assign('order_goods',$order_goods);
        $this->assign('order_id',$order_id);
        $this->assign('user_id',$user_id);
		return $this->fetch();
    }
    // 我的-设置-个人资料-意见反馈
    public function feedback(){
		return $this->fetch();
    }
    // 个人中心
    public function indexnew(){
        $user_id = $this->user_id;
        $user_info = Db::name('users')->where('user_id',$user_id)->field('nickname,head_pic')->limit(1)->select()[0];
        $star = Db::name('team')->where('user_id',$user_id)->field('star')->limit(1)->select()[0]['star'];
        $zquan = Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>0])->field('ticket_number')->limit(1)->select()[0]['ticket_number'];
        if ($zquan <0){
            $zquan = 0;
        }
        $yidai = count(Db::name('team')->where('parent_id',$user_id)->field('user_id')->select());
        if (empty($user_info['head_pic'])){
            $user_info['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
        }
	if (empty($user_info['nickname'])){
            $user_info['nickname'] = '没有名字的臭猪';
        }
        //未付款的订单数量
        $daifu = Db::name('order')->where('order_status',0)->where('user_id',$user_id)->count();

        $weifa = Db::name('order')->where('order_status',1)->where('shipping_status',0)->where('user_id',$user_id)->count();

        $daishou = Db::name('order')->where('order_status',1)->where('shipping_status',1)->where('user_id',$user_id)->count();

        // $daiping = Db::name('order')->where('order_status',3)->where('user_id',$user_id)->count();

        // $yiping = Db::name('order')->where('order_status',4)->where('user_id',$user_id)->count();

        // $shouhou = Db::name('order')->where('order_status',5)->where('user_id',$user_id)->count();

        $this->assign('user_info',$user_info);
        $this->assign('star',$star);
        $this->assign('zquan',$zquan);
        $this->assign('yidai',$yidai);
        $this->assign('daifu',$daifu);
        $this->assign('weifa',$weifa);
        $this->assign('daishou',$daishou);
        // $this->assign('daiping',$daiping);
        //$this->assign('yiping',$yiping);
        //$this->assign('shouhou',$shouhou);
		return $this->fetch();
    }
    //  我的-设置-个人资料-昵称   
    public function nickname(){
		return $this->fetch();
    }
    //订单生成     
    public function orderCreate(){
		return $this->fetch();
    }
    // 订单详情
    public function orderDetailNew(){
		return $this->fetch();
    }
    // 我的-设置-个人资料
    public function personData(){
		return $this->fetch();
     }
    //  收货人信息列表
    public function receivelist(){
		return $this->fetch();
    }
    // 收货人信息
    public function receivemsg(){
		return $this->fetch();
    }
    // 我的-设置资料
    public function settingNew(){
        $user_info = M('users')->where("user_id = $this->user_id")->limit(1)->field('user_id,head_pic,nickname,mobile')->select();
        if (empty($user_info[0]['head_pic'])){
            $user_info[0]['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
        }
        if (empty($user_info[0]['nickname'])){
            $user_info[0]['nickname'] = '没有名字的臭猪';
        }
        $this->assign('user_info',$user_info[0]);
		return $this->fetch();
    }
    // 钱包-交易记录-Z券
    public function ticketMan(){
		return $this->fetch();
    }
    // 钱包-交易记录-Z券
    public function tradeFloorZ(){
        //获取用户信息
        $user_info = M('users')->where("user_id = $this->user_id")->limit(1)->field('user_id,head_pic,nickname')->select();
        if (empty($user_info[0]['head_pic'])){
            $user_info[0]['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
        }
        if (empty($user_info[0]['nickname'])){
            $user_info[0]['nickname'] = '没有名字的臭猪';
        }
        //Z券数据
        $zquan = M('ticket_hold')->where("user_id = $this->user_id AND ticket_id= 0")->limit(1)->field('ticket_number')->select();
        $yue = M('ticket_hold')->where("user_id = $this->user_id AND ticket_id= 5")->limit(1)->field('ticket_number')->select();
        $text = M('ticket_change')->where("ticket_change_user_id = $this->user_id AND ticket_change_number>1")->field('ticket_change_add,ticket_change_number,ticket_change_time,ticket_change_type')->order('ticket_change_time desc')->select();
        if (!empty($text)){
            foreach ($text as $k => $v){
                $text[$k]['ticket_change_time'] = substr($v['ticket_change_time'],0,-9);
                $arr_time[$text[$k]['ticket_change_time']][$k]['ticket_change_number'] = $v['ticket_change_number'];
                $arr_time[$text[$k]['ticket_change_time']][$k]['ticket_change_add'] = $v['ticket_change_add'];
                $arr_time[$text[$k]['ticket_change_time']][$k]['ticket_change_type'] = $v['ticket_change_type'];
            }

            $weekarray=array("日","一","二","三","四","五","六");
            foreach ($arr_time as $key=> $value){
                $arr_time1[date('Y.m.d-',strtotime($key)).'星期'.$weekarray[date('w',strtotime($key))]] = array_values($value);
                $arr_count[date('Y.m.d-',strtotime($key)).'星期'.$weekarray[date('w',strtotime($key))]] = count($value);
            }
        }
//        var_dump($arr_time1);die;
        $this->assign('zquan',$zquan[0]['ticket_number']);
        $this->assign('yue',$yue[0]['ticket_number']);
        $this->assign('arr_count',$arr_count);
        $this->assign('user_info',$user_info[0]);
        $this->assign('arr_time1',$arr_time1);
		return $this->fetch();
    }
    public function tradingFloor(){
        //获取用户信息
        $user_info = M('users')->where("user_id = $this->user_id")->limit(1)->field('user_id,head_pic,nickname')->select();
        if (empty($user_info[0]['head_pic'])){
            $user_info[0]['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
        }
        if (empty($user_info[0]['nickname'])){
            $user_info[0]['nickname'] = '没有名字的臭猪';
        }
        //挂售券数据
        $guashou = M('ticket_hold')->where("user_id = $this->user_id AND ticket_id= 4")->limit(1)->field('ticket_number')->select();
        //余额券数据
        $yue = M('ticket_hold')->where("user_id = $this->user_id AND ticket_id= 5")->limit(1)->field('ticket_number')->select();
        //交易记录
        $text = M('ticket_change')
                ->where("ticket_change_user_id = $this->user_id AND ticket_change_type in(6,7,8,9) AND ticket_change_number>1")
                ->field('ticket_change_add,ticket_change_number,ticket_change_time,ticket_change_type')
                ->order('ticket_change_time desc')
                ->select();
        if (!empty($text)){
            foreach ($text as $k => $v){
                $text[$k]['ticket_change_time'] = substr($v['ticket_change_time'],0,-9);
                $arr_time[$text[$k]['ticket_change_time']][$k]['ticket_change_number'] = $v['ticket_change_number'];
                $arr_time[$text[$k]['ticket_change_time']][$k]['ticket_change_add'] = $v['ticket_change_add'];
                $arr_time[$text[$k]['ticket_change_time']][$k]['ticket_change_type'] = $v['ticket_change_type'];
            }

            $weekarray=array("日","一","二","三","四","五","六");
            foreach ($arr_time as $key=> $value){
                $arr_time1[date('Y.m.d-',strtotime($key)).'星期'.$weekarray[date('w',strtotime($key))]] = array_values($value);
                $arr_count[date('Y.m.d-',strtotime($key)).'星期'.$weekarray[date('w',strtotime($key))]] = count($value);
            }
        }
//        var_dump($arr_time1);die;
        $this->assign('guashou',$guashou[0]['ticket_number']);
        $this->assign('yue',$yue[0]['ticket_number']);
        $this->assign('user_info',$user_info[0]);
        $this->assign('arr_count',$arr_count);
        $this->assign('arr_time1',$arr_time1);
        return $this->fetch();
    }
    // 钱包-交易大厅-挂售券
    public function scaleList(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $sell_all = M('ticket_sell')->where("on_sell = 1 AND sell_number > 1")->order('sell_time')->field('sell_id,sell_user_id,sell_number')->select();
        $sum = 0;
        if (!empty($sell_all)){
            for ($i=0;$i<count($sell_all);$i++){
                $sum+=$sell_all[$i]['sell_number'];
            }
        }
        $this->assign('ticket_price',$ticket_price);
        $this->assign('sell_all',$sell_all);
        $this->assign('sum',$sum);
    	return $this->fetch();
    }

    public function scaleList_do(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $sell_id = $_POST['sellId'];
        $sell_userid = $_POST['sellUserId'];
        $sell_num = $_POST['sellNum'];
        $yue = M('ticket_hold')->where(array('user_id' => $this->user_id,'ticket_id'=>5))->field('ticket_number')->limit(1)->select();
        if ($yue[0]['ticket_number'] < $sell_num*$ticket_price){
            echo "0";die;
        }
        //修改挂售状态
        Db::name('ticket_sell')->where(['sell_id'=>$sell_id,'on_sell'=>1])->save(array('sell_buy_id'=>$this->user_id,'sell_time'=>date('Y-m-d H:i:s',time()),'sell_money'=>$ticket_price*$sell_num,'on_sell'=>0));
        //增加购买用户的万用券
        Db::name('ticket_hold')->where(['user_id'=>$this->user_id,'ticket_id'=>3])->setInc('ticket_number',$sell_num);
        //增加卖家余额
        Db::name('ticket_hold')->where(['user_id'=>$sell_userid,'ticket_id'=>5])->setInc('ticket_number',$ticket_price*$sell_num);
        //减少购买用户余额
        Db::name('ticket_hold')->where(['user_id'=>$this->user_id,'ticket_id'=>5])->setDec('ticket_number',$ticket_price*$sell_num);
        $insert_arr[] = array(
            'ticket_change_user_id'=> $this->user_id,  //用户id
            'ticket_id'            => 3,         //券种类 5为余额券
            'ticket_change_number' => $sell_num,      //变化量
            'ticket_change_add'    => 1,         //增减  1为增
            'ticket_change_type'   => 7,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $this->user_id,  //用户id
            'ticket_id'            => 5,         //券种类 5为余额券
            'ticket_change_number' => $sell_num,      //变化量
            'ticket_change_add'    => 0,         //增减  1为增
            'ticket_change_type'   => 8,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $sell_userid,  //用户id
            'ticket_id'            => 5,         //券种类 5为余额券
            'ticket_change_number' => $ticket_price*$sell_num,      //变化量
            'ticket_change_add'    => 1,         //增减  1为增
            'ticket_change_type'   => 7,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        $db = Db::name('ticket_change')->insertAll($insert_arr);
        if ($db!=false){
            echo 1;
        }else{
            echo 0;
        }
    }
    // 我的钱包
    public function wallet(){
        $yue = M('ticket_hold')->where(array('user_id' => $this->user_id,'ticket_id'=>5))->field('ticket_number')->limit(1)->select();
        $zquan = M('ticket_hold')->where(array('user_id' => $this->user_id,'ticket_id'=>0))->field('ticket_number')->limit(1)->select();
	    $this->assign('yue',$yue[0]['ticket_number']);
	    $this->assign('zquan',$zquan[0]['ticket_number']);
	    return $this->fetch();
    }
     // 分享二维码
     public function shareCode(){
        $invitatecode =  M('users')->where(array('user_id' => $this->user_id))->field('invitatecode,head_pic')->limit(1)->select();        
        $this->assign('invitecode',$invitatecode[0]['invitatecode']);
	    if(empty($invitatecode[0]['head_pic'])){
		    $head_pic = "__STATIC__/images/newimg/usr/userimg.png";
		    $this->assign('head_pic',$head_pic);
	    }else{
		    $this->assign('head_pic',$invitatecode[0]['head_pic']);
	    }
	return $this->fetch();
    }
     // 转余额
     public function accounts(){
         $yue =  M('ticket_hold')->where(array('user_id' => $this->user_id,'ticket_id'=>5))->field('ticket_number')->limit(1)->select();
         $this->assign('yue',$yue[0]['ticket_number']);
		return $this->fetch();
    }
    public function accounts_do(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $tel = $_POST['tel'];
        $max = $_POST['max'];
        $yue = $_POST['yue'];
        $paypwd = $_POST['paypwd'];
        $do = Db::name('users')->where(['user_id'=>$this->user_id])->limit(1)->field('mobile,paypwd')->select();
        $paypwds =$do[0]['paypwd'];
        if ($max <$yue){
            echo '余额不足';die;
        }
        if ($paypwds ==''){
            $paypwds = substr($do[0]['mobile'],5);
        }
        if ($paypwds != $paypwd){
            echo '交易密码错误';die;
        }
        $user = Db::name('users')->where(['mobile'=>$tel])->limit(1)->field('user_id')->select();

        if (empty($user)){
            echo '对方账号不存在';die;
        }
        $user_id = $user[0]['user_id'];
        Db::name('ticket_hold')->where(['user_id'=>$this->user_id,'ticket_id'=>5])->setDec('ticket_number',$yue);
        Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>5])->setInc('ticket_number',$yue);

        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $this->user_id,  //用户id
            'ticket_id'            => 5,         //券种类 5为余额券
            'ticket_change_number' => $yue,      //变化量
            'ticket_change_add'    => 0,         //增减  0为减
            'ticket_change_type'   => 4,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $user_id,  //用户id
            'ticket_id'            => 5,         //券种类 5为余额券
            'ticket_change_number' => $yue,      //变化量
            'ticket_change_add'    => 1,         //增减  1为增
            'ticket_change_type'   => 4,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        Db::name('ticket_change')->insertAll($insert_arr);
            echo 1;
    }
     // 兑换
     public function exchangeTicket(){
         $wanyong =  M('ticket_hold')->where(array('user_id' => $this->user_id,'ticket_id'=>3))->field('ticket_number')->limit(1)->select();
         $this->assign('wanyong',$wanyong[0]['ticket_number']);
		return $this->fetch();
    }
    public function exchangeTicket_self(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $paypwd = $_POST['paypwd'];
        $type = $_POST['type'];
        $number = $_POST['number'];
        $do = Db::name('users')->where(['user_id'=>$this->user_id])->limit(1)->field('mobile,paypwd')->select();
        $paypwds =$do[0]['paypwd'];
        if ($paypwds ==''){
            $paypwds = substr($do[0]['mobile'],5);
        }
        if ($paypwds!= $paypwd){
            echo 0;
        }
        Db::name('ticket_hold')->where(['user_id'=>$this->user_id,'ticket_id'=>3])->setDec('ticket_number',$number);
        if ($type==1 ){
            Db::name('ticket_hold')->where(['user_id'=>$this->user_id,'ticket_id'=>$type])->setInc('ticket_number',$number*$ticket_price);
        }else{
            Db::name('ticket_hold')->where(['user_id'=>$this->user_id,'ticket_id'=>$type])->setInc('ticket_number',$number);
        }
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $this->user_id,  //用户id
            'ticket_id'            => 3,         //券种类 5为余额券
            'ticket_change_number' => $number,      //变化量
            'ticket_change_add'    => 0,         //增减  0为减
            'ticket_change_type'   => 4,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        if ($type==1 ){
            $insert_arr[] = array(          //挂售券增加
                'ticket_change_user_id'=> $this->user_id,  //用户id
                'ticket_id'            => $type,         //券种类 5为余额券
                'ticket_change_number' => $number*$ticket_price,      //变化量
                'ticket_change_add'    => 1,         //增减  1为增
                'ticket_change_type'   => 4,         // 变化原因  4为交易产生的增或减
                'ticket_price'         => $ticket_price,
                'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
            );
        }else{
            $insert_arr[] = array(          //挂售券增加
                'ticket_change_user_id'=> $this->user_id,  //用户id
                'ticket_id'            => $type,         //券种类 5为余额券
                'ticket_change_number' => $number,      //变化量
                'ticket_change_add'    => 1,         //增减  1为增
                'ticket_change_type'   => 4,         // 变化原因  4为交易产生的增或减
                'ticket_price'         => $ticket_price,
                'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
            );
        }

        $db = Db::name('ticket_change')->insertAll($insert_arr);
        if ($db!=false){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function exchangeTicket_other(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $paypwd = $_POST['paypwd'];
        $number = $_POST['number'];
        $other_id = $_POST['other_id'];
        $do = Db::name('users')->where(['user_id'=>$this->user_id])->limit(1)->field('mobile,paypwd')->select();
        $paypwds =$do[0]['paypwd'];
        if ($paypwds ==''){
            $paypwds = substr($do[0]['mobile'],5);
        }
        if ($paypwds!= $paypwd){
            echo 0;die;
        }
        $ids = Db::name('users')->where(['mobile'=>$other_id])->limit(1)->field('user_id')->select();
        $user_id = $ids[0]['user_id'];
        Db::name('ticket_hold')->where(['user_id'=>$this->user_id,'ticket_id'=>3])->setDec('ticket_number',$number);
        Db::name('ticket_hold')->where(['user_id'=>$user_id,'ticket_id'=>3])->setInc('ticket_number',$number);
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $this->user_id,  //用户id
            'ticket_id'            => 3,         //券种类 5为余额券
            'ticket_change_number' => $number,      //变化量
            'ticket_change_add'    => 0,         //增减  0为减
            'ticket_change_type'   => 4,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $user_id,  //用户id
            'ticket_id'            => 3,         //券种类 5为余额券
            'ticket_change_number' => $number,      //变化量
            'ticket_change_add'    => 1,         //增减  1为增
            'ticket_change_type'   => 4,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        $db = Db::name('ticket_change')->insertAll($insert_arr);
        if ($db!=false){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function sellout_do(){
        $ticket_price = Db::name('coupon_price')->select()[0]['coupon_price'];
        $scaleNum = $_POST['scaleNum'];
        if ($scaleNum==0){
            echo 0;die;
        }
        M('ticket_hold')->where(array('user_id' => $this->user_id,'ticket_id'=>4))->setDec('ticket_number',$scaleNum);
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $this->user_id,  //用户id
            'ticket_id'            => 4,         //券种类 5为余额券
            'ticket_change_number' => $scaleNum,      //变化量
            'ticket_change_add'    => 0,         //增减  1为增
            'ticket_change_type'   => 4,         // 变化原因  4为交易产生的增或减
            'ticket_price'         => $ticket_price,
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        Db::name('ticket_change')->insertAll($insert_arr);
        $insert_sell = array(
            'sell_user_id' => $this->user_id,
            'sell_number'  => $scaleNum ,
            'sell_time'    => date('Y-m-d H:i:s',time())
        );
        $sell = Db::name('ticket_sell')->insert($insert_sell);
        if ($sell!=false){
            echo 1;
        }else{
            echo 2;
        }
    }


    // 我的关注
    public function myInterest(){
        $user_id = $this->user_id;

        $store_list = Db::name('store_collect')->alias('a')->join('store b','b.store_id = a.store_id','LEFT')->where('a.user_id',$user_id)->field('a.log_id,b.store_name,a.store_id,b.store_logo,b.store_collect')->select();
        $this->assign('store_list',$store_list);
        return $this->fetch();
    }
    public function delmyInterest(){
        $log_id = I('log_id');

        $result = Db::name('store_collect')->where('log_id',$log_id)->delete();
        if($result){
            return array('status'=>1,'msg'=>"删除成功");
        }else{
            return array('status'=>-1,'msg'=>"删除失败");
        }

    }


    // 我的收藏
    public function mycollect()
    {
        $user_id = $this->user_id;

        $goods_list = Db::name('goods_collect')->alias('a')->join('goods b','b.goods_id = a.goods_id','LEFT')->where('a.user_id',$user_id)->field('a.collect_id,b.goods_name,a.goods_id,b.original_img,b.shop_price,b.collect_sum')->select();

        $this->assign('goods_list',$goods_list);

        return $this->fetch();
    }


    public function delmycollect(){
        $collect_id = I('collect_id');

        $result = Db::name('goods_collect')->where('collect_id',$collect_id)->delete();
        if($result){
            return array('status'=>1,'msg'=>"删除成功");
        }else{
            return array('status'=>-1,'msg'=>"删除失败");
        }


    }

    // 退款售后
    public function afterScale(){
        return $this->fetch();
    }
    // 退款详情
    public function afterScaleDetail(){
        return $this->fetch();
    }
    // 物流
    public function logistics(){
        $order_id = I('order_id');
        if(!$order_id){
            $this->error('违规操作');
        }

        //查询订单详情

        $order_info = Db::name('delivery_doc')->where('order_id',$order_id)->find();



        $shipping_code = $order_info['invoice_no'];
        //查询订单 
        $host = "https://wuliu.market.alicloudapi.com";//api 访问链接
        $path = "/kdi"; //访问后缀
        $method = "GET";
        $appcode = "5768afcab17541cf99588524369c8246";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "no=$shipping_code";  //参数写在这里
        $bodys = "";
        $url = $host . $path . "?" . $querys;//url拼接

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        $wuliu_info = json_decode(curl_exec($curl),1);
        
        $list = $wuliu_info['result']['list'];
        foreach ($list as $key => &$value) {
            $value['riqi'] = date( 'm-d ',strtotime($value['time']));
            $value['shijian'] = date('H:i:s',strtotime($value['time']));

        }
        //dump($list);

        $this->assign('list',$list);
        return $this->fetch();
    }
//    public function get_team_infos(){
//
//        $user_id = Db::name('team')->where('team_people = 0')->order('team_lirun')->field('user_id')->limit(2)->select();
//        foreach($user_id as $v){
//            $count  = $this->get_team_infoaa($v['user_id']);
//            Db::name('team')->where('user_id',$v['user_id'])->save(array('team_people'=>$count));
//        }
//
//        var_dump($count);die;
//    }
//
//    public function get_team_infoaa($id,$number = 1){
//        $arr = Db::name('team')->where(['parent_id'=>$id])->field('user_id')->select();
//        $number = $number + count($arr);
//        if (!empty($arr)){
//            foreach($arr as $k => $v){
////                $number = $number+1;
//                $number =  $this->get_team_infoaa($v['user_id'],$number);
//            }
//
//        }
//        return $number;
//    }
     // 团队收益
     public function teamReturn(){
         //用户信息
         $user_inf = Db::name('users')->where(['user_id'=>$this->user_id])->field('nickname,head_pic')->select()[0];
         if ($user_inf['head_pic']==''){
             $user_inf['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
         }
         if ($user_inf['nickname']==''){
             $user_inf['nickname'] = '没有名字';
         }
         //用户星级
         $user_info = Db::name('team')->where(['user_id'=>$this->user_id])->field('star,team_lirun,team_people')->select()[0];

         //总金额
         $all_money = $user_info['team_lirun'];
         //团队人数
         $all_count = $user_info['team_people'];
         //一代二代用户信息
         $arr = Db::name('team')->where(['parent_id'=>$this->user_id])->field('user_id')->select();
         if (!empty($arr)){
             foreach($arr as $v ){
                 $yidai[] = $v['user_id'];
             }
             foreach ($yidai as $v){
                 $ar = Db::name('team')->where(['parent_id'=>$v])->field('user_id')->select();
                 foreach($ar as $val){
                     $erdai[] = $val['user_id'];
                 }
             }
             if (empty($erdai)){
                 $yierdai = $yidai;
             }else{
                 $yierdai = array_merge($yidai,$erdai);
             }
             if (count($yierdai)> 6){
                 for ($i = 0;$i<6;$i++){
                     $yierdai_info[$i] = Db::name('users')->where(['user_id'=>$yierdai[$i]])->field('nickname,head_pic')->select();
                 }

                 foreach($yierdai_info as $k =>$v){
                     $yierdai_info[$k] = $v[0];
                 }
                 foreach($yierdai_info as $k =>$v){
                     if ($v['nickname']==''){
                         $yierdai_info[$k]['nickname'] = '没有名字';
                     }
                     if ($yierdai_info[$k]['head_pic']==''){
                         $yierdai_info[$k]['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
                     }
                 }
             }else{
                 if (!empty($yierdai)){
                     for ($i = 0;$i<count($yierdai);$i++){
                         $yierdai_info[$i] = Db::name('users')->where(['user_id'=>$yierdai[$i]])->field('nickname,head_pic')->select();
                     }
                     foreach($yierdai_info as $k =>$v){
                         $yierdai_info[$k] = $v[0];
                     }
                     foreach($yierdai_info as $k =>$v){
                         if ($v['nickname']==''){
                             $yierdai_info[$k]['nickname'] = '没有名字的臭猪';
                         }
                         if ($yierdai_info[$k]['head_pic']==''){
                             $yierdai_info[$k]['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
                         }
                     }
                 }
             }
         }
        //还差多少升级
        $star = $user_info['star'];
         $money = 30000;
         for ($i=0;$i<$star;$i++){
             $money = $money *3;
         }
         $cha = $money-$all_money;
         $person = $all_money/$money*100;
//         //过去七天成长值
//         $data = strtotime(date('Y-m-d',time()));
////         $time = date('Y-m-d H:i:s',$data);
//         for ($i=0;$i<7;$i++){
//             //前一天时间
//             $times = date('Y-m-d H:i:s',$data-24*60*60*($i+1));
//             //今日时间
//             $timess = date('Y-m-d H:i:s',$data-24*60*60*($i));
//             foreach($all_money_info as $k => $v){
//                 $day[$i][$k]= Db::name('ticket_change')
//                                ->where("ticket_change_user_id = $k AND ticket_id=0 AND ticket_change_time>'$times' AND ticket_change_time<'$timess'")
//                                ->field('ticket_change_number')
//                                ->select()[0]['ticket_change_number'];
//             }
//            $days[$i]  = array_sum($day[$i]);
//         }
//         var_dump($user_inf);die;
         $this->assign('star',$star);
         $this->assign('person',$person);
         $this->assign('cha',$cha);
//         $this->assign('days',json_encode($days));
         $this->assign('all_money',$all_money);
         $this->assign('yierdai_info',$yierdai_info);
         $this->assign('user_info',$user_inf);
         $this->assign('all_count',$all_count);
        return $this->fetch();
    }

    public function get_team_info($id,$array=array()){
        $arr = Db::name('team')->where(['parent_id'=>$id])->field('user_id,lirun_number')->select();
        if (!empty($arr)){
            foreach($arr as $k => $v){
                $array[$v['user_id']] = $v['lirun_number'];
                $array =  $this->get_team_info($v['user_id'],$array);
            }

        }
        $arr = Db::name('team')->where(['user_id'=>$id])->field('user_id,lirun_number')->select();
        $array[$arr[0]['user_id']] = $arr[0]['lirun_number'];
        return $array;
    }
    // 店铺宝贝分类详情
    public function classifyGoods(){
        return $this->fetch();
    }
    // 团队收益-返利
    public function teamReturnRebate(){

        //获取用户信息
        $user_info = Db::name('users')->where(['user_id'=>$this->user_id])->field('nickname,head_pic')->select()[0];
        if ($user_info['head_pic']==''){
            $user_info['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
        }
        if ($user_info['nickname']==''){
            $user_info['nickname'] = '没有名字';
        }

        //获取一二代信息
        $arr = Db::name('team')->where(['parent_id'=>$this->user_id])->field('user_id')->select();
        if (!empty($arr)){
            foreach($arr as $v ){
                $yidai[] = $v['user_id'];
            }
            if(!empty($yidai)){
                foreach ($yidai as $v){
                    $ar = Db::name('team')->where(['parent_id'=>$v])->field('user_id')->select();
                    foreach($ar as $val){
                        $erdai[] = $val['user_id'];
                    }
                }
            }
        }
        if (!empty($yidai)){
            $yidai_sum = 0;
            foreach ($yidai as $v){
                $yidai_sum +=Db::name('team')
                                ->where("user_id = $v")
                                ->field('lirun_number')
                                ->select()[0]['lirun_number'];
            }
        }
        if (!empty($erdai)){
            $erdai_sum = 0;
            foreach ($erdai as $v){
                $erdai_sum +=Db::name('team')
                    ->where("user_id = $v")
                    ->field('lirun_number')
                    ->select()[0]['lirun_number'];
            }
        }
        $self_number = Db::name('team')
            ->where("user_id = $this->user_id")
            ->field('lirun_number')
            ->select()[0]['lirun_number'];
//        var_dump($self_number);
//        die;
        if (!empty($yidai)){
            for ($i = 0;$i<count($yidai);$i++){
                $yidai_info[$i] = Db::name('users')->join('team','tp_users.user_id =tp_team.user_id')->where(['tp_users.user_id'=>$yidai[$i]])->field('tp_users.nickname,tp_users.head_pic,tp_team.lirun_number')->select()[0];
            }
            foreach($yidai_info as $k =>$v){
                if ($v['nickname']==''){
                    $yidai_info[$k]['nickname'] = '没有名字的臭猪';
                }
                if ($yidai_info[$k]['head_pic']==''){
                    $yidai_info[$k]['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
                }
                $yidai_info[$k]['dai'] = '1';
            }
        }
        if (!empty($erdai)){
            for ($i = 0;$i<count($erdai);$i++){
                $erdai_info[$i] = Db::name('users')->join('team','tp_users.user_id =tp_team.user_id')->where(['tp_users.user_id'=>$erdai[$i]])->field('tp_users.nickname,tp_users.head_pic,tp_team.lirun_number')->select()[0];
            }
            foreach($erdai_info as $k =>$v){
                if ($v['nickname']==''){
                    $erdai_info[$k]['nickname'] = '没有名字的臭猪';
                }
                if ($erdai_info[$k]['head_pic']==''){
                    $erdai_info[$k]['head_pic'] = '__STATIC__/images/newimg/usr/userimg.png';
                }
                $erdai_info[$k]['dai'] = '2';
            }
        }
        if (!empty($erdai_info)){
            $yierdai_info = array_merge($yidai_info,$erdai_info);
        }else{
            $yierdai_info = $yidai_info;
        }
        if (empty($yidai_sum)){
            $yidai_sum = 0;
        }
        if (empty($erdai_sum)){
            $erdai_sum = 0;
        }
        $this->assign('yierdai_count',count($yierdai_info)+1);
        $this->assign('user_info',$user_info);
        $this->assign('self_number',$self_number);
        $this->assign('yidai_sum',$yidai_sum);
        $this->assign('erdai_sum',$erdai_sum);
        $this->assign('yierdai_info',$yierdai_info);
        return $this->fetch();
    }
        // 店铺列表
    public function storelist(){
        return $this->fetch();
    }
    // 店铺
    public function store(){
        return $this->fetch();
    }
     // 店铺全部宝贝
     public function allgoods(){
        return $this->fetch();
    }
     // 店铺宝贝分类
     public function goodsClassify(){
        return $this->fetch();
    }
    // 钱包-转账
    public function transfor(){
        return $this->fetch();
    }
  
    // 会员注册
    public function memberRegistrate(){
        return $this->fetch();
    }
    public function user_register_do(){
        $nickname = I('nickname');
        $mobile   = I('mobile');
        $pwd1     = I('pwd1');
        $pwd2     = I('pwd2');
        if ($nickname== ''){
            echo '请输入用户名';
            die;
        }
        if ($mobile== ''){
            echo '请输入手机号';
            die;
        }
        $tel_preg = '/^[0-9a-zA-Z_]{6,15}$/';
        $tel_match = preg_match($tel_preg,$pwd1);
        if ($tel_match !=1 ){
            echo 1;
        }
        $mobiles = M('users')->where(['mobile' => $mobile])->field('mobile')->limit(1)->select()[0]['mobile'];
        if (!empty($mobiles)){
            echo '用户已注册';
            die;
        }
        if ($pwd1== ''){
            echo '请输入密码';
            die;
        }
        if ($pwd2== ''){
            echo '请输入确认密码';
            die;
        }
        if ($pwd1 != $pwd2){
            echo "两次密码输入不一致";
            die;
        }
        $pwd_preg = '/^[0-9a-zA-Z_]{6,15}$/';
        $tel_match = preg_match($pwd_preg,$pwd1);
        if ($tel_match != 1 ){
            echo 1;
        }
        $invitatecode = randnum();
        $invitatecache = F('invitatecode');
        array_push($invitatecache,$invitatecode);
        F('invitatecode',$invitatecache);
        $insert = array(
            'password' => encrypt($pwd1),
            'reg_time' => time(),
            'nickname' => $nickname,
            'mobile'   => $mobile,
            'mobile_validated' =>1,
            'invitatecode' => $invitatecode,
            'parent_userid' => $this->user_id,
        );
        $user_id = M('users')->add($insert);
        if (!$user_id){
            echo 注册失败;
            die;
        }
        for ($i = 0;$i<7; $i++ ){
            $insert_arr[] = array(          //挂售券增加
                'user_id'=> $user_id,  //用户id
                'ticket_id'            => $i,         //券种类
                'ticket_number' => 0,      //持有量
                'ticket_last_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
            );
        }
        Db::name('ticket_hold')->insertAll($insert_arr);
        $insert_arr1[] = array(
            'user_id'=> $user_id,  //用户id
            'parent_id'            => $this->user_id,         //邀请人id
            'last_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        Db::name('team')->insertAll($insert_arr1);
        $arr = $this->get_all_parents_id($user_id);
        foreach ($arr as $v){
            Db::name('team')->where(array('user_id'=>$v))->setInc('team_people',1);
        }
        echo 1;
    }
         // 分享邀请码新
     public function shareCodeNew(){
        return $this->fetch();
    }
    public function add_comments()
    {
        if (IS_POST) {
            $data['goods_rank'] = $_POST['goods_rank'];
            $data['order_id'] = $_POST['order_id'];
            $data['store_id'] = $_POST['store_id'];
            $data['user_id'] = $_POST['user_id'];
            $data['ship_rank'] = $_POST['ship_rank'];
            $data['fuwu_rank'] = $_POST['fuwu_rank'];
            $data['content'] = $_POST['content'];
            $data['goods_id'] = $_POST['goods_id'];
            $data['img'] = $_POST['imgs'];
            $data['add_time'] = time();
            $data['ip_address'] = $_SERVER["REMOTE_ADDR"];
            $result = Db::name('comment')->insertGetId($data);

           if($result){
                Db::name('order')->where('order_id',$data['order_id'])->save(array('order_status'=>4));

               return  array('status'=>1,'msg'=>'评论成功');
           }else{
               return array('status'=>-1,'msg'=>'评论失败');
           }



        }

        
    }
    
    public function update_nickname(){
        $nickname = I('nickname');
        $db = M('users')->where(array('user_id' => $this->user_id))->save(array('nickname' => $nickname));
        if ($db == true){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function editPayPass(){
        return $this->fetch();
    }
    public function editPayPassDo(){
        $old_paypwd = I('old_paypwd');
        $paypwd = I('paypwd');
        $user = M('users')->where(['user_id' => $this->user_id])->field('mobile,paypwd')->limit(1)->select()[0];
        $old_paypwds = $user['paypwd'];
        if ($old_paypwds==''){
            $old_paypwds = substr($user['mobile'],5);
        }
        if ($old_paypwd != $old_paypwds){
            echo '原密码错误';die;
        }
        $db = M('users')->where(array('user_id' => $this->user_id))->save(array('paypwd' => $paypwd));
            if ($db != false){
                echo 1;
            }else{
                echo '服务器错误';die;
            }

    }
    public function editPassDo(){
        $old_pwd = I('old_pwd');
        $pwd = I('pwd1');
        $old_pwds = M('users')->where(['user_id' => $this->user_id])->field('password')->limit(1)->select()[0]['password'];
        if (encrypt($old_pwd) != $old_pwds){
            echo '原密码错误';die;
        }
        $db = M('users')->where(array('user_id' => $this->user_id))->save(array('password' => encrypt($pwd)));
        if ($db != false){
            echo 1;
        }else{
            echo '服务器错误';die;
        }
    }
    // 各类收益
    public function teamReturnOther(){
        return $this->fetch();
    }

    public function userRecharge(){
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
    public function userRecharge_do(){
        $mobile = I('mobile');
        $ticket = I('ticket');
        $number = I('number');
        $paypwd = I('paypwd');
        if (empty($mobile)){
            echo '你要给谁充啊彭奶奶';
            die;
        }
        if ($ticket == ''){
            echo '你要给他充什么券啊彭奶奶奶';
            die;
        }
        if (empty($number)){
            echo '你要给他充多少啊彭奶奶';
            die;
        }
        if (empty($paypwd)){
            echo '密码呢彭奶奶';
            die;
        }
        if (encrypt($paypwd)!= '519475228fe35ad067744465c42a19b2'){
            echo '密码不对啊';
            die;
        }
        $mobiles = M('users')->where(['mobile' => $mobile])->field('mobile,user_id')->limit(1)->select();
        if (empty($mobiles)){
            echo '手机号不对啊彭奶奶';
            die;
        }
        Db::name('ticket_hold')->where(array('user_id' => $mobiles[0]['user_id'],'ticket_id' => $ticket))->setInc('ticket_number', $number);
        $insert_arr[] = array(          //挂售券增加
            'ticket_change_user_id'=> $mobiles[0]['user_id'],  //用户id
            'ticket_id'            => $ticket,         //券种类
            'ticket_change_number' => $number,      //变化量
            'ticket_change_add'    => 1,         //增减  1为增
            'ticket_change_type'   => 16,         // 变化原因
            'ticket_change_time'   => date('Y-m-d H:i:s',time()) //变化时间
        );
        Db::name('ticket_change')->insertAll($insert_arr);
        echo 1;die;
    }

    // 测试
    public function test()
    {
        return $this->fetch();
    }
}