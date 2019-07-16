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
namespace app\api\controller;
use think\Db; 
use app\api\controller\Ticket;
class Payment extends Base {
        
    /**
     * 析构流函数
     */
    public function  __construct() {   
        parent::__construct();                
    }

    /**
     * app端发起支付宝,支付宝返回服务器端,  返回到这里
     * http://www.tp-shop.cn/index.php/Api/Payment/alipayNotify
     */
    public function alipayNotify(){
             
        $paymentPlugin = M('Plugin')->where("code='alipay' and  type = 'payment' ")->find(); // 找到支付插件的配置
        $config_value = unserialize($paymentPlugin['config_value']); // 配置反序列化        
        
        require_once("plugins/payment/alipay/app_notify/alipay.config.php");
        require_once("plugins/payment/alipay/app_notify/lib/alipay_notify.class.php");
        
        $alipay_config['partner'] = $config_value['alipay_partner'];//合作身份者id，以2088开头的16位纯数字        
     
        //计算得出通知验证结果
        $alipayNotify = new \AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();                        
        //验证成功
        if($verify_result) 
        {                           
                $order_sn = $out_trade_no = trim($_POST['out_trade_no']); //商户订单号
                $trade_no = $_POST['trade_no'];//支付宝交易号
                $trade_status = $_POST['trade_status'];//交易状态
            

            if($_POST['trade_status'] == 'TRADE_FINISHED') 
            {            
                update_pay_status($order_sn); // 修改订单支付状态                
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') 
            {            
                update_pay_status($order_sn); // 修改订单支付状态                
            }               
            M('order')->where('order_sn', $order_sn)->whereOr('master_order_sn',$order_sn)->save(array('pay_code'=>'alipay','pay_name'=>'app支付宝'));

            echo "success"; //  告诉支付宝支付成功 请不要修改或删除               
        }
        else 
        {                
            echo "fail"; //验证失败         
        }
    }

    public function get_wxpay(){

//        echo 2;die;

        $xml=file_get_contents('php://input', 'r');
        // 转成php数组
        $data=$this->toArray($xml);
        @file_put_contents('./a.txt',print_r($data,true));

        // 判断签名是否正确  判断支付状态
        if ($data['return_code']=='SUCCESS' && $data['result_code']=='SUCCESS') {
            @file_put_contents('./a1.txt',print_r($data,true));

            $order_sn=$data['out_trade_no'];
            $ticketLogic = new \app\mobile\logic\TicketLogic();
            $ticketapi = new \app\api\controller\Ticket();
            // 先查看一下 是不是 合并支付的主订单号
            $order_list = M('order')->where("master_order_sn",$order_sn)->select();
            if($order_list){
                foreach ($order_list as $key => $value) {

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
                    //改变订单状态 已支付
                   
                   
               }

               return $this->redirect('order/orderPayStatus',['status' => 1]);


            }else{
                //单个商品的订单
                $order_list = M('order')->where("order_sn",$order_sn)->find();
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

                
                return $this->redirect('order/orderPayStatus',['status' => 1]);
            }

        }else{
            return $this->redirect('order/orderPayStatus',['status' => 2]);
        }



    }


    /**
     * 生成签名
     * @return 签名，本函数不覆盖sign成员变量，如要设置签名需要调用SetSign方法赋值
     */
    public function makeSign($data){
        // 去空
        $data=array_filter($data);
        //签名步骤一：按字典序排序参数
        ksort($data);
        $string_a=http_build_query($data);
        $string_a=urldecode($string_a);
        //签名步骤二：在string后加入KEY
        $config=$this->config;
        $string_sign_temp=$string_a."&key=".$config['KEY'];
        //签名步骤三：MD5加密
        $sign = md5($string_sign_temp);
        // 签名步骤四：所有字符转为大写
        $result=strtoupper($sign);
        return $result;
    }



    /**
     * 将xml转为array
     * @param  string $xml xml字符串
     * @return array       转换得到的数组
     */
    public function toArray($xml){
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $result= json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $result;
    }


    /**
     * 输出xml字符
     * @throws WxPayException
     **/
    public function toXml($data)
    {
        if (!is_array($data) || count($data) <= 0) {
            throw new WxPayException("数组数据异常！");
        }
        $xml = "<xml>";
        foreach ($data as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            } else {
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;

    }
 
}
