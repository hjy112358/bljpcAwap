<?php
namespace app\api\controller;

use think\Cache;

class Wx extends Base
{

    public $app_id = 'wx54b9e4dd6bbb3963';
    public $app_secrect = '6dd0d4416abd4ea0791341531b42fc2d';

    public function access_token(){
        $access_token = Cache::get('access_token');
        if (!empty($access_token)){
            return $access_token;
        }else{
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->app_id.'&secret='.$this->app_secrect;
            $json = $this->curl_get($url);
            $res = json_decode($json,1);

            if (isset($res['access_token'])){
                Cache::set('access_token',$res['access_token'],7200) ;
                return $res['access_token'];
        }else{
                return false;
            }
        }
    }
    public function jsapi_ticket(){
        $jsapi_ticket = Cache::get('jsapi_ticket');
        if (!empty($jsapi_ticket)){
            return $jsapi_ticket;
        }else{
            $access_token = $this->access_token();
            $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi';
            $json = $this->curl_get($url);
            $res = json_decode($json,1);
            if (isset($res['ticket'])){
                Cache::set('jsapi_ticket',$res['ticket'],7200) ;
                return $res['ticket'];
            }else{
                return false;
            }
        }
    }
    public function config($goods_id = 0){
        $time = time();
        $noncestr = substr(md5($time),16);
        $str  = 'jsapi_ticket='.$this->jsapi_ticket();
        $str .= '&noncestr='.$noncestr;
        $str .= '&timestamp='.$time;
        $str .= '&url=abc.fyc365.cn/Mobile/Goods/goodsDetailNew/id/'.$goods_id.'.html';
        $signature = sha1($str);
        $arr = array(
            'timestamp'                 => $time,
            'nonceStr'                  => $noncestr,
            'appId'                     => $this->app_id,
            'signature'                 => $signature,
            'jsApiList' => "['updateAppMessageShareData']"
        );
        return $arr;
    }
    public function curl_get($url)
    {
        $headers = array('User-Agent:Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36');
        $oCurl = curl_init();
        if (stripos($url, "https://") !== FALSE) {
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1);
        }
        curl_setopt($oCurl, CURLOPT_TIMEOUT, 20);
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        if (intval($aStatus["http_code"]) == 200) {
            return $sContent;
        } else {
            return false;
        }
    }
}
