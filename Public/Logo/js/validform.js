/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	var pass = $('#password');
	var passInfo = $('#passInfo');
	var repass = $('#repass');
	var repassInfo = $('#repassInfo');
	var name = $('#name');
	var nameInfo = $('#nameInfo');
	var captcha = $('#captcha');
	var captchaInfo = $('#captchaInfo');
	
	//on focus
	$("#customForm input[class=input2 input]").focus(function(){
		$(this).prev('label').hide();
	});
	$("#customForm input[class=input2 input]").focusout(function(){
		if($(this).val().length < 1){
			$(this).prev('label').show();
		}
	});
	
	$("#customForm input[class=input2 input]").focus(function(){
		$(this).prev('label').hide();
	});
	$("#customForm input[class=input2 input]").focusout(validateCaptcha);
	// img bind
	$("#subImg,#ref").live('click',function(){
		var timenow = new Date().getTime();
		$("#subImg").attr('src','/user/captcha/?t='+timenow);
	});
	//On blur
	email.blur(validateEmail);
	pass.blur(validatePass);
	repass.blur(validateRePass);
	name.blur(validateName);
	
	//On key press
	email.keyup(validateEmail);
	email.keyup(validatePass);
	email.keyup(validateRePass);
	email.keyup(validateName);
	
	form.submit(function(){
		if(validateEmail() & validatePass() & validateRePass() & validateName() & validateCaptcha()){
			return true
		}else{
			return false;
		}
	});
	function validateEmail(){
		var a = $("#email").val();
		var filter = /^[a-z0-9]+([\+_\-\.]?[a-z0-9]+)*@([a-z0-9]+[\-]?[a-z0-9]+\.)+[a-z]{2,6}$/;
		if(filter.test(a)){
			emailInfo.text('');
			emailInfo.removeClass("error");
			emailInfo.addClass('ok');
			return true;
		}
		else{
			emailInfo.text("请输入邮箱");
			emailInfo.removeClass('ok');
			emailInfo.addClass('error');
			return false;
		}
	}
	function validatePass()
	{
		var filter = /[0-9]*(([a-zA-Z]+[0-9]+)|([0-9]+[a-zA-Z]+))|[a-zA-Z]*$/;
		if(pass.val() == ''){
			passInfo.text("请输入密码");
			passInfo.removeClass('ok');
			passInfo.addClass('error');
			return false;
		}
		else{
			passInfo.text("");
			passInfo.removeClass("error");
			passInfo.addClass('ok');
			return true;
		}
	}
	function validateRePass()
	{
		if(repass.val() == ''){
			repassInfo.text("请再次输入密码");
			repassInfo.removeClass('ok');
			repassInfo.addClass('error');
			return false;
		}
		else{
			
			if (repass.val() !== pass.val())
			{
				repassInfo.text("两次输入密码不一致");
				repassInfo.removeClass('ok');
				repassInfo.addClass('error');
				return false;
			}
			repassInfo.text("");
			repassInfo.removeClass("error");
			repassInfo.addClass('ok');
			return true;
		}
	}
	function validateName(){
		if(name.val() == ''){
			nameInfo.text("请输入昵称");
			nameInfo.removeClass("ok");
			nameInfo.addClass('error');
			return false;
		}
		else{
			nameInfo.text("");
			nameInfo.removeClass("error");
			nameInfo.addClass('ok');
			return true;
		}
	}
	function validateCaptcha()
	{
		var capt = true;
		if (captcha.val() == '')
		{
			captchaInfo.text("请输验证码");
			captchaInfo.removeClass("ok");
			captchaInfo.addClass('error');
			captcha.prev('label').show();
			capt = false;
		} else 
		{
			$.ajax({
				type:'POST',
				url:'/user/capajax/',
				data:'code='+captcha.val(),
				success:function(html)
				{
					if (html == 'error')
					{
						captchaInfo.text("验证码不正确");
						captchaInfo.removeClass("ok");
						captchaInfo.addClass('error');
						capt = false;
					}
					else 
					{
						captchaInfo.text("");
						captchaInfo.removeClass("error");
						captchaInfo.addClass('ok');
						capt = true;
					}
				}
			});
			return capt;
		}
	}
});