<?php

use SleepingOwl\Models\SleepingOwlModel;

class Administrator extends SleepingOwlModel{

	protected $fillable = ['administrators'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}
	public static function getName(){
		return static::lists('name', 'id');
	}

}