<?php
namespace Backend\Admin;

class SysController extends ABaseController {

	protected $layout = 'main';

	private $_menu_son_arr= array();
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		header('location:/admin/sys/menu_list');
	}

	public function menu_list()
	{
		$menuList = \Menu_catelogue::all();
		// $this->add_script('menu.js');
		$this->layout->content = \View::make('system.menu_list')->with('menuList', $menuList);
	}

	public function add_menu_form($id = '')
	{
		if($id !='')
		{
			$menu = \Menu_catelogue::find($id);	
		}
		else
		{
			$menu = array
				(
					'name'	=> '',
					'icon'	=> '',
					'sort'	=> '',
					'path'	=> ''
				);
		}
		
		return \View::make('system.menu_list.menu_form')->with('menu', $menu);
	}

	public function save_menu_form()
	{
		$vali = array('name', 'icon', 'path', 'root', 'sort');
		$menuArr = \Input::only($vali);
		if($menuArr['name'] == '')
		{
			return array('message'=> '菜单名不可以为空!', 'code' => -1);
		}
		elseif($menuArr['path'] == '')
		{
			return array('message'=> '路径不可以为空!', 'code' => -2);
		}
		$menu = \Menu_catelogue::create($menuArr);
		if($menu)
		{
			return array('message'=> '插入成功!', 'code'=>1);
		}
		return array('message'=>'插入失败!', 'code'=>-3);
	}

	public function edit_menu()
	{
		$vali = array('id','name', 'icon', 'path', 'sort');
		$menuArr = \Input::only($vali);
		$id = $menuArr['id'];
		unset($menuArr['id']);
		\DB::table('menu_catelogue')->where('id',$id)->update($menuArr);
		return array('message'=>'数据更新成功！', 'code'=>1);
	}

	public function del_menu_item($id='')
	{
		if($id == '')
		{
			return array('message'=>'缺少删除参数!', 'code' => -1);
		}
		$menu = \Menu_catelogue::all();
		$this->_init_son_arr($menu, $id);
		array_push($this->_menu_son_arr, $id);
		$affectRow = \Menu_catelogue::destroy($this->_menu_son_arr);
		if($affectRow)
		{
			return array('info' => $this->_menu_son_arr,'message'=>'删除成功!', 'code'=>1);	
		}
	}

	private function _init_son_arr($list, $rid)
	{
		$condition = array();
		$child = $this->_find_children($list, $rid);
		$condition[] = $child;
		if(empty($child))
		{
			return NULL;
		}
		foreach($child as $k => $v)
		{
			$res = $this->_init_son_arr($list, $v['id']);
			if($res != NULL)
			{
				array_push($condition, $res);
				// $condition[] = $res;
			}
		}
		return $condition;
	}

	private function _find_children($list, $rid)
	{
		$child = array();
		foreach($list as & $x)
		{
			if($x['root'] == $rid)
			{
				$child[] = $x;
				array_push($this->_menu_son_arr, $x['id']);
			}
		}

		return $child;
	}

	public function site()
	{
		$this->layout->content = \View::make('system.site');
	}

	public function footer_conf()
	{
		$this->layout->content = \View::make('system.footer_conf');
	}

	// public function footer_msg_conf()
	// {
	// 	$email = 'xiaoming@shabi.com';
	// 	$r = strstr($email, 'ming');
	// 	echo $r;
	// }
}
