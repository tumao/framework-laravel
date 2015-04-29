<?php 
class Sys_config extends Eloquent
{
	// table name
	protected $table = 'sys_config';

	//
	protected $hidden = array();

	//such column can be filled 
	protected $fillable = array('name', 'value');

	//do not auto insert update_at
	public $timestamps = false;

}