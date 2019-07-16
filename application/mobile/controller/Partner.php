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
use think\AjaxPage;
use think\Page;
use think\Db;

class Partner extends MobileBase 
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
				header("location:" . U('Mobile/User/login'));
				exit;
		}


	}

    public function partner_all()
    { 

        //顶推商品 
        $user_id = $this->user_id;
        
        $goods = Db::name('goods')->where('is_ding',1)->where('is_partner',1)->where('is_on_sale','1')->find();

        $goods_list = Db::name('goods')->where('is_ding','<>','1')->where('is_partner',1)->where('is_on_sale',1)->select();

        //查询用户是否购买过商品 
        $user_info = Db::name('users')->where('user_id',$user_id)->field('is_partner,partner_goodsid,user_id,is_agree')->find(); 
        $this->assign('user_info',$user_info);
        $this->assign('goods',$goods);
        $this->assign('goods_list',$goods_list);    

        return $this->fetch();
    }


    public function ajaxagree()
    {

        $user_id = I('user_id');
        if(!$user_id){
            $user_id = $this->user_id;
        }

        $result = Db::name('users')->where('user_id',$user_id)->save(array('is_agree'=>1));
        if($result){
            return array('status'=>1,'msg'=>'同意');
        }else{
            return  array("status"=>-1,'msg'=>'不同意');
        }


    }




  

}