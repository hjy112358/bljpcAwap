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
 * $Author: IT宇宙人 2015-08-10 $
 */ 
namespace app\mobile\controller;
use think\Db;
use app\api\controller\Ticket;

class Cart extends MobileBase {
    public $ticketLogic;
    public $cartLogic; // 购物车逻辑操作类    
    public $user_id = 0;
    public $user = array();        
    /**
     * 析构流函数
     */
    public function  __construct() {   
        parent::__construct();                
        $this->cartLogic = new \app\home\logic\CartLogic();                 
        if(session('?user'))
        {
        	$user = session('user');
                $user = M('users')->where("user_id", $user['user_id'])->find();
                session('user',$user);  //覆盖session 中的 user
        	$this->user = $user;
        	$this->user_id = $user['user_id'];
        	$this->assign('user',$user); //存储用户信息
                // 给用户计算会员价 登录前后不一样
                //if($user){
                //    $user[discount] = (empty($user[discount])) ? 1 : $user[discount];
                //    M('Cart')->execute("update `__PREFIX__cart` set member_goods_price = goods_price * {$user[discount]} where (user_id ={$user[user_id]} or session_id = '{$this->session_id}') and prom_type = 0");
                //}

        }
    }
    
    public function cart(){
        return $this->fetch('cart');
    }
    /**
     * 将商品加入购物车
     */
    function addCart()
    {
        $goods_id = I("goods_id/d"); // 商品id
        $goods_num = I("goods_num/d");// 商品数量
        $goods_spec = I("goods_spec"); // 商品规格                
        $goods_spec = json_decode($goods_spec,true); //app 端 json 形式传输过来
        $unique_id = I("unique_id"); // 唯一id  类似于 pc 端的session id
        $user_id = I("user_id/d",0); // 用户id        
        $result = $this->cartLogic->addCart($goods_id, $goods_num, $goods_spec,$unique_id,$user_id); // 将商品加入购物车
        exit(json_encode($result)); 
    }
    /**
     * ajax 将商品加入购物车
     */
    function ajaxAddCart()
    {
        $goods_id = I("goods_id/d"); // 商品id
        $goods_num = I("goods_num/d");// 商品数量

        //$goods_spec = I("goods_spec/a"); // 商品规格
        // $goods_attr = I('goods_attr_id/d');  
        // if(!$goods_attr){
        $goods_attr = I('attr_id');
        //}  
        $result = $this->cartLogic->newaddCart($goods_id, $goods_num, $goods_attr,$this->session_id,$this->user_id); // 将商品加入购物车
        exit(json_encode($result));
    }

    /*
     * 请求获取购物车列表
     */
    public function cartList()
    {
        $cart_form_data = $_POST["cart_form_data"]; // goods_num 购物车商品数量
        $cart_form_data = json_decode($cart_form_data,true); //app 端 json 形式传输过来

        $unique_id = I("unique_id"); // 唯一id  类似于 pc 端的session id
        $user_id = I("user_id/d"); // 用户id
        $where['session_id'] = $unique_id ; // 默认按照 $unique_id 查询
        $user_id && $where['user_id'] = $user_id; // 如果这个用户已经等了则按照用户id查询
        $cartList = M('Cart')->where($where)->getField("id,goods_num,selected");

        if($cart_form_data)
        {
            // 修改购物车数量 和勾选状态
            foreach($cart_form_data as $key => $val)
            {
                $data['goods_num'] = $val['goodsNum'];
                $data['selected'] = $val['selected'];
                $cartID = $val['cartID'];
                if(($cartList[$cartID]['goods_num'] != $data['goods_num']) || ($cartList[$cartID]['selected'] != $data['selected']))
                    M('Cart')->where("id" , $cartID)->save($data);
            }
            //$this->assign('select_all', $_POST['select_all']); // 全选框
        }

        $result = $this->cartLogic->cartList($this->user, $unique_id,0);
        exit(json_encode($result));
    }

