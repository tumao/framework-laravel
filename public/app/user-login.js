// admin/user 页面
function userlogin()
{
	var username = $.trim($('#username').val());
	var password = $.trim($('#password').val());
	var remember = $('#remember').prop('checked');
	if( username == '')
	{
		$('#username').trigger('focus');
		return false;
	}
	else if( password == '')
	{
		$('#password').trigger('focus');
		return false;
	}
	$.ajax({
		'url'	:'/admin/login',
		'type'	:'post',
		'dataType'	: 'json',
		'data'	:{
			username:username,
			password:password,
			remember:remember
		},
		'success':function(rp)
		{
			if(rp == '0')
			{
				alert('密码输入不正确');
				return false;
			}
			if(rp == '-1')
			{
				alert('密码必须填写');
				return false;
			}
			if(rp == '-2')
			{
				alert('用户账必填');
				return false;
			}
			if(rp == '-3')
			{
				alert('用户账号不存在');
				return false;
			}
			if(rp == '-4')
			{
				alert('用户账号未激活');
				return false;
			}
			if(rp == '-5')
			{
				alert('该用户锁定，请联系管理员');
				return false;
			}
			if(rp == '-6')
			{
				alert('用户账号未激活');
				return false;
			}
			window.location.href='/admin/main';
		}
	})
}
