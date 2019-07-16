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
class Payment extends MobileBase {
    
    public $payment; //  具体的支付类
    public $pay_code; //  具体的支付code
    public $ticketLogic;
    /**
     * 析构流函数
     */
    public function  __construct() {   
        parent::__construct();                                                  
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

        // tpshop 订单支付提交
        $pay_radio = $_REQUEST['pay_radio'];
        // pay_code=appWeixinPay  pay_code=alipayMobile


//        if($pay_radio=='pay_code=appWeixinPay'){
//
//            $pay_radio='pay_code=alipayMobile';
//        }

//        echo $pay_radio;die;
        if(!empty($pay_radio)) 
        {                         
            $pay_radio = parse_url_param($pay_radio);
            $this->pay_code = $pay_radio['pay_code']; // 支付 code
        }
        else // 第三方 支付商返回
        {            
            $_GET = I('get.');            
            //file_put_contents('./a.html',$_GET,FILE_APPEND);    
            $this->pay_code = I('get.pay_code');
            unset($_GET['pay_code']); // 用完之后删除, 以免进入签名判断里面去 导致错误
        }                        
        //获取通知的数据
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];      
        if(empty($this->pay_code))
            exit('pay_code 不能为空');



        if($pay_radio['pay_code']=='alipayMobile'){

//            print_r($this->pay_code);die;
            $this->pay_code ='alipayMobile';

            // 导入具体的支付类文件
            include_once  "plugins/payment/{$this->pay_code}/{$this->pay_code}.class.php"; // D:\wamp\www\svn_tpshop\www\plugins\payment\alipay\alipayPayment.class.php
            $code = '\\'.$this->pay_code; // \alipay
            $this->payment = new $code();
        }

