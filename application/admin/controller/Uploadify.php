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
 * Author: 当燃      
 * Date: 2015-09-22
 */
 
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Image;
use OSS\OssClient;
use OSS\Core\OssException;
class Uploadify extends Base{
   
    public function upload(){
        $func = I('func');
        $path = I('path','temp');
        $info = array(
        	'num'=> I('num/d'),
            'title' => '',       	
            'upload' =>U('Admin/Ueditor/imageUp',array('savepath'=>$path,'pictitle'=>'banner','dir'=>'images')),
            'size' => '4M',
            'type' =>'jpg,png,gif,jpeg',
            'input' => I('input'),
            'func' => empty($func) ? 'undefined' : $func,
        );
        $this->assign('info',$info);
        return $this->fetch();
    }
    
    /*
              删除上传的图片
     */
    public function delupload(){
        $action = I('action');                
        $filename= I('filename');
        $filename= str_replace('../','',$filename);
        $filename= trim($filename,'.');
        $filename= trim($filename,'/');
        if($action=='del' && !empty($filename) && file_exists($filename)){
            $size = getimagesize($filename);
            $filetype = explode('/',$size['mime']);
            if($filetype[0]!='image'){
                return false;
                exit;
            }
            unlink($filename);
            exit;
        }
    }


    public function uploadsfile(){

         $file = request()->file("files"); 
         $arr = upload_oss($file);
         return $arr['imgurl'];
        //  if(empty($file)) {  
        //      return 0;
        // }  
        //  $info = $file->move(ROOT_PATH . 'public' . DS . 'upload'.'/category'); 
        //  if($info){
        //     $filename = $info->getsavename();
        //     $filepath="/public/upload/category/".$filename;
        //     $result_img =  str_replace('\\', '/', $filepath);
        //     return $result_img;
        //  }else{
        //    return 0;
        //  }
    }

    public function uploadslogo(){
        $file = request()->file('logo');
        $arr = upload_oss($file);
        return $arr['imgurl'];
        // if(empty($file)){
        //     return 0;
        // }
        // $info = $file->move(ROOT_PATH . 'public' . DS . 'upload'.'/brand'); 
        // if($info){
        //     $filename = $info->getsavename();
        //     $filepath="/public/upload/brand/".$filename;
        //     $result_img =  str_replace('\\', '/', $filepath);
        //     return $result_img;
        // }else{
        //     return 0;
        // }

    }


    public function uploadsgoodsimg(){
        $file = request()->file('goods_img');
        $arr = upload_oss($file);
        return $arr['imgurl'];
      
    }

    public function ceshi(){
        $img = "f165d9a14f2208dc6992ac86209e0a9f213e4e14.jpeg";
        $result = delupload_ossimg($img);
        dump($result);
        
    }


    public function uploadsfile_avatar(){
        $file = request()->file('file_avatar');
        $arr = upload_oss($file);
        return $arr['imgurl'];

        // if(empty($file)){
        //     return 0;
        // }
        // $info = $file->move(ROOT_PATH . 'public' . DS . 'upload'.'/store'); 
        // if($info){
        //     $filename = $info->getsavename();
        //     $filepath="/public/upload/store/".$filename;
        //     $result_img =  str_replace('\\', '/', $filepath);
        //     return $result_img;
        // }else{
        //     return 0;
        // }

    }

    public function uploadsfile_adv(){
        $file = request()->file('file_adv');
        $arr = upload_oss($file);
        return $arr['imgurl'];

        // if(empty($file)){
        //     return 0;
        // }
        // $info = $file->move(ROOT_PATH . 'public' . DS . 'upload'.'/store'); 
        // if($info){
        //     $filename = $info->getsavename();
        //     $filepath="/public/upload/store/".$filename;
        //     $result_img =  str_replace('\\', '/', $filepath);
        //     return $result_img;
        // }else{
        //     return 0;
        // }

    }


    public function comment_imgs(){
        $file = request()->file('comment_img');
        $arr = upload_oss($file);
        return $arr['imgurl'];

        // if(empty($file)){
        //     return 0;
        // }
        // $info = $file->move(ROOT_PATH . 'public' . DS . 'upload'.'/comment'); 
        // if($info){
        //     $filename = $info->getsavename();
        //     $filepath="/public/upload/comment/".$filename;
        //     $result_img =  str_replace('\\', '/', $filepath);
        //     return $result_img;
        // }else{
        //     return 0;
        // }

    }
   



}