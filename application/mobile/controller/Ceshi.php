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
use app\mobile\controller\Utils;

class Ceshi extends MobileBase {
    public function index(){  
    //     include_once("utils.php");

    //     $base64_image_content=$_POST['img'];
        
    //     if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result))
        
    //     {
        
    //       $type = $result[2];
        
    //       $new_file = "./2.{$type}";
        
    //       if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
        
    //         $code=utils::deCodeBitMap("2.png","192.168.46.123",20147);
        
    //         echo '{"status":"success","data":"'.trim($code).'"}';
        
    //       }else{
        
    //         echo '{"status":"write error","data":"NO"}';
        
    //       }
        
    //     }else{
        
    //         echo '{"status":"preg error","data":"NO"}';
        
    //     }

        return $this->fetch();
    }


    public function saveimg(){

        include_once("./Utils.php");
        $base64_image_content=$_POST['img'];  
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result))  
        {  
        $type = $result[2];  
        $new_file = "./2.{$type}";  
        if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){  
            $code=utils::deCodeBitMap("2.png","192.168.46.123",20147);  
            echo '{"status":"success","data":"'.trim($code).'"}';  
        }else{  
            echo '{"status":"write error","data":"NO"}';  
        }  
        }else{  
            echo '{"status":"preg error","data":"NO"}';  
        }  
    }

}