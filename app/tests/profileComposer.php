<?php 
	class profileComposer
	{
		public function compose($view)
		{
			$view->with('count', User::count());
		}
	}
 ?>