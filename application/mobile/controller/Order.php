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
 * $Author: 当燃 2016-01-09
 */ 
namespace app\mobile\controller;
use think\Db;

class Order extends MobileBase 
{
		
		public $user_id = 0;
    public $user = array();

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
				
		);
		if (!$this->user_id && !in_array(ACTION_NAME, $nologin)) {
			
				$store_id = I('store_id');
		
				$mode = I('mode');
				
				if(($store_id != '') && ($mode != '')){
					header("location:" . U('Mobile/User/login?store_id='.$store_id.'&mode='.$mode));
				}else{
					header("location:" . U('Mobile/User/login'));
				}
				
				
				exit;
		}


	}
	
	public function orderlist()
	{

		return $this->fetch();
	}


	public function orderlist_all()
	{
		$user_id = $this->user_id;
		$order_list = Db::name('order')->alias('a')
		->join('order_goods b','b.order_id = a.order_id','LEFT')
		->join('goods c','c.goods_id = b.goods_id','LEFT')
		->join('goods_attr d','d.goods_attr_id = b.attr_id','LEFT')
		->join('store e','e.store_id = a.store_id','LEFT')
		->where('a.user_id',$user_id)
		->field('a.order_id,a.order_status,a.is_self,a.shipping_status,e.store_name,c.goods_name,c.original_img,d.attr_value,d.attr_price,b.goods_num,b.goods_id')
		->order('a.add_time desc')
		->select();
		foreach ($order_list as $key => &$value) {
			$value['total_price'] = $value['goods_num']*$value['attr_price'];
		}

		//dump($order_list);
		$this->assign('order_list',$order_list);

		return $this->fetch();
	}
	
	public function orderlist_daifu()
	{
		$user_id = $this->user_id;
		$order_list = Db::name('order')->alias('a')
		->join('order_goods b','b.order_id = a.order_id','LEFT')
		->join('goods c','c.goods_id = b.goods_id','LEFT')
		->join('goods_attr d','d.goods_attr_id = b.attr_id','LEFT')
		->join('store e','e.store_id = a.store_id','LEFT')
		->where('a.user_id',$user_id)
		->where('a.order_status','0')
		->field('a.order_id,a.order_status,a.shipping_status,e.store_name,c.goods_name,c.original_img,d.attr_value,d.attr_price,b.goods_num,b.goods_id')
		->order('a.add_time desc')
		->select();
		foreach ($order_list as $key => &$value) {
			$value['total_price'] = $value['goods_num']*$value['attr_price'];
		}
		$this->assign('order_list',$order_list);
		return $this->fetch();
	}

	public function orderlist_weifa()
	{
		$user_id = $this->user_id;
		$order_list = Db::name('order')->alias('a')
		->join('order_goods b','b.order_id = a.order_id','LEFT')
		->join('goods c','c.goods_id = b.goods_id','LEFT')
		->join('goods_attr d','d.goods_attr_id = b.attr_id','LEFT')
		->join('store e','e.store_id = a.store_id','LEFT')
		->where('a.user_id',$user_id)
		->where('a.order_status','1')
		->where('a.shipping_status',0)
		->field('a.order_id,a.order_status,a.shipping_status,e.store_name,c.goods_name,c.original_img,d.attr_value,d.attr_price,b.goods_num,b.goods_id')
		->order('a.add_time desc')
		->select();
		foreach ($order_list as $key => &$value) {
			$value['total_price'] = $value['goods_num']*$value['attr_price'];
		}
		$this->assign('order_list',$order_list);
		return $this->fetch();
	}
	
	public function orderlist_daishou()
	{
		$user_id = $this->user_id;
		$order_list = Db::name('order')->alias('a')
		->join('order_goods b','b.order_id = a.order_id','LEFT')
		->join('goods c','c.goods_id = b.goods_id','LEFT')
		->join('goods_attr d','d.goods_attr_id = b.attr_id','LEFT')
		->join('store e','e.store_id = a.store_id','LEFT')
		->where('a.user_id',$user_id)
		->where('a.order_status','1')
		->where('a.shipping_status','1')
		->field('a.order_id,a.order_status,a.shipping_status,a.is_self,e.store_name,c.goods_name,c.original_img,d.attr_value,d.attr_price,b.goods_num,b.goods_id')
		->order('a.add_time desc')
		->select();
		foreach ($order_list as $key => &$value) {
			$value['total_price'] = $value['goods_num']*$value['attr_price'];
		}
		$this->assign('order_list',$order_list);
		return $this->fetch();
	}

	public function orderlist_daiping()
	{

		$user_id = $this->user_id;
		$order_list = Db::name('order')->alias('a')
		->join('order_goods b','b.order_id = a.order_id','LEFT')
		->join('goods c','c.goods_id = b.goods_id','LEFT')->join('goods_attr d','d.goods_attr_id = b.attr_id','LEFT')
		->join('store e','e.store_id = a.store_id','LEFT')
		->where('a.user_id',$user_id)
		->where('a.order_status','2')
		->where('a.shipping_status','1')
		->field('a.order_id,a.order_status,a.shipping_status,e.store_name,c.goods_name,c.original_img,d.attr_value,d.attr_price,b.goods_num,b.goods_id')
		->order('a.add_time desc')
		->select();
		foreach ($order_list as $key => &$value) {
			$value['total_price'] = $value['goods_num']*$value['attr_price'];
		}
		$this->assign('order_list',$order_list);
		return $this->fetch();
	}


	public function orderlist_shouhou()
	{
		$user_id = $this->user_id;
		$order_list = Db::name('order')->alias('a')->join('order_goods b','b.order_id = a.order_id','LEFT')->join('goods c','c.goods_id = b.goods_id','LEFT')->join('goods_attr d','d.goods_attr_id = b.attr_id','LEFT')->join('store e','e.store_id = a.store_id','LEFT')->where('a.user_id',$user_id)->where('a.order_status','5')->field('a.order_id,a.order_status,e.store_name,c.goods_name,c.original_img,d.attr_value,d.attr_price,b.goods_num,b.goods_id')->order('a.add_time desc')->select();
		foreach ($order_list as $key => &$value) {
			$value['total_price'] = $value['goods_num']*$value['attr_price'];
		}
		$this->assign('order_list',$order_list);
		return $this->fetch();
	}




    
	public function order_detail()
	{
		$order_id = I('order_id');

		$order_info = Db::name('order')->where('order_id',$order_id)->find();

		$order_goods = Db::name('order_goods')->where('order_id',$order_id)->find();

		//查出商品详情
		$goods_info = Db::name('goods')->where('goods_id',$order_goods['goods_id'])->find();

		//查出商品的属性
		$goods_attr = Db::name('goods_attr')->where('goods_attr_id',$order_goods['attr_id'])->find();

		//查出地址
		//省份
		$province = Db::name('region')->where('id',$order_info['province'])->field('name')->find();

		$city = Db::name('region')->where('id',$order_info['city'])->field('name')->find();

		$district = Db::name('region')->where('id',$order_info['district'])->field('name')->find();
		$towm = Db::name('region')->where('id',$order_info['twon'])->field('name')->find();

		$address = $province['name'].$city['name'].$district['name'].$town['name'].$order_info['address'];
		$this->assign('address',$address);
		$this->assign('order_goods',$order_goods);
		$this->assign('order_info',$order_info);
		$this->assign('goods_info',$goods_info);
		$this->assign('goods_attr',$goods_attr);

		
		return $this->fetch();
  }
    
	public function order_pay()
	{
		
		return $this->fetch();
	}

	public function resetorder()
	{
		$order_id = I('order_id');
		$result = Db::name('order')->where('order_id',$order_id)->delete();
		$rev = Db::name('order_goods')->where('order_id',$order_id)->delete();

		if($result){
			if($rev){
				return array('status'=>1,'msg'=>'取消订单成功');
			}else{
				return array('status'=>-1,'msg'=>'操作失败');
			}

		}else{
			return array('status'=>-1,'msg'=>'操作失败');
		}
		

	}

	public function receivedgoods()
	{
		$order_id = I('order_id');

		$result = Db::name('order')->where('order_id',$order_id)->save(array('order_status'=>2,'confirm_time'=>time()));
		if($result){
			return array('status'=>1,'msg'=>'收货成功');

		}else{

			return array('status'=>-1,'msg'=>'操作失败');
		}

	}

	// 支付成功/失败
	public function orderPayStatus(){

		$status = I('status');
		$this->assign('status',$status);

		return $this->fetch();
	}