        if($_REQUEST['pay_code']=='alipayMobile'){

            $this->pay_code ='alipayMobile';
            // 导入具体的支付类文件
            include_once  "plugins/payment/{$this->pay_code}/{$this->pay_code}.class.php"; // D:\wamp\www\svn_tpshop\www\plugins\payment\alipay\alipayPayment.class.php
            $code = '\\'.$this->pay_code; // \alipay
            $this->payment = new $code();
        }

    }
   
    /**
     * tpshop 提交支付方式
     */
    public function getCode(){     
        
            C('TOKEN_ON',false); // 关闭 TOKEN_ON
            header("Content-type:text/html;charset=utf-8");    
            // 修改订单的支付方式
            $payment_arr = M('Plugin')->where("`type` = 'payment'")->getField("code,name");            

            $order_id = I('order_id/d',0); // 订单id                        
            $master_order_sn = I('master_order_sn','');// 多单付款的 主单号

            $under = I('under');

            if($under){
                $order = M('order')->where("order_id" , $order_id)->find();
                if($order['pay_status'] == 1){
                    $this->error('此订单，已完成支付!');
                }
                $pay_radio = $_REQUEST['pay_radio'];
                $config_value = parse_url_param($pay_radio); 



            }else{
                        // 如果是主订单号过来的, 说明可能是合并付款的
                    if($master_order_sn)
                    {
                        M('order')->where("master_order_sn",$master_order_sn)->save(array('pay_code'=>$this->pay_code,'pay_name'=>$payment_arr[$this->pay_code]));            
                        $order = M('order')->where("master_order_sn",$master_order_sn)->find();
                        $order['order_sn'] = $master_order_sn; // 临时修改 给支付宝那边去支付
                        $order['order_amount'] = M('order')->where("master_order_sn",$master_order_sn)->sum('order_amount'); // 临时修改 给支付宝那边去支付
                    }else{
                        M('order')->where("order_id" , $order_id)->save(array('pay_code'=>$this->pay_code,'pay_name'=>$payment_arr[$this->pay_code]));            
                        $order = M('order')->where("order_id" , $order_id)->find();     
                    }
                    if($order['pay_status'] == 1){
                        $this->error('此订单，已完成支付!');
                    }
                    // tpshop 订单支付提交
                    $pay_radio = $_REQUEST['pay_radio'];
                    $config_value = parse_url_param($pay_radio); // 类似于 pay_code=alipay&bank_code=CCB-DEBIT 参数
                //
            }
                    //微信JS支付
                if($this->pay_code == 'weixin' && $_SESSION['openid'] && strstr($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
                    $code_str = $this->payment->getJSAPI($order,$config_value);
        
                    exit($code_str);
                }
                else
                {
                    if($config_value['pay_code']=='alipayMobile'){
                            //阿里支付
                        $code_str = $this->payment->get_code($order,$config_value);
                    }else{
                        //微信H5支付
        //                   print_r($order);die;
                        $appid='wx54b9e4dd6bbb3963';
                        $mch_id='1523820391';
                        $key='nr2ob4cxgk88mnzl02itjx66f66ppphb';
                        $code_str = $this->wxPay($appid,$mch_id,$key,$order['order_sn'],$order['order_amount']);
                    }
                }           


           

           
           $this->assign('code_str', $code_str); 
           $this->assign('order_id', $order_id);
           $this->assign('master_order_sn', $master_order_sn); // 主订单号
           return $this->fetch('payment');  // 分跳转 和不 跳转 
    }

    public  function getIP(){
        if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
        else $ip = "Unknow";
        return $ip;
    }
    function wxPay($appid,$mch_id,$key,$out_trade_no,$money){

        //$userip = $_SERVER["REMOTE_ADDR"]; //获得用户设备IP
        $nonce_str=MD5($out_trade_no);//随机字符串
        $total_fee = $money*100; //金额*100
//		$total_fee = 1;
        $spbill_create_ip = $this->getIP(); //IP
        $notify_url = "http://".$_SERVER['HTTP_HOST'].'/api/Payment/get_wxpay'; //回调地址 jishu.whwlhd.com/index.php/Home/Pay/wx/id/
        $trade_type = 'MWEB';//交易类型 具体看API 里面有详细介绍
        $body="购买";
//
//
        $scene_info ='{"h5_info":{"type":"Wap","wap_url":"http://abc.fyc365.cn","wap_name":"支付"}}';//场景信息 必要参数
        $signA ="appid=$appid&body=$body&mch_id=$mch_id&nonce_str=$nonce_str&notify_url=$notify_url&out_trade_no=$out_trade_no&scene_info=$scene_info&spbill_create_ip=$spbill_create_ip&total_fee=$total_fee&trade_type=$trade_type";

        $strSignTmp = $signA."&key=$key"; //拼接字符串  注意顺序微信有个测试网址 顺序按照他的来 直接点下面的校正测试 包括下面XML  是否正确
        $sign = strtoupper(MD5($strSignTmp)); // MD5 后转换成大写

        $post_data="<xml><appid>$appid</appid><body>$body</body><mch_id>$mch_id</mch_id><nonce_str>$nonce_str</nonce_str><notify_url>$notify_url</notify_url><out_trade_no>$out_trade_no</out_trade_no><scene_info>$scene_info</scene_info><spbill_create_ip>$spbill_create_ip</spbill_create_ip><total_fee>$total_fee</total_fee><trade_type>$trade_type</trade_type><sign>$sign</sign>
        </xml>";//拼接成XML 格式

//		print_r($post_data);die;

        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";//微信传参地址

        $dataxml =$this->http_post($url,$post_data);
        $objectxml = (array)simplexml_load_string($dataxml,'SimpleXMLElement',LIBXML_NOCDATA); //将微信返回的XML 转换成数组
        //print_r($objectxml);die;
        if($objectxml['return_code'] == 'SUCCESS'){
            $redirect_url = urlencode("http://".$_SERVER['HTTP_HOST'].'/index.php/mobile/User/indexnew.html');
            $url = $objectxml['mweb_url'].'&redirect_url='.$redirect_url;
            //$url = $objectxml['mweb_url'];
            echo "<script> window.location.href='$url'</script>";
            exit;

        }
//    $redirect_url = urlencode("http://www.bojuwang.net/");
    }




  public  function http_post($url='',$post_data=array(),$header=array(),$timeout=30) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }

    public function getPay(){
       	//手机端在线充值
        C('TOKEN_ON',false); // 关闭 TOKEN_ON 
        $order_id = I('order_id/d'); //订单id
        $user = session('user');
        $data['account'] = I('account');
        if($order_id>0){
        	M('recharge')->where(array('order_id'=>$order_id,'user_id'=>$user['user_id']))->save($data);
        }else{
        	$data['user_id'] = $user['user_id'];
        	$data['nickname'] = $user['nickname'];
        	$data['order_sn'] = 'recharge'.get_rand_str(10,0,1);
        	$data['ctime'] = time();
        	$order_id = M('recharge')->add($data);
        }
        if($order_id){
        	$order = M('recharge')->where("order_id" , $order_id)->find();
        	if(is_array($order) && $order['pay_status']==0){
        		$order['order_amount'] = $order['account'];
        		$pay_radio = $_REQUEST['pay_radio'];
        		$config_value = parse_url_param($pay_radio); // 类似于 pay_code=alipay&bank_code=CCB-DEBIT 参数
        		$payment_arr = M('Plugin')->where("`type` = 'payment'")->getField("code,name");
        		M('recharge')->where("order_id" , $order_id)->save(array('pay_code'=>$this->pay_code,'pay_name'=>$payment_arr[$this->pay_code]));       		
        		//微信JS支付
        		if($this->pay_code == 'weixin' && $_SESSION['openid'] && strstr($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
        			$code_str = $this->payment->getJSAPI($order);
        			exit($code_str);
        		}else{
        			$code_str = $this->payment->get_code($order,$config_value);
        		}
        	}else{
        		$this->error('此充值订单，已完成支付!');
        	}
        }else{
        	$this->error('提交失败,参数有误!');
        }
        //dump($code_str);
        $this->assign('code_str', $code_str); 
        $this->assign('order_id', $order_id); 
    	return $this->fetch('recharge'); //分跳转 和不 跳转
    }

        // 服务器点对点 // http://www.tp-shop.cn/index.php/Home/Payment/notifyUrl        
        public function notifyUrl(){     
            $order_sn = I('order_sn');
            $appid='wx54b9e4dd6bbb3963';
            $mch_id='1523820391';
            $body="查询订单";
            $out_trade_no = $order_sn;
            $nonce_str=MD5($out_trade_no);
            $key='nr2ob4cxgk88mnzl02itjx66f66ppphb';
           
            $signA ="appid=$appid&body=$body&mch_id=$mch_id&nonce_str=$nonce_str";
            $strSignTmp = $signA."&key=$key"; //拼接字符串  注意顺序微信有个测试网址 顺序按照他的来 直接点下面的校正测试 包括下面XML  是否正确
            $sign = strtoupper(MD5($strSignTmp)); // MD5 后转换成大写
            $post_data = "<xml>
            <appid>$appid</appid>
            <mch_id>$mch_id</mch_id>
            <nonce_str>$nonce_str</nonce_str>
            <out_trade_no>$out_trade_no</out_trade_no>
            <sign>$sign</sign>
         </xml>";
         $url = "https://api.mch.weixin.qq.com/pay/orderquery";
         $dataxml =$this->http_post($url,$post_data);
         $objectxml = (array)simplexml_load_string($dataxml,'SimpleXMLElement',LIBXML_NOCDATA); //将微信返回的XML 转换成数组
            exit();
        }

        // 页面跳转 // http://www.tp-shop.cn/index.php/Home/Payment/returnUrl        
        public function returnUrl(){
            
             $result = $this->payment->respond2(); 
             // $result['order_sn'] = '201512241425288593'; 
            // var_dump($result);die;    
             
             if($result['status']== 1){
                $order_sn = $result['order_sn'];
                $ticketLogic = new \app\mobile\logic\TicketLogic();
                $ticketapi = new \app\api\controller\Ticket();
                // 先查看一下 是不是 合并支付的主订单号
                
                $order_list = M('order')->where("master_order_sn",$result['order_sn'])->select();
                if($order_list){
                    //主订单部分
                    foreach ($order_list as $key => $value) {
                         //改变订单状态 已支付
                        $order_find = Db::name('order')->where('order_id',$value['order_id'])->where('pay_status',1)->find();
                        if(!$order_find){
                            $res = Db::name('order')->where('order_id',$value['order_id'])->save(array('pay_status'=>1,'pay_time'=>time(),'order_status'=>1));

                            if($value['zcoupon']){
                                //改变商家的Z券
                                $ticketLogic->store_count($value['store_id'],2,$value['zcoupon']);
                                //改变用户的Z券
                                $ticketLogic->zcoupon($user_id,1,$value['zcoupon']);
                                //兑冲
                                $ticketapi->duichong($value['zcoupon'],$user_id);
                                //二代收益
                                $ticketapi->erdaishouyi($value['zcoupon'],$user_id);
                                //团队收益
                                $ticketapi->tuanduishouyi($value['zcoupon'],$user_id);
                                //团队累计
                                $ticketapi->team_add($value['zcoupon'],$user_id);
                            }
                            //查询订单商品
                            $order_goodsinfo = Db::name('order_goods')->where('order_id',$value['order_id'])->find();
                            if($value['is_partner'] == '1'){
                                Db::name('users')->where('user_id',$user_id)->save(array('is_partner'=>1,'partner_goodsid'=>$order_goodsinfo['goods_id'],'partadd_time'=>time()));
                            }
                                //减少商品属性库存数量
                            Db::name('goods_attr')->where('goods_attr_id',$order_goodsinfo['attr_id'])->setDec('attr_num',$order_goodsinfo['goods_num']);
                                //减少总商品数量
                            Db::name('goods')->where('goods_id',$order_goodsinfo['goods_id'])->setDec('store_count',$order_goodsinfo['goods_num']);


                            }
                        
                        
                        
                    }

                    return $this->redirect('order/orderPayStatus',['status' => 1]);

                }else{
                    

                    
                        //单个商品的订单
                        $order_list = M('order')->where("order_sn",$result['order_sn'])->find();

                        //判断线上支付还是线下

                        if($order_list['under'] == '1'){
                            $user_id = $order_list['user_id'];
                            if($order_list['pay_status'] <> 1){
                                $res = Db::name('order')->where('order_id',$order_list['order_id'])->save(array('pay_status'=>1,'pay_time'=>time(),'order_status'=>1));
                                if($order_list['zcoupon']){
                                    $ticketLogic->zcoupon($user_id,1,$order_list['zcoupon']);
                                     //兑冲
                                     $ticketapi->duichong($order_list['zcoupon'],$user_id);
                                     //二代收益
                                     $ticketapi->erdaishouyi($order_list['zcoupon'],$user_id);
                                     //团队收益
                                     $ticketapi->tuanduishouyi($order_list['zcoupon'],$user_id);
                                     //团队累计
                                     $ticketapi->team_add($order_list['zcoupon'],$user_id);

                                }

                            }



                        }else{
                                        $user_id = $order_list['user_id'];
                                    //改变订单状态 已支付
                                    if($order_list['pay_status'] <> 1){
                                        $res = Db::name('order')->where('order_id',$order_list['order_id'])->save(array('pay_status'=>1,'pay_time'=>time(),'order_status'=>1));
                                        if($order_list['zcoupon']){
                                            //改变商家的Z券
                                            $ticketLogic->store_count($order_list['store_id'],2,$order_list['zcoupon']);
                                            //改变用户的Z券
                                            $ticketLogic->zcoupon($user_id,1,$order_list['zcoupon']);
                                            //兑冲
                                            $ticketapi->duichong($order_list['zcoupon'],$user_id);
                                            //二代收益
                                            $ticketapi->erdaishouyi($order_list['zcoupon'],$user_id);
                                            //团队收益
                                            $ticketapi->tuanduishouyi($order_list['zcoupon'],$user_id);
                                            //团队累计
                                            $ticketapi->team_add($order_list['zcoupon'],$user_id);
                                        }
                                        $order_goodsinfo = Db::name('order_goods')->where('order_id',$order_list['order_id'])->find();
                                            //减少商品属性库存数量
                                        if($order_list['is_partner'] == '1'){
                                            Db::name('users')->where('user_id',$user_id)->save(array('is_partner'=>1,'partner_goodsid'=>$order_goodsinfo['goods_id'],'partadd_time'=>time()));
                                        }


                                        Db::name('goods_attr')->where('goods_attr_id',$order_goodsinfo['attr_id'])->setDec('attr_num',$order_goodsinfo['goods_num']);
                                            //减少总商品数量
                                        Db::name('goods')->where('goods_id',$order_goodsinfo['goods_id'])->setDec('store_count',$order_goodsinfo['goods_num']);


                                }

                        }

                        
                        
                    
                        
                    return $this->redirect('order/orderPayStatus',['status' => 1]);
                    

                }   

             }else{
                return $this->redirect('order/orderPayStatus',['status' => 2]);

             }
             
            
        }                
              
}
