<?php

namespace app\ticket\Controller;
use app\admin\logic\UpgradeLogic;
use think\Controller;
use think\Session;
class Base extends Controller {

    /**
     * 析构函数
     */
//    function __construct()
//    {
//        Session::start();
//        header("Cache-control: private");  // history.back返回后输入框值丢失问题 参考文章 http://www.tp-shop.cn/article_id_1465.html  http://blog.csdn.net/qinchaoguang123456/article/details/29852881
//        parent::__construct();
//        $upgradeLogic = new UpgradeLogic();
//        $upgradeMsg = $upgradeLogic->checkVersion(); //升级包消息
//        $this->assign('upgradeMsg',$upgradeMsg);
//        tpversion();
//    }

    /*
     * 初始化操作
     */
    public function _initialize()
    {

//        $this->assign('action',ACTION_NAME);
        //过滤不需要登陆的行为
        if(in_array(ACTION_NAME,array('login','login_do')) || in_array(CONTROLLER_NAME,array())){
            //return;
        }else{
            if(session('admin_user_id') > 0 ){
//                $this->check_priv();//检查管理员菜单操作权限
            }else{
                $this->error('请先登陆',U('ticket/login'),1);
            }
        }
//        $this->public_assign();
    }

    /**
     * 保存公告变量到 smarty中 比如 导航
     */
//    public function public_assign()
//    {
//        $tpshop_config = array();
//        $tp_config = M('config')->select();
//        foreach($tp_config as $k => $v)
//        {
//            $tpshop_config[$v['inc_type'].'_'.$v['name']] = $v['value'];
//        }
//        $this->assign('tpshop_config', $tpshop_config);
//    }

//    public function check_priv()
//    {
//        $ctl = CONTROLLER_NAME;
//        $act = ACTION_NAME;
//        $act_list = session('act_list');
//        //无需验证的操作
//        $uneed_check = array('login','logout','vertifyHandle','vertify','imageUp','upload','login_task','forget_pwd');
//        if($ctl == 'Index' || $act_list == 'all'){
//            //后台首页控制器无需验证,超级管理员无需验证
//            return true;
//        }elseif(strpos($act,'ajax') || in_array($act,$uneed_check)){
//            //所有ajax请求不需要验证权限
//            return true;
//        }else{
//            $right = M('system_menu')->where("id in ($act_list)")->cache(true)->getField('right',true);
//            foreach ($right as $val){
//                $role_right .= $val.',';
//            }
//            $role_right = explode(',', $role_right);
//            //检查是否拥有此操作权限
//            if(!in_array($ctl.'@'.$act, $role_right)){
//                $this->error('您没有操作权限,请联系超级管理员分配权限',U('Admin/Index/welcome'));
//            }
//        }
//    }

    public function ajaxReturn($data,$type = 'json'){
        exit(json_encode($data));
    }
}