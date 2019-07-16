<?php
/**
 * tpshop
 * ============================================================================
 * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: IT宇宙人     
 * Date: 2015-09-09
 */
namespace app\admin\controller;
use think\AjaxPage;
use think\Page;
use think\Db;

class Partner extends Base {
    
    
    public function partner_list()
    {

        $where['is_partner'] = array('<>',0);
        $list = Db::name('users')->where($where)->paginate(10);

        $page = $list->render();
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch();
    }

    public function changepartner()
    {

        $user_id = I('user_id');
        $type = I('type');

        if($type == 1){
           $result = Db::name('users')->where('user_id',$user_id)->save(array('is_partner'=>1));
           if($result){
               return array('status'=>'1');
           }else{
            return array('status'=>'-1');
           }


        }

        if($type == 2){
            $result = Db::name('users')->where('user_id',$user_id)->save(array('is_partner'=>2));
            if($result){
                return array('status'=>'1');
            }else{
                return array('status'=>'-1');
            }
        }


    }






    public function goods_list()
    {

        $list = Db::name('goods')->where('is_partner',1)->select();
        $this->assign('list',$list);
        return $this->fetch();

    }


    public function addgoods()
    {   

        $goods_id = I('goods_id');
        $goods_info = Db::name('goods')->where('goods_id',$goods_id)->find();

        if(request()->isAjax()){
            $goods_id = I('goods_id');
            if($goods_id){
              
                $result = Db::name('goods')->where('goods_id',$goods_id)->save($_POST);
                if($result){
                    return array('status'=>1,'msg'=>'修改成功');
                }else{
                    return array('status'=>-1,'msg'=>'修改失败');
                }   
            }else{
                //传过来的值
                $data['goods_name'] = I('goods_name');
                $data['store_count'] = I('store_count');
                $data['shop_price'] = I('shop_price');
                $data['keywords'] = I('keywords');
                $data['zcoupon'] = I('zcoupon');
                $data['original_img'] = I('original_img');
                $data['goods_remark'] = I('goods_remark');
                $data['goods_content'] = I('goods_content');
                //整理
                $data['is_partner'] = 1;
                $data['goods_sn'] = $this->productcode(10);
                $data['is_zcoupon'] = 1;
                $data['is_on_sale'] = 1;
                $data['on_time'] = time();
                $data['goods_state'] = 1;
                $data['store_id'] = 13;

                $result = Db::name('goods')->insertGetId($data);

                $rev = Db::name('goods_attr')->insertGetId(array('goods_id'=>$result,'attr_value'=>$data['goods_name'],'attr_price'=>$data['shop_price'],'attr_num'=>$data['store_count'],'attr_profit'=>0));

                Db::name('goods')->where('goods_id',$result)->save(array('attr_id'=>$rev));


                if($result){
                    return array('status'=>1,'msg'=>'新增成功');

                }else{
                    return array('status'=>1,'msg'=>'新增失败');

                }


            }

        }

        $this->assign('goods_info',$goods_info);

        $this->initEditor(); // 编辑器
        return  $this->fetch();
    }


    public function delgoods()
    {
        $goods_id = I('goods_id');
        Db::name('goods_images')->where('goods_id',$goods_id)->delete();
        $result = Db::name('goods')->where('goods_id',$goods_id)->delete();

        if($result){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }


    }


    public function changegoods()
    {

        $goods_id = I('goods_id');
        $type = I('type');

        if($type == 1){
           $result = Db::name('goods')->where('goods_id',$goods_id)->save(array('is_on_sale'=>1));
           if($result){
               return array('status'=>'1');
           }else{
            return array('status'=>'-1');
           }


        }

        if($type == 2){
            $result = Db::name('goods')->where('goods_id',$goods_id)->save(array('is_on_sale'=>0));
            if($result){
                return array('status'=>'1');
            }else{
                return array('status'=>'-1');
            }
        }


    }


    

    public function productcode($length)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        for($i=0;$i<$length;$i++){
            $code.=$chars[mt_rand(0,strlen($chars)-1)];
        }

        return $code;
    }

    public function addimgs()
    {

        $goods_id = I('goods_id');
        $imgs_list = Db::name('goods_images')->where('goods_id',$goods_id)->select();
     
        
        if(request()->isAjax()){
            $goods_id = I('goods_id');
            $imgs = I('imgs');
            $img_list = explode(',',$imgs);
            // return $img_list;
            $data_list = array();
            foreach ($img_list as $key => $value) {
               $data_list[] = Db::name('goods_images')->insertGetId(array('image_url'=>$value,'goods_id'=>$goods_id));
            }

            if($data_list){
                return array('status'=>1,'msg'=>'上传成功');
            }else{
                return array('status'=>-1,'msg'=>'上传失败');
            }
            

        }
        $this->assign('goods_id',$goods_id);
        $this->assign('imgs_list',$imgs_list);
        
        return $this->fetch();
    }


    public function delimg()
    {
        $ids = I('ids');
  

        $result = Db::name('goods_images')->where('img_id','in',$ids)->delete();

        if($result){
            return  array('status'=>1,'msg'=>'删除成功');
        }else{

            return array('status'=>-1,'msg'=>'删除失败');
        }





    }

    /**
     * 初始化编辑器链接     
     * 本编辑器参考 地址 http://fex.baidu.com/ueditor/
     */
    private function initEditor()
    {
        $this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'goods'))); // 图片上传目录
        $this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'article'))); //  不知道啥图片
        $this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'article'))); // 文件上传s
        $this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'article')));  //  图片流
        $this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'article'))); // 远程图片管理
        $this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'article'))); // 图片管理        
        $this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'article'))); // 视频上传
        $this->assign("URL_Home", "");
    }    
    


     


}