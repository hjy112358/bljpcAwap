<?php

namespace app\seller\controller;

use think\Page;
use think\Verify;
use think\Db;
use think\Session;


class Reg extends Base
{
    public $user_id = 0;
    public $apply = array();
    public function _initialize(){
        if (in_array(ACTION_NAME, array('loginNew','loginNew_do','vertify'))){

        }else{
            $this->user_id = $_SESSION['user_id'];
            if (!empty($this->user_id)){
                $user = D('users')->where("user_id",$this->user_id)->field('nickname,head_pic')->limit(1)->select()[0];
                $user['islogin'] = 1;
                $this->apply = M('store_apply')->where(array('user_id' => $this->user_id))->find();
            }else{
                $user = array(
                    'nickname' => '<a href="loginNew.html"  style="color:#fff;text-decoration: underline">请登录</a>',
                    'head_pic' => '/public/assets/images/userimg.png',
                    'islogin'  => 0
                );
                if (empty($this->user_id) && ACTION_NAME != 'loginNew') {
                    $this->redirect(U('reg/loginNew'));
                } else if (!empty($this->user_id)) {
                    $this->apply = M('store_apply')->where(array('user_id' => $this->user_id))->find();
                }
            }
            $this->assign('user_info',$user);
        }
    }

    public function loginNew(){
        return $this->fetch();
    }

    public function loginNew_do(){
        $username = I('username');
        $password = I('password');
        $vertify = I('vertify');
        $verify = new Verify();
        if (!$verify->check($vertify, "seller_login")) {
            exit(json_encode(array('status' => 0, 'msg' => '验证码错误')));
        }
        if (empty($username) || empty($password)) {
            exit(json_encode(array('status' => 0, 'msg' => '请填写账号密码')));
        }
        $user = D('users')->where("mobile",$username)->field('user_id,mobile,password')->limit(1)->select();
        if (empty($user)){
            exit(json_encode(array('status' => 0, 'msg' => '用户不存在，请先注册')));
        }
        if ($user[0]['password']!= encrypt($password)){
            exit(json_encode(array('status' => 0, 'msg' => '密码错误，请重试')));
        }

        session('user_id', $user[0]['user_id']);
        $url = U('reg/sellerReg');
        exit(json_encode(array('status' => 1, 'url' => $url)));
        return $this->fetch();
    }
    public function getloginstatus(){
        $session = $_SESSION['user_id'];
        if (empty($session)){
            return false;
        }
        return true;
    }
    public function loginstatusout(){
        unset($_SESSION['user_id']);
        if ($_SESSION['user_id'] == ''){
            return true;
        }

    }
    public function sellerReg(){
        if (!empty($this->apply)) {
            if ($this->apply['apply_state'] == 1) {
                $this->redirect(U('reg/sellerRegAudit'));
            } else if ($this->apply['apply_state'] == 0 && empty($this->apply['company_name'])) {
                $this->redirect(U('reg/sellerRegThree'));
            } else if (empty($this->apply['store_name'])) {
                    $this->redirect(U('reg/sellerRegFour'));
            } else {
                $this->redirect(U('reg/sellerRegAudit'));
            }
        }
        return $this->fetch();
    }

    public function sellerRegTwo(){
        if ($this->apply['apply_state'] == 1) {
            $this->redirect(U('reg/sellerRegAudit'));
        }
        if (IS_POST){
            $data['contacts_name'] = I('contacts_name');
            $data['contacts_mobile'] = I('contacts_mobile');
            $data['contacts_email'] = I('contacts_email');
            $data['user_id'] = $this->user_id;
            $data['add_time'] = time();
            $data['apply_type'] = 0;
            if (empty($this->apply)){
                M('store_apply')->where(['user_id'=>$this->user_id])->add($data);
            }else{
                M('store_apply')->where(['user_id'=>$this->user_id])->save($data);
            }
            $this->redirect('reg/sellerRegThree');

        }
        return $this->fetch();
    }

    public function sellerRegThree(){
        if ($this->apply['apply_state'] == 1) {
            $this->redirect(U('reg/sellerRegAudit'));
        }
        if (IS_POST){
            $datas['company_name'] = I('company_name');
            $datas['company_type'] = I('company_type');
            $datas['company_province'] = I('company_province');
            $datas['company_city'] = I('company_city');
            $datas['company_district'] = I('company_district');
            $datas['company_address'] = I('company_address');
            $datas['company_website'] = I('company_website');
            $datas['company_telephone'] = I('company_telephone');
            $datas['company_zipcode'] = I('company_zipcode');
            $datas['company_email'] = I('company_email');
            $datas['company_fax'] = I('company_fax');
            $datas['contacts_name'] = I('contacts_name');
            $datas['contacts_mobile'] = I('contacts_mobile');
            $datas['contacts_email'] = I('contacts_email');
            $datas['business_licence_number'] = I('business_licence_number');
            $datas['business_scope'] = I('business_scope');
            $business_date = I('business_date');
            $array = explode(' - ',$business_date);
            $datas['business_date_start'] = $array[0];
            $datas['business_date_end'] = $array[1];
            M('store_apply')->where(['user_id'=>$this->user_id])->save($datas);
            $this->redirect('reg/sellerRegFour');
        }
        $company_type = array('股份有限公司', '个人独立企业', '有限责任公司', '外资', '中外合资', '国企', '合伙制企业', '其它');
        $province = M('region')->where(array('parent_id' => 0))->select();
        $this->assign('company_type', $company_type);
        $this->assign('apply', $this->apply);
        $this->assign('province', $province);
        return $this->fetch();
    }
    public function sellerRegFour(){
        if ($this->apply['apply_state'] == 1) {
            $this->redirect(U('reg/sellerRegAudit'));
        }
        if (IS_POST){
            $data1['seller_name']         = I('seller_name');
            $data1['store_name']          = I('store_name');
            $data1['store_person_name']   = I('store_person_name');
            $data1['store_person_mobile'] = I('store_person_mobile');
            $data1['store_person_qq']     = I('store_person_qq');
            $data1['store_person_email']  = I('store_person_email');
            $data1['sc_id']         = I('sc_id');
            M('store_apply')->where(['user_id'=>$this->user_id])->save($data1);
            $this->redirect('reg/sellerRegAudit');
        }

        $this->assign('store_class', M('store_class')->getField('sc_id,sc_name'));
        return $this->fetch();
    }
    public function sellerRegAudit(){
        return $this->fetch();
    }


    public function check_company()
    {
        $company_name = I('company_name');
        if (empty($company_name)) exit('fail');
        if ($company_name && M('store_apply')->where(array('company_name' => $company_name, 'user_id' => array('neq', $this->user_id)))->count() > 0) {
            exit('fail');
        }
        exit('success');
    }
}