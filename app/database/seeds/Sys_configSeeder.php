<?php 
class Sys_configSeeder extends Seeder
{
	public function run()
	{
		// Sys_config::create(array('name' => 'footer', 'value' => '这是也叫配置信息'));
		Sys_config::create(array('name' => 'footer_left', 'value' => '这是左侧页脚配置信息'));
		Sys_config::create(array('name' => 'footer_right', 'value' => '这是右侧页脚配置信息'));
	}
}