    /**
     * 购物车第二步确定页面
     */
    public function cart2()
    {

        if($this->user_id == 0)
            $this->error('请先登陆',U('Mobile/User/login'));
        $address_id = I('address_id/d');
        if($address_id)
            $address = M('user_address')->where("address_id" , $address_id)->find();
        else
            $address = M('user_address')->where(["user_id" => $this->user_id , "is_default" => 1])->find();
        
        if(empty($address)){
        	header("Location: ".U('Mobile/User/add_address',array('source'=>'cart2')));
                exit;
        }else{
        	$this->assign('address',$address);
        }

        if($this->cartLogic->cart_count($this->user_id,1) == 0 )
            $this->error ('你的购物车没有选中商品','Cart/cart');
        
    

        //获取购物车中的信息选中的商品信息
        $user_id = $this->user_id;

        

        
        $store_id_arr = M('cart')->where("user_id = {$this->user_id} and selected = 1")->getField('store_id',true);

        //获取店铺信息列表
        $storeList = Db::name('store')->where('store_id','in',$store_id_arr)->select();
        
        //获取购物车里的数据
        
        $carts_list = Db::name('cart')->alias('a')
        ->join('goods_attr b','b.goods_attr_id = a.attr_id','LEFT')
        ->join('goods c','c.goods_id = b.goods_id','LEFT')
        ->where('a.user_id',$user_id)
        ->where('a.selected',1)
        ->field('a.*,b.attr_price,b.attr_cost_price,b.attr_profit,c.zcoupon')
        ->select();
        
        $total_price = Db::name('cart')->where('user_id',$user_id)->where('selected',1)->sum('goods_price*goods_num');
        

        //查出券价 

        $quan_jia = Db::name('coupon_price')->find();

        foreach ($storeList as $key => &$value) {
           foreach ($carts_list as $k => &$v) {
            if($v['is_partner'] != '1'){
                $v['zcoupon'] = floor($v['attr_profit']/$quan_jia['coupon_price'])*$v['goods_num'];
            }
               
               if($v['store_id'] == $value['store_id']){
                   $value['cartlist'][] = $v;   
                   $value['zcoupon_num'] += $v['zcoupon'];
               }
           }
        }



        $this->assign('storeList', $storeList); // 店铺列表
        $this->assign('total_price',$total_price); // 总计
        
        return $this->fetch();
    }


    public function ajaxorder()
    {
        if($this->user_id == 0)
            exit(json_encode(array('status'=>-100,'msg'=>"登录超时请重新登录!",'result'=>null))); // 返回结果状态
        $address_id = I("address_id/d");
        if($this->cartLogic->cart_count($this->user_id,1) == 0 ) exit(json_encode(array('status'=>-2,'msg'=>'你的购物车没有选中商品','result'=>null))); // 返回结果状态
        if(!$address_id) exit(json_encode(array('status'=>-3,'msg'=>'请先填写收货人信息','result'=>null))); // 返回结果状态
        $address = M('UserAddress')->where("address_id" , $address_id)->find();

        $order_goods = M('cart')->where(["user_id" => $this->user_id ,  "selected" => 1])->select();

        //获取提交订单的商品
        $user_id = $this->user_id;//付款人的id

        //查询券价
        $coupon_price = Db::name('coupon_price')->find();

        $goods_list = Db::name('cart')->alias('a')
        ->join('goods_attr b','b.goods_attr_id = a.attr_id','LEFT')
        ->join('goods c','c.goods_id =  a.goods_id','LEFT')
        ->where('a.user_id',$user_id)
        ->where('a.selected',1)
        ->field('a.id,a.goods_id,a.user_id,a.session_id,a.is_partner,a.goods_sn,a.goods_name,a.goods_num,b.goods_attr_id,b.attr_value,b.attr_price,b.attr_profit,c.is_zcoupon,c.store_id,a.is_partner,c.zcoupon')
        ->select();
       
        $cart_ids = array();
        foreach ($goods_list as $key => &$value) {
            if($value['is_zcoupon'] == 1){
                if($value['is_partner'] != 1){
                    $value['zcoupon'] = floor(($value['attr_profit']/$coupon_price['coupon_price'])*$value['goods_num']);
                }
            }else{
                $value['zcoupon'] = '';
            }
            $cart_ids[] = $value['id'];
            
        }
        $length = count($goods_list); //订单商品长度
        $master_order_sn = $this->master_order_sn();
        
        $order_ids = array();
        $order_goodids = array();

        //整理订单信息
        for($i=0;$i<$length;$i++)
        {
            $data = array(
                'master_order_sn'=>$master_order_sn,
                'order_sn' => $this->order_sn(),
                'user_id'  => $user_id,
                'consignee'=> $address['consignee'],
                'country'  => $address['country'],
                'province' => $address['province'],
                'city'     => $address['city'],
                'district' => $address['district'],
                'twon'     => $address['twon'],
                'address'  => $address['address'],
                'zipcode'  => $address['zipcode'],
                'mobile'   => $address['mobile'],
                'email'    => $address['email'],
                'goods_price'  => $goods_list[$i]['attr_price'],
                'order_amount' => $goods_list[$i]['attr_price']*$goods_list[$i]['goods_num'],
                'total_amount' => $goods_list[$i]['attr_price']*$goods_list[$i]['goods_num'],
                'add_time'  => time(),
                'store_id'  => $goods_list[$i]['store_id'],
                'zcoupon'   => $goods_list[$i]['zcoupon'],
                'is_partner'=> $goods_list[$i]['is_partner']
            );

            $order_ids[$i] = Db::name('order')->insertGetId($data);
            if($order_ids[$i]){
                $ordergoods = array(
                    'order_id'  => $order_ids[$i],
                    'goods_id'  => $goods_list[$i]['goods_id'],
                    'goods_name'=> $goods_list[$i]['goods_name'],
                    'goods_price'=> $goods_list[$i]['attr_price'],
                    'goods_num'  => $goods_list[$i]['goods_num'],
                    'market_price'=> $goods_list[$i]['attr_price'],
                    'attr_id'     => $goods_list[$i]['goods_attr_id'],
                    'attr_value'  => $goods_list[$i]['attr_value'],
                    'store_id'    => $goods_list[$i]['store_id'],
                );
                $order_goodids = Db::name('order_goods')->insertGetId($ordergoods);   
            }

        }

        //先删除订单里的商品

        $res = Db::name('cart')->where('id','in',$cart_ids)->delete();



        $zcoupons = Db::name('order')->where('master_order_sn',$master_order_sn)->sum('zcoupon');
            
        if($order_goodids){
            if($length >1){
                $result['master_order_sn'] = $master_order_sn;
                $result['order_id'] = '';
            }else{
                $result['order_id'] = $order_ids[0];
                $result['master_order_sn'] = '';
            }
            $result['zcoupon'] = $zcoupons;
            $result['msg'] = '提交成功';
            $result['status'] = 1;
            return $result;
        }else{
            return array('status'=>-1,'msg'=>'提交失败');
        }

    }

