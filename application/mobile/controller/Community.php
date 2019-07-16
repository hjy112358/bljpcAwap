<?php

namespace app\mobile\controller;
use app\mobile\logic\ReplyLogic;

use think\AjaxPage;
use think\Page;
use think\Db;

class Community extends MobileBase {
    // @我
    public function aboutMe(){       
        return $this->fetch();
    }
    // 通知
    public function inform(){       
        return $this->fetch();
    }
    // 评论
    public function comment(){       
        return $this->fetch();
    }
    // 发帖
    public function sendMsg(){       
        return $this->fetch();
    } 
    // 通知详情
    public function informdetail(){       
        return $this->fetch();
    }
    
    
}