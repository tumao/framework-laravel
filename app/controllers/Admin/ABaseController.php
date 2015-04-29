<?php
namespace Backend\Admin;

/*后台的所有方法继承此基础方法*/
abstract class ABaseController extends \Controller {

	/**
	 * 构造方法
	 * @param 
	 *
	 * @return 
	 */
	public function __construct()
	{
		$this->_check_user_is_login();
		$this->_do_system_page_init();
	}

	/**
	 * Blade模板
	 * @param 
	 *
	 * @return
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = \View::make($this->layout);
		}
	}

	/**
	 * 验证用户是否登录
	 * @param
	 *
	 * @return true
	 */
	private function _check_user_is_login()
	{
		if(\Sentry::check())
		{
			return true;
		}
		if($_SERVER['REQUEST_URI'] != '/admin/login')
		{
			header('location:/admin/login');
		}
	}

	/**
	 * 初始化页面
	 * @param 
	 *
	 * @return
	 */
	private function _do_system_page_init()
	{
		if( !\Cache::has('menu'))		//查看缓存
		{
			$menu = \Menu_catelogue::all();		//从数据库中输出所有菜单项
			$menu = serialize( $menu);			
			\Cache::forever('menu', $menu);		//将菜单存入缓存
		}
		
		$list = unserialize(\Cache::get('menu'));
		$menu = $this->_find_main_menu($list);
		\View::share('menu', $menu);			//将数据分享到视图

	} 

	/**
	 * 查找主菜单
	 * @param list 所有菜单项
	 *
	 * @return menu 包括 main_menu,sub_menu
	 */
	private function _find_main_menu($list)
	{
		$main_menu = array();
		$sub_menu = array();
		foreach ($list as $x)
		{
			if( $x->root == 0)
			{
				$item['name'] = $x->name;
				$item['icon'] = $x->icon;
				$item['path'] = $x->path;
				if($this->_find_uri_curr($x->path))
				{
					$item['active'] = true;
					// $sub_menu =  $this->_find_sub_menu($list, $x->id);
					$sub_menu = $this->_init_menu_tree($list, $x->id);
				}
				else
				{
					$item['active'] = false;
				}
				array_push($main_menu, $item);
			}
		}
		$menu['main_menu'] = $main_menu;
		$menu['sub_menu'] = $sub_menu;
		return $menu;
	}
	/**
	*	生成菜单树
	*
	*
	**/
	protected function _init_menu_tree($list, $rid)
	{
		$child = $this->find_child_menu($list, $rid);
		if(empty( $child))
		{
			return NULL;
		}
		foreach($child as $k=>$v)
		{
			$res = $this->_init_menu_tree($list, $v['id']);
			if($res != NULL)
			{
				$child[$k]['children'] = $res;
			}
		}
		return $child;

	}

	private function find_child_menu($arr, $rid)
	{
		$child = array();
		foreach($arr as & $x)
		{
			if($x['root'] == $rid)
			{
				$child[] = $x;
				if($this->_find_uri_curr($x->path))
				{
					$x['active'] = true;
				}
				else
				{
					$x['active'] = false;
				}
			}
		}
		return $child;
	}

	/**
	 * 查看次单项是否为选中状态
	 * @param uri 
	 *
	 * @return true|false
	 */
	private function _find_uri_curr($uri)
	{
		$uriformat = preg_replace('/(\/)+/iu', '/', $_SERVER['REQUEST_URI'].'/');
		$uri	= preg_replace('/(\/)+/iu', '/', $uri.'/');
		return strstr($uriformat, $uri) !== false;
	}
	
}
