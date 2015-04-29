<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('namespace' => 'Backend\Admin'), function(){
	#~IndexController
	Route::get('admin/main', 'IndexController@index');
	Route::get('admin/main/info', 'IndexController@info');
	Route::get('admin/main/clean_cache', 'IndexController@clean_cache');
	#~UserController
	Route::get('admin/user', 'UserController@index');
	Route::get('admin/user/user_conf', 'UserController@user_list');			//用户列表
	Route::post('admin/user/create_user', 'UserController@create_user');	//创建用户
	Route::post('admin/user/update_user', 'UserController@update_user');	//更新用户信息
	Route::get('admin/user/del_user/{id}', 'UserController@del_user');		//删除用户
	Route::get('admin/user/permission', 'UserController@permission');
	Route::get('admin/user/savePermission', 'UserController@savePermission');


	###
	
	Route::get('admin/user/user_form/{id?}', 'UserController@user_form'); //artdialog 对话框, id为可选参数
	Route::get('admin/user/add_user', 'UserController@add_user');		//添加用户
	
	Route::get('admin/user/user_profile', 'UserController@user_profile'); 	//查询用户信息
	Route::get('admin/user/user_restore', 'UserController@user_restore');	//恢复被软删除的用户
	Route::get('admin/user/user_list', 'UserController@user_list');		//用户列表
	Route::get('admin/logout', 'UserController@logout');			//退出
	Route::match(array('GET','POST'), 'admin/login', 'UserController@login');				//登录
	Route::post('admin/user/pass_reset', 'UserController@password_reset'); //重新设置密码
	Route::get('admin/user/password', 'UserController@password');

	Route::get('admin/user/assign_user_new_group', 'UserController@assign_new_group_to_user');	//给用户从新分配组
	Route::get('admin/user/remove_user_group', 'UserController@remove_user_group'); 	//移除用户组权限
	Route::get('admin/user/find_users', 'UserController@find_users'); 			//通过权限查找所有用户
	Route::get('admin/user/find_user_by_group', 'UserController@find_user_by_group'); 	//通过组查找素有用户
	Route::get('admin/user/get_user_group', 'UserController@get_user_group');		//获取用户组
	Route::get('admin/user/get_merge_permissions', 'UserController@get_merge_permissions');	//获取用户权限
	Route::get('admin/user/has_access', 'UserController@has_access'); 		//查看用户是否有权限
	Route::get('admin/user/user_active', 'UserController@user_active'); 	//用户激活



	Route::get('admin/user/user_group', 'UserController@user_group');
	Route::get('admin/user/create_user_group', 'UserController@create_user_group');
	Route::get('admin/user/update_user_group', 'UserController@update_user_group');
	Route::get('admin/user/get_permissions', 'UserController@get_permissions');

	#~SysController
	Route::get('admin/sys', 'SysController@index');
	Route::get('admin/sys/menu_list', 'SysController@menu_list');
	Route::get('admin/sys/add_menu_form/{id?}', 'SysController@add_menu_form');
	Route::get('admin/sys/save_menu_form', 'SysController@save_menu_form');
	Route::get('admin/sys/del_menu_item/{id}', 'SysController@del_menu_item');
	Route::get('admin/sys/edit_menu', 'SysController@edit_menu');

	Route::get('admin/sys/site', 'SysController@site');
	Route::get('admin/sys/footer_conf', 'SysController@footer_conf');
	Route::get('admin/sys/footer_msg_conf', 'SysController@footer_msg_conf');
});

Route::get('/', 'IndexController@index');