    public function master_order_sn()
    {
        $str = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        return $str;
    }

    public  function order_sn()
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
        return $orderSn;

    }

    /**
     * ajax 获取订单商品价格 或者提交 订单
     */
    
    public function cart3(){
                                
        if($this->user_id == 0)
            exit(json_encode(array('status'=>-100,'msg'=>"登录超时请重新登录!",'result'=>null))); // 返回结果状态
        
        $address_id = I("address_id/d"); //  收货地址id
        // $shipping_code =  I("shipping_code/a"); //  物流编号        
        // $user_note = I('user_note/a'); // 给卖家留言        
        // $couponTypeSelect =  I("couponTypeSelect/a"); //  优惠券类型  1 下拉框选择优惠券 2 输入框输入优惠券代码
        // $coupon_id =  I("coupon_id/a"); //  优惠券id
        // $couponCode =  I("couponCode/a"); //  优惠券代码
        // $invoice_title = I('invoice_title'); // 发票
        // $pay_points =  I("pay_points/d",0); //  使用积分
        // $user_money =  I("user_money/f",0); //  使用余额        
        // $user_money = $user_money ? $user_money : 0;

        if($this->cartLogic->cart_count($this->user_id,1) == 0 ) exit(json_encode(array('status'=>-2,'msg'=>'你的购物车没有选中商品','result'=>null))); // 返回结果状态
        if(!$address_id) exit(json_encode(array('status'=>-3,'msg'=>'请先填写收货人信息','result'=>null))); // 返回结果状态
    
		$address = M('UserAddress')->where("address_id" , $address_id)->find();
		$order_goods = M('cart')->where(["user_id" => $this->user_id ,  "selected" => 1])->select();
                $result = calculate_price($this->user_id,$order_goods,$shipping_code,0,$address[province],$address[city],$address[district],$pay_points,$user_money,$coupon_id,$couponCode);                
		if($result['status'] < 0)	
			exit(json_encode($result));      	

                $car_price = array(
                    'postFee'      => $result['result']['shipping_price'], // 物流费
                    'couponFee'    => $result['result']['coupon_price'], // 优惠券            
                    'balance'      => $result['result']['user_money'], // 使用用户余额
                    'pointsFee'    => $result['result']['integral_money'], // 积分支付            
                    'payables'     => array_sum($result['result']['store_order_amount']), // 订单总额 减去 积分 减去余额
                    'goodsFee'     => $result['result']['goods_price'],// 总商品价格
                    'order_prom_amount' => array_sum($result['result']['store_order_prom_amount']), // 总订单优惠活动优惠了多少钱

                    'store_order_prom_id'=> $result['result']['store_order_prom_id'], // 每个商家订单优惠活动的id号
                    'store_order_prom_amount'=> $result['result']['store_order_prom_amount'], // 每个商家订单活动优惠了多少钱
                    'store_order_amount' => $result['result']['store_order_amount'], // 每个商家订单优惠后多少钱, -- 应付金额
                    'store_shipping_price'=>$result['result']['store_shipping_price'],  //每个商家的物流费
                    'store_coupon_price'=>$result['result']['store_coupon_price'],  //每个商家的优惠券抵消金额
                    'store_point_count' => $result['result']['store_point_count'], // 每个商家平摊使用了多少积分            
                    'store_balance'=>$result['result']['store_balance'], // 每个商家平摊用了多少余额
                    'store_goods_price'=>$result['result']['store_goods_price'], // 每个商家的商品总价
                );   
                // 提交订单        
                if($_REQUEST['act'] == 'submit_order')
                {  
                    if(empty($coupon_id) && !empty($couponCode))
                    {
                        foreach($couponCode as $k => $v)
                        $coupon_id[$k] = M('CouponList')->where("code",$v)->where("store_id",$k)->getField('id');
                    }                
                    $result = $this->cartLogic->addOrder($this->user_id,$address_id,$shipping_code,$invoice_title,$coupon_id,$car_price,$user_note); // 添加订单                        
                    exit(json_encode($result));            
                }
                    $return_arr = array('status'=>1,'msg'=>'计算成功','result'=>$car_price); // 返回结果状态
                    exit(json_encode($return_arr));                   
    }	
    /*
     * 订单支付页面
     */
    public function cart4(){
        $order_id = I('order_id/d',0); 
        
        // 如果是主订单号过来的, 说明可能是合并付款的
        $master_order_sn = I('master_order_sn','');        
        if($master_order_sn)
        {                       
            $sum_order_amount = M('order')->where("master_order_sn", $master_order_sn)->sum('order_amount');
            if($sum_order_amount == 0){                
                $order_order_list = U("mobile/user/indexnew");
                header("Location: $order_order_list");
                exit;
            }           
        }
        else
        {
            $order = M('Order')->where("order_id",$order_id)->find();
            // 如果已经支付过的订单直接到订单详情页面. 不再进入支付页面
            if($order['pay_status'] == 1){
                $order_detail_url = U("Mobile/User/order_detail",array('id'=>$order_id));
                header("Location: $order_detail_url");
            }
        }                 
        //微信浏览器
        if(strstr($_SERVER['HTTP_USER_AGENT'],'MicroMessenger'))
            $paymentList = M('Plugin')->where("`type`='payment' and status = 1 and code in('weixin','cod')")->select();            
        else 
            $paymentList = M('Plugin')->where("`type`='payment' and status = 1 and  scene in(1)")->select();        
        
        $paymentList = convert_arr_key($paymentList, 'code');                
        foreach($paymentList as $key => $val)
        {
            $val['config_value'] = unserialize($val['config_value']);            
            if($val['config_value']['is_bank'] == 2)
            {
                $bankCodeList[$val['code']] = unserialize($val['bank_code']);        
            }
            //判断当前浏览器显示支付方式
            if(($key == 'weixin' && !is_weixin()) || ($key == 'alipayMobile' && is_weixin())){
                unset($paymentList[$key]);
            }
        }                
        
        $bank_img = include APP_PATH.'home/bank.php'; // 银行对应图片
        $payment = M('Plugin')->where("`type`='payment' and status = 1")->select();
        $zcoupon = I('zcoupon');
        $this->assign('zcoupon',$zcoupon);        
        $this->assign('paymentList',$paymentList);        
        $this->assign('bank_img',$bank_img);
        $this->assign('master_order_sn', $master_order_sn); // 主订单号
        $this->assign('order_id', $order_id); // 订单id
        $this->assign('sum_order_amount', $sum_order_amount); // 所有订单应付金额        
        $this->assign('order',$order);
        $this->assign('bankCodeList',$bankCodeList);        
        $this->assign('pay_date',date('Y-m-d', strtotime("+1 day")));
        return $this->fetch();                   
    }


    public function payticket()
    {

        $ticketLogic = new \app\mobile\logic\TicketLogic();

        $ticketapi = new \app\api\controller\Ticket();

        //$cost_price = I('post.cost_price');
        $master_order_sn = I('post.master_order_sn');
        $order_id = I('post.order_id');

        $under = I('under');
        if($under){
            //查询订单信息
            $order_info = Db::name('order')->where('order_id',$order_id)->find();
            $coupon_price = Db::name('coupon_price')->find();
            if($order_info['pay_status'] == 1){
                return array('status'=>-1,'msg'=>'该订单已支付');
            }else{
               
                $user_id = $order_info['user_id'];
                $user_yue = Db::name('ticket_hold')->where('user_id',$user_id)->where('ticket_id',5)->field('ticket_number')->find();
                if($order_info['total_amount'] > $user_yue['ticket_number']){
                    return array('status'=>-1,'msg'=>'余额不足');
                }
               
                //扣除用户的余额
                $result = $ticketLogic->balance($user_id,2,$order_info['total_amount']);
             
                //更改订单状态
                 $res = Db::name('order')->where('order_id',$order_id)->save(array('pay_status'=>1,'pay_time'=>time(),'order_status'=>1));

                //增加商家的余额
                $now_time = time();
                $store_id = $order_info['store_id'];

                $store_user = Db::name('store')->alias('a')
                ->join('users b','b.mobile = a.user_name','LEFT')
                ->where('a.store_id',$store_id)
                ->field('b.user_id,a.percent')
                ->find();

                $yue_money =  (100 - $store_user['percent'])*$order_info['total_amount']*0.01;
                Db::name('ticket_hold')->where('user_id',$store_user['user_id'])->where('ticket_id',5)->setInc('ticket_number',$yue_money);

                $data['ticket_change_user_id'] = $store_user['user_id'];
                $data['ticket_id'] = 5;
                $data['ticket_change_number'] = $yue_money;
                $data['ticket_change_add'] = 1;
                $data['ticket_change_type'] = 17;

                $data['ticket_price'] = $coupon_price['coupon_price'];
                $data['ticket_change_time'] = date("Y-m-d H:i:s",$now_time);
                //变化表
                Db::name('ticket_change')->insert($data);
               
                 //增加用户的Z券
                 $ticketLogic->zcoupon($user_id,1,$order_info['zcoupon']);
                 //兑冲
                 $ticketapi->duichong($order_info['zcoupon'],$user_id);
                //二代收益
                 $ticketapi->erdaishouyi($order_info['zcoupon'],$user_id);
                 //团队收益
                 $ticketapi->tuanduishouyi($order_info['zcoupon'],$user_id);

                 //团队累计
                 $ticketapi->team_add($order_info['zcoupon'],$user_id);

                 return array('status'=>1,'msg'=>'支付成功');

            }




        }else{
            if(!($master_order_sn) && !($order_id)){
                return array('status'=>-1,'msg'=>'违规操作');
            }
    
           //查询userid
            $user_id = $this->user_id;
            if($master_order_sn){
                //多个商品订单
                $order_info = Db::name('order')->where('master_order_sn',$master_order_sn)->where('pay_status',0)->select();//未支付的订单
            }else{
                $order_info = Db::name('order')->where('order_id',$order_id)->where('pay_status',0)->select();//未支付的订单
            }
            
            if(!$order_info){
                return array('status'=>-1,'msg'=>'违规操作');
            }
    
            //未支付成功的订单编号
            $fairpay_sn = array();//支付失败存储的订单编号
    
            $succpay_sn = array();//支付成功存储的订单编号
            
    
            //分笔支付
            foreach ($order_info as $key => $value) {
                //判断账户余额是否足够
                $user_yue = Db::name('ticket_hold')->where('user_id',$user_id)->where('ticket_id',5)->field('ticket_number')->find();
                //判断用户余额是否足够
                if($user_yue['ticket_number'] < $value['total_amount']){
                    $fairpay_sn[]['sn'] = $value['order_sn'];
                    $fairpay_sn[]['msg'] = '余额不足';
                }else{
                    //查出商户的的额度
                    if($value['zcoupon']){ //证明该订单是含有Z券附加值的额商品
                        $store_info = Db::name('store')->where('store_id',$value['store_id'])->field('zquota')->find();
                        //获取今日券价
                        $quan_price = Db::name('coupon_price')->find();
    
                        if(($store_info['zquota']/$quan_price['coupon_price'])< $value['zcoupon']){
                            $fairpay_sn[]['sn'] = $value['order_sn'];
                            $fairpay_sn[]['msg'] = '商户Z券不足,订单无法交易';
                        }else{
                            //扣除用户的余额
                            $result = $ticketLogic->balance($user_id,2,$value['total_amount']);
                            if($result['status'] == 1 ){
                                //更改订单状态
                                $res = Db::name('order')->where('order_id',$value['order_id'])->save(array('pay_status'=>1,'pay_name'=>'余额支付','pay_time'=>time(),'pay_code'=>'yue','order_status'=>1));
                               
    
                                //扣除商户的Z券
                                $ticketLogic->store_count($value['store_id'],2,$value['zcoupon']);
    
                                //增加用户的Z券
                                $ticketLogic->zcoupon($user_id,1,$value['zcoupon']);
                                //兑冲
                                $ticketapi->duichong($value['zcoupon'],$user_id);
                               //二代收益
                                $ticketapi->erdaishouyi($value['zcoupon'],$user_id);
                                //团队收益
                                $ticketapi->tuanduishouyi($value['zcoupon'],$user_id);
    
                                //团队累计
                                $ticketapi->team_add($value['zcoupon'],$user_id);
                                //查出订单商品信息
                                $order_goodsinfo = Db::name('order_goods')->where('order_id',$value['order_id'])->find();
    
                                if($value['is_partner'] == '1'){
                                    Db::name('users')->where('user_id',$user_id)->save(array('is_partner'=>1,'partner_goodsid'=>$order_goodsinfo['goods_id'],'partadd_time'=>time()));
                                }
    
                                //减少商品属性库存数量
                                Db::name('goods_attr')->where('goods_attr_id',$order_goodsinfo['attr_id'])->setDec('attr_num',$order_goodsinfo['goods_num']);
                                //减少总商品数量
                                Db::name('goods')->where('goods_id',$order_goodsinfo['goods_id'])->setDec('store_count',$order_goodsinfo['goods_num']);
    
                                $succpay_sn[]['sn'] = $value['order_sn'];
                                $succpay_sn[]['msg'] = '订单完成';
    
                            }
                        }
                    }else{
                        $res = Db::name('order')->where('order_id',$value['order_id'])->save(array('pay_status'=>1,'pay_name'=>'余额支付','pay_time'=>time(),'pay_code'=>'yue','order_status'=>1));
    
                        //查出订单商品信息
                        $order_goodsinfo = Db::name('order_goods')->where('order_id',$value['order_id'])->find();
    
                        //减少商品属性库存数量
                        Db::name('goods_attr')->where('goods_attr_id',$order_goodsinfo['attr_id'])->setDec('attr_num',$order_goodsinfo['goods_num']);
                        //减少总商品数量
                        Db::name('goods_attr')->where('goods_id',$order_goodsinfo['goods_id'])->setDec('store_count',$order_goodsinfo['goods_num']);
    
                        $succpay_sn[]['sn'] = $value['order_sn'];
                        $succpay_sn[]['msg'] = '订单完成';
    
                    }
                }
    
            }
            if(!$fairpay_sn){
                return array('status'=>1,'msg'=>'订单完成');
            }else{
                return array('staus'=>-1,'data'=>$fairpay_sn);
            }
    



        }
        
    }

    /*
    * ajax 请求获取购物车列表
    */
    public function ajaxCartList()
    {
        $post_goods_num = I("goods_num/a"); // goods_num 购物车商品数量
        $post_cart_select = I("cart_select/a"); // 购物车选中状态
        $where['session_id'] = $this->session_id ; // 默认按照 session_id 查询
        $this->user_id && $where['user_id'] = $this->user_id; // 如果这个用户已经等了则按照用户id查询

        $cartList = M('Cart')->where($where)->getField("id,goods_num,selected,prom_type,prom_id"); 

        if($post_goods_num)
        {
            // 修改购物车数量 和勾选状态
            foreach($post_goods_num as $key => $val)
            {                
                $data['goods_num'] = $val < 1 ? 1 : $val;
                if($cartList[$key]['prom_type'] == 1) //限时抢购 不能超过购买数量
                {
                    $flash_sale = M('flash_sale')->where("id" , $cartList[$key]['prom_id'])->find();
                    $data['goods_num'] = $data['goods_num'] > $flash_sale['buy_limit'] ? $flash_sale['buy_limit'] : $data['goods_num'];
                }
                
                $data['selected'] = $post_cart_select[$key] ? 1 : 0 ;
                if(($cartList[$key]['goods_num'] != $data['goods_num']) || ($cartList[$key]['selected'] != $data['selected']))
                    M('Cart')->where("id" ,$key)->save($data);
            }
            $this->assign('select_all', $_POST['select_all']); // 全选框
        }

        $result = $this->cartLogic->cartList($this->user, $this->session_id,1,1);        
        if(empty($result['total_price']))
            $result['total_price'] = Array( 'total_fee' =>0, 'cut_fee' =>0, 'num' => 0, 'atotal_fee' =>0, 'acut_fee' =>0, 'anum' => 0);
        
        $storeList = M('store')->getField("store_id,store_name"); // 找出商家
        $this->assign('storeList', $storeList); // 商家列表       
        $this->assign('cartList', $result['cartList']); // 购物车的商品                
        $this->assign('total_price', $result['total_price']); // 总计       
        return $this->fetch('ajax_cart_list');
    }   

