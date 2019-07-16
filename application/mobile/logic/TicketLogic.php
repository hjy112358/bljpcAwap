<?php
namespace app\mobile\logic;
use think\Model;
use think\Db;
class TicketLogic extends Model
{
    public function balance($user_id = 0, $type = 0, $value = 0)
    {
        //$type 1 账户余额增加  2  账户余额减少
        if($type == 1){
            $res = Db::name('ticket_hold')->where('user_id',$user_id)->where('ticket_id',5)->setInc('ticket_number',$value);
            if($res){
                return array('status'=>1,'msg'=>'操作成功');
            }


        }

        if($type == 2){
            $res = Db::name('ticket_hold')->where('user_id',$user_id)->where('ticket_id',5)->setDec('ticket_number',$value);
            $arr['ticket_change_user_id'] = $user_id;
            $arr['ticket_id'] = 5;
            $arr['ticket_change_number'] = $value;
            $arr['ticket_change_add'] = 0;
            $arr['ticket_change_type'] = 14;
            $arr['ticket_change_time'] = date("Y-m-d H:i:s",time());
            Db::name('ticket_change')->insertGetId($arr);
            if($res){
                return array('status'=>1,'msg'=>'操作成功');
            }

        }

    }

    public function zcoupon($user_id = 0, $type = 0, $value = 0)
    {
        //$type 1 账户Z券增加  2  账户Z券减少
        if($type == 1){
            $res = Db::name('ticket_hold')->where('user_id',$user_id)->where('ticket_id',0)->setInc('ticket_number',$value);
            $arr['ticket_change_user_id'] = $user_id;
            $arr['ticket_id'] = 0;
            $arr['ticket_change_number'] = $value;
            $arr['ticket_change_add'] = 1;
            $arr['ticket_change_type'] = 1;
            $arr['ticket_change_time'] = date("Y-m-d H:i:s",time());
            Db::name('ticket_change')->insertGetId($arr);
            if($res){
                return array('status'=>1,'msg'=>'操作成功');
            }


        }

        if($type == 2){
            $res = Db::name('ticket_hold')->where('user_id',$user_id)->where('ticket_id',0)->setDec('ticket_number',$value);
            if($res){
                return array('status'=>1,'msg'=>'操作成功');
            }

        }

    }

   

    public function store_count($store_id = 0, $type = 0, $value = 0)
    {
        //$type 1 商户账户Z券增加  2  商户账户Z券减少
        if($type == 1){
            $res = Db::name('store')->where('store_id',$store_id)->setInc('zquota',$value);
            if($res){
                return array('status'=>1,'msg'=>'操作成功');
            }

        }

        if($type == 2){
            $res = Db::name('store')->where('store_id',$store_id)->setDec('zquota',$value);
            if($res){
                return array('status'=>1,'msg'=>'操作成功');
            }

        }

    }

    
    




}