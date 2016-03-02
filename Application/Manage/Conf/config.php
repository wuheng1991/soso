<?php
return array(
	//'配置项'=>'配置值'
'RBAC_SUPERADMIN' => 'admin',//超级管理员名称，对应用户表中某一个用户：username
'ADMIN_AUTH_KEY' => 'superadmin',//超级管理员识别	

'USER_AUTH_ON' => true, //是否需要认证
'USER_AUTH_TYPE' => 1, //认证类型 1-登陆后认证，2-实时认证
'USER_AUTH_KEY' => 'authId', //认证识别号,此处可以自定义
//'REQUIRE_AUTH_MODULE' => '',  //需要认证模块
'NOT_AUTH_MODULE' => 'User,Index,Safe', //无需认证模块,和上面重复
'NOT_AUTH_ACTION' => 'addRoleHandle,addNodeHandle,addUserHandle,accessHandle',//无需认证操作
//'USER_AUTH_GATEWAY' => '', //认证网关,此处可以不用
//'RBAC_DB_DSN' => '',  //数据库连接DSN
'RBAC_ROLE_TABLE' => 'ge_tp_role', //角色表名称
'RBAC_USER_TABLE' => 'ge_tp_role_user', //用户表名称
'RBAC_ACCESS_TABLE' => 'ge_tp_access', //权限表名称
'RBAC_NODE_TABLE' => 'ge_tp_node', //节点表名称
//email开始
'SMTP_SERVER' =>'smtp.ym.163.com',					//邮件服务器
'SMTP_PORT' =>25,								//邮件服务器端口
'SMTP_USER_EMAIL' =>'han.hu@genecreate.com', 	//SMTP服务器的用户邮箱(一般发件人也得用这个邮箱)
'SMTP_USER'=>'han.hu@genecreate.com',			//SMTP服务器账户名
'SMTP_PWD'=>'196424@wh1991',							//SMTP服务器账户密码
'SMTP_MAIL_TYPE'=>'HTML',						//发送邮件类型:HTML,TXT(注意都是大写)
'SMTP_TIME_OUT'=>30,							//超时时间
'SMTP_AUTH'=>true,								//邮箱验证(一般都要开启)
//email结束
);