/*
 * ajax 获取用户收货地址 用于购物车确认订单页面
 */
    public function ajaxAddress(){

        $regionList = M('Region')->getField('id,name');

        $address_list = M('UserAddress')->where("user_id ",$this->user_id)->select();
        $c = M('UserAddress')->where(array("user_id" => $this->user_id , 'is_default' => 1))->count(); // 看看有没默认收货地址
        if((count($address_list) > 0) && ($c == 0)) // 如果没有设置默认收货地址, 则第一条设置为默认收货地址
            $address_list[0]['is_default'] = 1;

        $this->assign('regionList', $regionList);
        $this->assign('address_list', $address_list);
        return $this->fetch('ajax_address');
    }

    /**
     * ajax 删除购物车的商品
     */
    public function ajaxDelCart()
    {
        $ids = I("ids"); // 商品 ids
        $result = M("Cart")->where("id" , "in" , $ids)->delete(); // 删除id为5的用户数据
        $return_arr = array('status'=>1,'msg'=>'删除成功','result'=>''); // 返回结果状态
        exit(json_encode($return_arr));
    }

    public function shoppingCart(){
		return $this->fetch();
    }


    public function order2()
    {   
        //创建线下订单
        
  
        
        $store_id = I('store_id');
        $user_id = I('user_id');
        $pay_code = I('pay_code');
        $under = I('under');
        $amount = I('amount');
        $master_order_sn = $this->master_order_sn();

        //查询商家的信息

        $store_info = Db::name('store')->where('store_id',$store_id)->find();

        $coupon_price = Db::name('coupon_price')->find();

        if($pay_code == 'yue'){
            $pay_name = '余额支付';
        }

        if($pay_code == 'alipayMobile'){
            $pay_name = '手机网站支付宝';
        }

        if($pay_code == 'appWeixinPay'){
            $pay_name = 'App微信支付';
        }
    
      
        $zcoupon =  floor(($store_info['percent'] * 0.01 *$amount)/$coupon_price['coupon_price']);
      
        $data = array(
            'master_order_sn'=>$master_order_sn,
            'order_sn' => $this->order_sn(),
            'user_id'  => $user_id,
            'goods_price'  =>  $amount,
            'order_amount' =>  $amount,
            'total_amount' =>  $amount,
            'add_time'  => time(),
            'store_id'  => $store_id,
            'zcoupon'   => $zcoupon,
            'under'     =>$under,
            'pay_code'  =>$pay_code,
            'pay_name'  =>$pay_name
        );


        $result = Db::name('order')->insertGetId($data);

        if($result){
            return array('status'=>1,'order_id'=>$result);

        }



    }
}
