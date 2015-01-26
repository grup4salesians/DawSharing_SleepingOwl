<?php

use SleepingOwl\Models\SleepingOwlModel;

class Model extends SleepingOwlModel{
        protected $table = "models";
	protected $fillable = ['models'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}

}