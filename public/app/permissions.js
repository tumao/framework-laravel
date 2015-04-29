var Permission = {
	form : function(){
		var content = '权限代码：<input id="permissionCode" type="text"><br/><br/>';
		content  = content + '权限名称：<input id="permissionName" type="text">';
		art.dialog({
			title : '添加权限',
			content :　content,
			ok : function(){
				var code = document.getElementById('permissionCode').value;
				var name = document.getElementById('permissionName').value;
				$.ajax({
					url 	: '/admin/user/savePermission',
					type	: 'GET',
					dataType: 'json',
					data 	: {code:code,name:name},
					success : function(rp){
						art.dialog.tips(rp.message, 2);
						location.reload();
					}
				});
				return true;
			},
			cancel  : true,
			drag 	: false,
			resize	: false,
			lock	: true

		})
	},
};