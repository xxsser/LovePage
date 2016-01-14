<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$obj = M('user');
    	$id = $_GET['id']?$_GET['id']:0;
    	$data = $obj -> where("url='".$id."'") -> find() ? $obj -> where("url='".$id."'") -> find() : $obj -> where("url=0") -> find();
    	$data['content'] = explode("\n",$data['content']);
    	$this -> assign('data',$data);
    	if($this->isMobile()){
        	$this -> display('m_index');
    	}else{
    		$this -> display();
    	}

    }

    public function register(){
    	$obj = new \Model\UserModel;
    	if(!empty($_POST)) {
    		$rand = rand(0,9999);
    		$url = substr(md5(time() - $rand),12,8);
    		$_POST['url'] = $url;
    		$_POST['time'] = time();
    		$_POST['lovetime'] =$_POST['ltime']?strtotime($_POST['ltime']):null;
            while (empty($_POST['content'])){
                $content = M('poem');
                $poem = $content -> query('select poem from poem where id=(select FLOOR(1 + (RAND() * (SELECT MAX(id) FROM `poem`)))) limit 1');
                $_POST['content'] = $poem['0']['poem'];
            }
            $z = $obj -> create();
    		if($z){
        		$result = $obj -> add();
        		if($result) {
            			echo '<script>alert("页面生成成功")</script>';
                        echo '<script>alert("记得记下网址链接哦，快快发给朋友们Show一下吧！")</script>';
            			echo '<script language="javascript" type="text/javascript">window.location.href="'.U('Home/Index/Index/id/'.$url).'";</script>';
            		} else {
            			echo '<script>alert("生成失败，请重新提交或联系")</script>';
             			echo '<script language="javascript" type="text/javascript">window.location.href="'.U('Home/Index/register').'";</script>';
            		}
            }else{
                $err = $obj -> getError();
                echo '<script>alert("';
                foreach($err as $key){
                    echo $key.'\n';
                }
                echo '")</script>';
                echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
                exit;
            }
    	}
        if($this->isMobile()){
        	$this -> display('m_register');
    	}else{
    		$this -> display();
    	}
    }

	public function isMobile(){
		$useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
		$useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';
		function CheckSubstrs($substrs,$text){
			foreach($substrs as $substr)
			if(false!==strpos($text,$substr)){
				return true;
			}
			return false;
		} 
		$mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
		$mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');
		$found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) || CheckSubstrs($mobile_token_list,$useragent);
		if ($found_mobile){
			return true;
		}else{
			return false;
		}
	}

    public function poem(){
    	$obj = M('poem');
    	if($_POST) {
            $obj -> create();
            $result = $obj -> add();
            if($result){
                echo '<script>alert("OK")</script>';
                echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
            }
        }
        $this -> display();

    }
}