<?php 
class Menu_catelogueTableSeeder extends Seeder {

	public function run()
	{
		Menu_catelogue::create(array(
			'name'	=> '首页',
			'root'	=> 0,
			'sort'	=> 1,
			'path'	=> '/admin',
			));
		Menu_catelogue::create(array(
			'name'	=> '用户',
			'root'	=> 0,
			'sort'	=> 1,
			'path'	=> '/admin/sys',
			));
		Menu_catelogue::create(array(
			'name'	=> '系统',
			'root'	=> 0,
			'sort'	=> 1,
			'path'	=> '/admin/user',
			));
		Menu_catelogue::create(array(
			'name'	=> '基本信息',
			'root'	=> 1,
			'sort'	=> 1,
			'path'	=> '/admin',
			));
		Menu_catelogue::create(array(
			'name'	=> '清除缓存',
			'root'	=> 1,
			'sort'	=> 1,
			'path'	=> '/admin',
			));
		Menu_catelogue::create(array(
			'name'	=> '用户管理',
			'root'	=> 2,
			'sort'	=> 1,
			'path'	=> '/admin',
			));
		Menu_catelogue::create(array(
			'name'	=> '用户组管理',
			'root'	=> 2,
			'sort'	=> 1,
			'path'	=> '/admin',
			));
		Menu_catelogue::create(array(
			'name'	=> '修改密码',
			'root'	=> 2,
			'sort'	=> 1,
			'path'	=> '/admin',
			));
		Menu_catelogue::create(array(
			'name'	=> '菜单配置',
			'root'	=> 3,
			'sort'	=> 1,
			'path'	=> '/admin',
			));
	}
}
