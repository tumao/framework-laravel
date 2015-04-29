<?php
class Cat extends Eloquent
{
	protected $table = 'cats';

	public function eat()
	{
		return 'eat it';
	}
}
