<?php
namespace Manage\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
class CommonController extends Controller {
    // public function index(){
    //   echo "common";
    // }	
    public function _initialize(){
      if(!isset($_SESSION[C('USER_AUTH_KEY')])){
         $this -> redirect('User/index');
      }
       //Rbac认证
       $noAuth = (in_array(CONTROLLER_NAME,explode(',',C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION'))));
      
      if(C('USER_AUTH_ON') && !$noAuth){
         $rbac=new \Org\Util\Rbac();
        if(!$rbac::AccessDecision()){
            // echo MODULE_NAME."-".CONTROLLER_NAME."-".ACTION_NAME.'-没有权限';
             echo "<script>alert('对不起，您没有该操作的权限！如有不便，请联系管理员。');</script>";
             echo "<script>window.history.back();</script>";
             exit;

              // $this -> error("没有权限",U('User/index'));
         }
        //  else{
        
        //    echo MODULE_NAME."-".CONTROLLER_NAME."-".ACTION_NAME.'-有权限';
        // }

      }
     
    } 
}