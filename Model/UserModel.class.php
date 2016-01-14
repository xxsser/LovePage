<?php

namespace Model;
use Think\Model;

class UserModel extends Model {
	protected $patchValidate = true ;
	protected $_validate = array(
			array('myname' ,'require','我的名字不能不填哦！'),
			array('taname' ,'require','忘记填写最爱的Ta的名字啦！'),
			array('ltime' ,'/^[0-9]{4}-(((0[13578]|(10|12))-(0[1-9]|[1-2][0-9]|3[0-1]))|(02-(0[1-9]|[1-2][0-9]))|((0[469]|11)-(0[1-9]|[1-2][0-9]|30)))$/','记得填写相爱的那一天哦，格式 2013-01-04！'),
			array('email' ,'email','email格式不正确！',2),
			array('mobile' ,'/^[1][1-57-9]\d{9}$/','手机格式不正确填写！',2),
			array('content' ,'require','写一些想对Ta说的话吧！')
		);
	
}
?>