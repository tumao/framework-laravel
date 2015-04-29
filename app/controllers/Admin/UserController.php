<?php
namespace Backend\Admin;

class UserController extends ABaseController
{
	protected $layout = 'main';

	public function index()
	{
		header('location:/admin/user/user_conf');
	}

	public function user_conf()
	{
		$this->layout->content = \View::make('user.user');
	}
	

	/**
	 * 检验密码是否正确,并且登录
	 *
	 * @param name,  password, remember(记住密码)
	 *
	 * @return 1 密码正确 0 密码不正确
	 */
	private  function _user_pass_check($name, $password, $remember = FALSE)
	{
		try
		{
			$credit = array(
					'name'		=> $name,
					'password'	=> $password
				);
			if( !$remember)
			{
				$user = \Sentry::authenticate( $credit, false);		//登录
			}
			else
			{
				$user = \Sentry::authenticateAndRemember($credit);		//登录并记住密码
			}
			return $user;
		}
		catch(\Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return -2;		//login field is required
		}
		catch(\Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return -1; 		//password is required
		}
		catch(\Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return 0; 		//password is wrong
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return -3;			//'User was not found.';
		}
		catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return -4;			//'User is not activated.';
		}

		// The following is only required if the throttling is enabled
		catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    return -5; 			//'User is suspended.';
		}
		catch (\Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    return -6; 		// 'User is banned.';
		}
	}
	/**
	 * 登录
	 *
	 * @param name,  password
	 *
	 * @return 
	 */
	public function login()
	{
		if(\Sentry::check())
		{
			return \Redirect::to('admin/main/info');
		}
		if(\Request::isMethod('post'))
		{
			$input = \Input::only('username', 'password', 'remember');
			$callback = $this->_user_pass_check($input['username'], $input['password'], $input['remember']);	//成功登录前的信息确认
			return $callback;	//返回信息验证结果
		}
		$this->layout->content = \View::make('user.login');
	}

	/**
	 * 登出
	 *
	 * @param 
	 *
	 * @return 
	 */
	public function logout()
	{
		\Session::flush();	//清除session
		if( \Sentry::check())
		{
			\Sentry::logout();
		}
		if($_SERVER['REQUEST_URI'] != '/admin/login')
		{
			return \Redirect::to('admin/login');	
		}
	}

	public function password()
	{
		$this->layout->content = \View::make('user.password_reset');
	}

	/**
	 * 重设密码
	 *
	 * @param password, $name
	 *
	 * @return 
	 */
	public function password_reset()
	{
		if(\Request::isMethod('post'))
		{
			$input = \Input::only('id','password');
		}
		$user = \Sentry::findUserById($input['id']);
		$user->password = $input['password'];
		$user->save();
		// if(\Auth::check())
		// {
		// 	if( !$name)
		// 	{
		// 		$name = \Auth::user()->name;
		// 	}
		// 	$user = \User::where('name', '=', $name)->first();
		// 	$user->password = \Hash::make($password);
		// 	$user->save();
		// }
	}

	/**
	 * 用户账号激活
	 *
	 * @param active_code 激活码应该和注册时生成的一样
	 *
	 * @return 
	 */
	// public function user_active()
	// {
	// 	$id = 1;
	// 	try
	// 	{
	// 		$user = \Sentry::findUserById($id);
	// 	   	if ($user->attemptActivation('123456'))
	// 	    {
	// 	        // User activation passed
	// 	        echo 1;

	// 	    }
	// 	    else
	// 	    {
	// 	        // User activation failed
	// 	        echo 2;
	// 	    }
	// 	}
	// 	catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
	// 	{
	// 	    return 0; 	//'User was not found.';
	// 	}
	// 	catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
	// 	{
	// 	    return -1; 	//'User is already activated.';
	// 	}
	// }

	public function user_group()
	{
		$groups = \Groups::all();
		$this->layout->content = \View::make('user.user_group')->with('groups', $groups);
	}

	/**
	 * 创建用户组
	 *
	 * @param active_code 激活码应该和注册时生成的一样
	 *
	 * @return 
	 */
	// public function create_user_group()
	// {
	// 	try
	// 	{
	// 	    // Create the group
	// 	    $group = \Sentry::createGroup(array(
	// 	        'name'        => 'User',
	// 	        'permissions' => array(
	// 	            'user.create' => 0,
	// 	            'user.delete' => 0,
	// 	            'user.view'	  => 0,
	// 	            'user.update' => 0
	// 	        ),
	// 	    ));
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\NameRequiredException $e)
	// 	{
	// 	    echo 'Name field is required';
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\GroupExistsException $e)
	// 	{
	// 	    echo 'Group already exists';
	// 	}
	// }

	// /**
	//  * 更新用户组
	//  *
	//  * @param active_code 激活码应该和注册时生成的一样
	//  *
	//  * @return 
	//  */
	// public function update_user_group()
	// {
	// 	try
	// 	{
	// 	    // Find the group using the group id
	// 	    $group = \Sentry::findGroupById(3);

	// 	    // Update the group details
	// 	    $group->name = 'Users';
	// 	    $group->permissions = array(
	// 	        'user.create' => 0,
	//             'user.delete' => 0,
	//             'user.view'	  => 1,
	//             'user.update' => 0
	// 	    );

	// 	    // Update the group
	// 	    if ($group->save())
	// 	    {
	// 	        // Group information was updated
	// 	    }
	// 	    else
	// 	    {
	// 	        // Group information was not updated
	// 	    }
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\NameRequiredException $e)
	// 	{
	// 	    echo 'Name field is required';
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\GroupExistsException $e)
	// 	{
	// 	    echo 'Group already exists.';
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
	// 	{
	// 	    echo 'Group was not found.';
	// 	}
	// }
	/**
	 * 删除用户组
	 *
	 * @param id
	 *
	 * @return 
	 */
	// public function del_user_group()
	// {
	// 	try
	// 	{
	// 	    // Find the group using the group id
	// 	    $group = Sentry::findGroupById(1);

	// 	    // Delete the group
	// 	    $group->delete();
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
	// 	{
	// 	    echo 'Group was not found.';
	// 	}
	// }

	// /**
	//  * 用户组列表
	//  *
	//  * @param 
	//  *
	//  * @return 
	//  */
	// public function find_all_group()
	// {
	// 	$groups = Sentry::findAllGroups();
	// 	return $groups;
	// }

	/**
	 * 通过id查找用户组
	 *
	 * @param id
	 *
	 * @return 
	 */
	// public function find_group_by_id()
	// {
	// 	try
	// 	{
	// 	    $group = Sentry::findGroupById(1);
	// 	    return $group;
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
	// 	{
	// 	    echo 'Group was not found.';
	// 	}
	// }

	/**
	 * 通过name查找用户组
	 *
	 * @param group_name
	 *
	 * @return 
	 */
	// public function find_group_by_name()
	// {
	// 	$group_name = 'Admin';
	// 	try
	// 	{
	// 	    $group = Sentry::findGroupByName($group_name);
	// 	    return $group;
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
	// 	{
	// 	    echo 'Group was not found.';
	// 	}
	// }

	/**
	 * 获取权限
	 *
	 * @param 
	 *
	 * @return 
	 */
	// public function get_permissions()
	// {
	// 	$id = 1;
	// 	try
	// 	{
	// 	    // Find the group using the group id
	// 	    $group = \Sentry::findGroupById($id);

	// 	    // Get the group permissions
	// 	    $groupPermissions = $group->getPermissions();
	// 	    return $groupPermissions;
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
	// 	{
	// 	    echo 'Group does not exist.';
	// 	}
	// }


	/**
	 * 用户列表
	 *
	 * @param user_id, 用户id
	 *
	 * @return 
	 */
	public function user_list()
	{
		$all_users = \Sentry::findAllUsers();
		foreach ($all_users as & $user) 
		{

			$group_arr = array();
			$x = \Sentry::findUserById($user['id']);
			$groups = $x->getGroups();
			foreach($groups as $group)
			{
				array_push($group_arr, $group['name']);
			}
			$user['group'] = implode(',', $group_arr);
		}
		$this->layout->content = \View::make('user.user_list')->with('users', $all_users);
	}
	/**
	 * 添加、修改 用户信息页面(当id为空时，则添加，id非空时为修改数据)
	 * @param id（可选参数） 用户id
	 *
	 * @return TRUE 删除成功
	 * @return FALSE 删除失败
	 */
	public function user_form($id = '')
	{
		$groups = \Sentry::findAllGroups();
		$user = array(
			'id'	=> '',
			'name'	=> '',
			'email'	=> '',
			'real_name' => ''
			);
		if( $id != '')
		{
			$user = \Sentry::findUserById($id);
			$group = $user->getGroups();
		}
		foreach($groups as & $x)
		{
			if( $id != '' && $x['name'] == $group[0]['name'])	//如果是修改页面则设置分组
			{
				$x['checked'] = true;
			}
			else if( $id == '' && $x['name'] == 'Users')	//如果是添加页面则设置默认分组为users
			{
				$x['checked'] = true;
			}
			else
			{
				$x['checked'] = false;
			}
		}
		$data = array(
			'user'	=> $user,
			'group'	=> $groups
			);
		return \View::make('user.user_list.user_form')->with('data', $data);
	}
	/**
	 * 创建一个用户
	 *
	 * @param 
	 *
	 * @return 
	 */
	public function create_user()
	{
		if(\Request::isMethod('post'))
		{
			$user = \Input::all();
		}
		$rp = array();
		try
		{
		    // Create the user
		    $user_info = \Sentry::createUser(array(
		    	'name'		=> $user['username'],
		    	'real_name'	=> $user['real_name'],
		        'email'     => $user['email'],
		        'password'  => $user['password'],
		        'activated' => true,
		    ));

		    $group = \Sentry::findGroupByName($user['groupName']);	//通过组名查找组

		    $user_info->addGroup($group);			//把用户加入组中
		    return array('code' => 1, 'info' => '用户创建成功');
		}
		catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return array('code' => -1, 'info'=> '用户名不可为空');
		}
		catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return array('code' => -2, 'info'=> '密码不可为空');
		}
		catch (\Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    return array('code' => -3, 'info'=> '用户名已经存在，请直接登录');
		}
		catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    return array('code' => -4, 'info'=> '未找到分组');
		}
	}

	/**
	 * 更新用户信息
	 *
	 * @param 
	 *
	 * @return 
	 */
	public function update_user()
	{
		if(\Request::isMethod('post'))
		{
			$user = \Input::all();
		}
		try
		{
		    $user_info = \Sentry::findUserById($user['id']);		//通过id查找用户

		    // 更新用户信息
		    $user_info->name = $user['username'];
		    $user_info->email = $user['email'];
		    $user_info->real_name = $user['real_name'];
		    $this->assign_group_to_user($user['id'],array($user['groupName']));
		    if ($user_info->save())									//保存修改
		    {
		        return array('code'	=>1, 'info' => '数据修改成功');
		    }
		    else
		    {
		        // User information was not updated
		        return array('code' => 0, 'info' => '数据保存失败，请联系管理员！');
		    }
		}
		catch (\Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    return array('code' => -1, 'info' => '用户名已经存在');
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return array('code' => -2, 'info' => '未找到要修改的用户');
		}
	}



	/**
	 * 给用户重新分配组
	 *
	 * @param $user_id, (array)$group = array('group1','group2')
	 *
	 * @return 
	 */

	private function assign_group_to_user($user_id, $group)
	{
		try
		{
		    // Find the user using the user id
		    $user = \Sentry::findUserById($user_id);

		    $old_groups = $user->getGroups();		//用户原有的组
		    foreach( $old_groups as $old_group)			//删除用户原有的所有组
		    {
		    	$x = \Sentry::findGroupById($old_group['id']);
		    	$user->removeGroup($x);
		    }
		    foreach($group as $gName)				//给用户分配新的组
		    {
		    	$x = \Sentry::findGroupByName($gName);
		    	$user->addGroup($x);
		    }
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
		catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    echo 'Group was not found.';
		}
	}

	/**
	 * 删除用户
	 * @param user_id 用户id
	 *
	 * @return TRUE 删除成功
	 * @return FALSE 删除失败
	 */
	public function del_user($id)
	{
		try
		{
			$cur_user =  \Sentry::getUser();
			if( $cur_user->hasAccess('user.delete'))
			{
				$user = \Sentry::findUserById($id);	// 通过id查找用户
		    	$user->delete();	// 删除用户
		    	return array('code' => 1, 'info'=> '删除成功');
			}
			else
			{
				return array('code' => -1,'info'=> '当前用户无权限删除用户!');
			}
		    
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return array('code' => -2, 'info' => '用户不存在');	//用户不存在 （用户不存在或者被软删除）
		}
		
	}

	// /**
	//  * 删除用户组权限
	//  *
	//  * @param 
	//  *
	//  * @return 
	//  */
	// public function remove_user_group()
	// {
	// 	try
	// 	{
	// 	    // Find the user using the user id
	// 	    $user = \Sentry::findUserById(1);

	// 	    // Find the group using the group id
	// 	    $adminGroup = \Sentry::findGroupById(1);

	// 	    // Assign the group to the user
	// 	    if ($user->removeGroup($adminGroup))
	// 	    {
	// 	        // Group removed successfully
	// 	        return 1;
	// 	    }
	// 	    else
	// 	    {
	// 	        // Group was not removed
	// 	        return 0;
	// 	    }
	// 	}
	// 	catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
	// 	{
	// 	    echo 'User was not found.';
	// 	}
	// 	catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
	// 	{
	// 	    echo 'Group was not found.';
	// 	}
	// }
	// /**
	//  * 查找用户
	//  *
	//  * @param permission
	//  *
	//  * @return 
	//  */
	// public function find_users()
	// {
	// 	$permissions = array('user.view','user.delete','user.update');
	// 	$users = \Sentry::findAllUsersWithAccess($permissions);
	// 	return $users;
	// }

	// /**
	//  * 查找用户
	//  *
	//  * @param group
	//  *
	//  * @return 
	//  */

	// public function find_user_by_group()
	// {
	// 	$group_name = 'SupperAdmin';
	// 	$group = \Sentry::findGroupByName($group_name);
	// 	$users = \Sentry::findAllUsersInGroup( $group);
	// 	return $users;
	// }

	// public function get_user_group()
	// {
	// 	$id = 1;
	// 	try
	// 	{
	// 	    $user = \Sentry::findUserByID(1);	//通过id查找用户
	// 	    $groups = $user->getGroups();	//查看用户组
	// 	    return $groups;
	// 	}
	// 	catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
	// 	{
	// 	    echo 'User was not found.';
	// 	}
	// }

	// public function get_merge_permissions()
	// {
	// 	$id = 2;
	// 	try
	// 	{
	// 	    $user = \Sentry::getUserProvider()->findById($id);
	// 	    $permissions = $user->getMergedPermissions();	//获取用户权限
	// 	    return $permissions;
	// 	}
	// 	catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
	// 	{
	// 	    echo 'User was not found.';
	// 	}
	// }

	// public function has_access()
	// {
	// 	$id = 1;
	// 	$permission = 'user.create';
	// 	try
	// 	{
	// 	    // Find the user using the user id
	// 	    $user = \Sentry::findUserByID($id);

	// 	    // Check if the user has the 'admin' permission. Also,
	// 	    // multiple permissions may be used by passing an array
	// 	    if ($user->hasAccess($permission))
	// 	    {
	// 	        // User has access to the given permission
	// 	        return 1;
	// 	    }
	// 	    else
	// 	    {
	// 	        // User does not have access to the given permission
	// 	        return 0;
	// 	    }
	// 	}
	// 	catch (\Cartalyst\Sentry\UserNotFoundException $e)
	// 	{
	// 	    echo 'User was not found.';
	// 	}
	// }

	public function permission()
	{
		$permissions = \Permissions::all();
		$this->layout->content = \View::make('user.permission')->with('perm', $permissions);
	}
	public function savePermission()
	{
		$valid = array('code', 'name');
		$input = \Input::only($valid);
		if($input['code']=='' || $input['name'] == '')
		{
			return array('message'=> '*为必填项目', 'code'=> -1);
		}
		$permission =  \DB::table('permissions')->insert($input);
		// $permission = \Permissions::create($input);
		if($permission)
		{
			return array('message'=>'保存成功!', 'code'=> -1);
		}
		return array('message'=>'保存失败!', 'code'=>-1);
	}

}	