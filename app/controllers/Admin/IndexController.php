<?php
namespace Backend\Admin;

class IndexController extends ABaseController {

	protected $layout = 'main';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// $this->layout->content = \View::make('index.index');
		header('location:/admin/main/info');
	}

	public function info()
	{
		//
		$this->layout->content = \View::make('index.index');
	}
	public function clean_cache()
	{
		$r = \Cache::flush();
		$this->layout->content = \View::make('index.clean_cache');
	}


}
