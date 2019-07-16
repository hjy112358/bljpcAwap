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
 * $Author: 当燃 2016-01-09
 */ 
namespace app\mobile\controller;
class Patternb extends MobileBase {
	// b-vip店铺
	public function index(){
		return $this->fetch();
	}
	// 资产包
	public function asselPool(){
		return $this->fetch();
	}
	// 我的资产包
	public function myasselpool(){
		return $this->fetch();
	}
	// 我的团队
	public function myteam(){
		return $this->fetch();
	}
	// 结算
	public function seAccout(){
		return $this->fetch();
	}
	// 买入
	public function buyIn(){
		return $this->fetch();
	}
	// 卖出
	public function scaleOut(){
		return $this->fetch();
	}

}