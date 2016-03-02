<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class UserController extends Controller {
    public function index(){
		$this->display('Public/logo');
    }
	
	public function isLogin(){
		// var_dump(session('uid'));
		if (session('uid') != ''){
			# 检测是否为真实用户
			$User = M('Members');
			$data = $User->where(" id = '".session('uid')."' ")->find();
			$is_check = $data['ischeck'];
			$is_check = intval($is_check);
			// var_dump($data,$is_check);
			// exit;
			if ($data && $is_check == 2){
				return true;
			} else return false;
		} else return false;
	}
	# 用户登录
	public function login(){
		if (IS_POST){
			$username = I('post.username');
			$User = M('Members');

			$data = $User->where("username = '".$username."' ")->find();
			if($data && $data['passwd'] == md5(I('post.password'))){
								
				if ($data['ischeck'] == 2){
					session('uid',$data['id']);
					$udata = array('logintime'=>time(),'loginip'=>get_client_ip());
					$User->where("id = ".$data['id'])->save($udata);

					$this->success('登录成功！',U('/Index/index'));
				} else {
					// echo "aaa";
					// exit;
					// redirect(U('User/userinfo'));
					$this -> error('审核未通过，暂时无法登陆，请及时与相关负责人联系！');
				}
			} else {
				$this->error('用户名或密码错误！');
			}
		} else {
			$this->error('非法请求');
		}
	}
	public function register(){
        $area = M('Area');
        $proList = $area->where(' reid = 0')->select();
	    $this->assign('proList',$proList);
	    // var_dump($proList);
	    // exit;

		$this->display('Public/register');
	}
	
	public function reg(){
		// var_dump(I('post.'));
		// exit;
		
		$username = I('post.email','','email');
		if($username == ''){
         $this-> error("邮箱地址不能为空！");
		}
		// echo $username;
		// exit;
		if (I('post.passwd','z','/^[A-Za-z0-9]+$/') != I('post.passwd-re','2','/^[A-Za-z0-9]+$/')){
			$this->error('密码不一致！');
		}
        // 得到新增内容开始
        $name = I('post.name','','trim');
        if($name == ''){
        	$this -> error('联系人不能为空！');
        }

        $company = I('post.company','','trim');
        if($company == ''){
        	$this -> error('所在公司不能为空！');
        }

        $address = I('post.address','','trim');
        if($address == ''){
        	$this -> error('公司地址不能为空！');
        }

        $subject = I('post.subject','','trim');
        if($subject == ''){
        	$this -> error('课题组信息不能为空！');
        }

        $dutyer = I('post.dutyer','','trim');
        if($dutyer == ''){
        	$this -> error('实验室负责人信息不能为空！');
        }

        $piao = I('post.piao','','trim');
        // if($piao == ''){
        // 	$this -> error('发票抬头信息不能为空！');
        // }

        $tempaddress = I('post.tempaddress','','trim');
        // if($tempaddress == ''){
        // 	$this -> error('发票邮寄地址信息不能为空！');
        // }

        $province = I('post.province','','trim');
        $city = I('post.city','','trim');


		// 得到新增内容结束

		// if(!preg_match("/^1[3|8|4|5|7]{1}[0-9]{1}[0-9]{8}$/",I('post.phone'))){
		// 	$this->error('手机号码错误！');
		// }

		$phone = I('post.phone','','trim');
		if($phone == ''){
         $this -> error('联系方式不能为空！');
		}

		$sale_name = I('post.sale_name','','trim');

		$userInfo['username'] = $username;
		$userInfo['passwd'] = md5(I('post.passwd','z','/^[A-Za-z0-9]+$/'));
		$userInfo['retime'] = time();
		$rs = M('Members')->data($userInfo)->add();
		if ($rs){
			session('uid',$rs);
			$info['uid'] = $rs;
			$info['phone'] = $phone;
			$info['name']= $name;
			$info['company']= $company;
			$info['address']= $address;
			$info['subject']= $subject;
			$info['dutyer']= $dutyer;
			$info['piao']= $piao;
			$info['tempaddress']= $tempaddress;
			$info['province'] = $province;
			$info['city'] = $city;
            $info['sale_name'] = $sale_name;
			$info['addtime'] = time();
			M('MembersInfo')->data($info)->add();
			$this->success('注册成功！',U('User/guodu'));
		}
	}
	//过渡
	public function guodu(){
		// echo "aaa";
		// exit;
		$this -> display("Public/logo");
	}
	
	public function userinfo(){
		if ($this->isLogin()){
			$uInfo = M('MembersInfo')->where(' uid = '.session('uid'))->find();
			$uEmail = M('Members') -> where('id ='.session('uid'))->find();
			$this -> assign("uEmail",$uEmail['username']);
			$this->assign('userInfo',$uInfo);
			// var_dump($uInfo);
			$area = M('Area');
			if ($uInfo){
				$cityList = $area->where('reid = '.$uInfo['province'])->select();
				$this->assign('city',$cityList);
			}
			# 省份
			
			$proList = $area->where(' reid = 0')->select();
			$this->assign('proList',$proList);
			$this->display('Index/userinfo');
		} else {
			redirect(U('User'));
		}
	}
	
	public function update(){
		if (IS_POST){

			$a = I('post.uname','','trim');
			if($a == ''){
            $this -> error("姓名不能为空！");
			}
			$u['name'] = $a;

			$b = I('post.company','','trim');
			if($b == ''){
            $this -> error('所在单位不能为空！');
			}
			$u['company'] = $b;

            $c = I('post.address','','trim');
            if($c == ''){
            $this -> error("单位地址不能为空");
            }
			$u['address'] = $c;

			$d = I('post.phone','','trim');
			if($d == ''){
            $this -> error('联系方式不能为空');
			}
			$u['phone'] = $d;

			$e = I('post.province','','trim');
			if($e == ''){
            $this -> error('所在城市-省份不能为空！');
			}
			$u['province'] = $e;

			$f = I('post.city','','trim');
			if($f == ''){
            $this -> error('所在城市-城市不能为空！');
			}
			$u['city'] = $f;
            
            $g = I('post.email','','trim');
            if($g == ''){
            $this -> error('邮箱不能为空！');
            }
			$u['email'] = $g;
            
            $h = I('post.subject','','trim');
            if($h == ''){
            $this -> error('课题组名称不能为空！');
            }
         	$u['subject'] = $h;
            
            $i = I('post.dutyer','','trim');
            if($i == ''){
            $this -> error("实验室负责人不能为空！");
            }
			$u['dutyer'] = $i;
            
            $j = I('post.piao','','trim');
            if($j == ''){
            $this -> error("发票抬头不能为空！");
            }
			$u['piao'] = $j;
            
            $k = I('post.tempaddress','','trim');
            if($k == ''){
            $this -> error("发货地址不能为空！");
            }
			$u['tempaddress'] = $k;
			
			$uid = session('uid');
			$UI = M('MembersInfo');
			if ($data = $UI->where(' uid = '.$uid)->find()){
				$u['id'] = $data['id'];
				$UI->data($u)->save();
			} else{
				$u['uid'] = $uid;
				$UI->data($u)->add();
			}
			$this->success('更新成功',U('User/userinfo'));
		} else {
			$this->error('非法请求');
		}
	}
	
	public function capajax(){
		$code = I('post.code');
		$verify = new \Think\Verify();
		if (!$verify->check($code)){
			echo 'error';
		}
	}
	
	public function uppass(){
		if(IS_POST){
            // var_dump(I('post.'));
            
			$pass = I('post.pass','','/^[A-Za-z0-9]+$/');
			$npass = I('post.npass','2','/^[A-Za-z0-9]+$/');
			$npassre = I('post.npass-re','1','/^[A-Za-z0-9]+$/');
			// var_dump($pass,$npass,$npassre);
			// exit;
			$mem = M('Members');
			$userInfo = $mem->where(' id = '.session('uid'))->find();
			
			if ($userInfo['passwd'] == md5($pass)){
				if ($npass == 1 || $npassre == 2) {
					$this->error('请按要求填写新密码！',U('User/uppass'));
				}
				if ($npass == $npassre){
					$data['passwd'] = md5($npass);
					$data['id'] = $userInfo['id'];
					$rs = $mem->data($data)->save();
					$this->success('更新成功',U('User/userinfo'));
				} else {
					$this->error('新密码与确认密码不一致！',U('User/uppass'));
				}
			} else {
				$this->error('原始密码不准确,请重新填写！');
			}
		} else {
			$uInfo = M('MembersInfo')->where(' uid = '.session('uid'))->find();
			 
			$this->assign('userInfo',$uInfo);

			$this->display('Index/uppass');
		}
	}
	
	public function logout(){
		// I('session.')
		session('uid','');
		// ob_clean();
		redirect(U('/Home/User/'));
	}
	public function verify(){
		ob_clean();
		$verify = new \Think\Verify();
		$verify->__set('imageW',100);
		$verify->__set('imageH',29);
		$verify->__set('fontSize',13);
		$verify->__set('useCurve',false);
		$verify->__set('useNoise',false);
		$verify->__set('length',4);
		
		$verify->entry();
	}
	
	public function getcity(){
		$id = I('post.id','','int');
		$html = '';
		if ($id > 0){
			$area = M('Area');
			$cityList = $area->where(' reid = '.$id)->select();
			$html = "<option value='0'>选择城市</option>";
			foreach($cityList as $k=>$v){
				$html .= "<option value=\"".$v['id']."\">".$v['name']."</option>";
			}
		}
		echo $html;
	}
	//判断Email是否已经注册
	public function myEmail(){
		// var_dump(I("get."));
		// exit;
		$content = I("get.content",'','trim');
		$User = M('Members');
		$userModel = M('Tp_user'); //后台登陆

		$data = $User->where("username = '".$content."' ")->find();
		$data_a = $userModel -> where("username = '".$content."'") -> find();

		if($data != null || $data_a != null){
         echo "对不起，该用户已经注册!";
		}else{
			echo "wuheng";
		} 

		 
        // var_dump($data);
		//echo $content;
	}


}