// 全部评价

public function allevaluate(){

	$user_id = $this->user_id;

	$img = I('img');
	$where['a.user_id'] = array('eq',$user_id);
	if($img){
		$where['a.img'] = array('neq','');
	}
	$user_info = Db::name('users')->where('user_id',$user_id)->find();

	$comment_list = Db::name('comment')->alias('a')
	->join('goods b','b.goods_id = a.goods_id','LEFT')
	->join('order_goods c','c.order_id = a.order_id','LEFT')
	->join('goods_attr d','d.goods_attr_id = c.attr_id','LEFT')
	->where($where)
	->field('a.add_time,a.content,a.img,a.goods_rank,b.goods_name,b.original_img,d.attr_price,d.attr_value')
	->order('a.add_time desc')
	->select();

	foreach ($comment_list as $key => &$value) {
		if($value['img']){
			$value['comment_img'] = explode(',',$value['img']);
		}else{
			$value['comment_img'] = '';
		}
			
	}
	$this->assign('img',$img);
	$this->assign('user_info',$user_info);
	$this->assign('comment_list',$comment_list);
	

	return $this->fetch();
}

// 合伙人-全部宝贝
public function partner_all(){
	return $this->fetch();
}
// 合伙人-宝贝分类
public function partnerClassify(){
	return $this->fetch();
}
// 支付
public function pay(){
		
	$param = $_SERVER['REQUEST_URI'];

	$store_id = I('store_id');
	
	$mode = I('mode');

	$user_id = $this->user_id;

	//查询店铺的信息

	$store_info = Db::name('store')->where('store_id',$store_id)->find();

	$this->assign('store_info',$store_info);

	$this->assign('user_id',$user_id);
		
		 	
		return $this->fetch();

	}
	
}