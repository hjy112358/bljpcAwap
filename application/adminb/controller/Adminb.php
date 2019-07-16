<?php

namespace app\adminb\controller;


use http\Env\Url;
use think\Db;

class adminb extends Base {
    public function index(){
        return $this->fetch();
    }

    public function login(){
        return $this->fetch();
    }

    public function adminlist(){
        return $this->fetch();
    }
    public function adminForm(){
        return $this->fetch();
    }
    
 
}
