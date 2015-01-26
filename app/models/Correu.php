<?php

use SleepingOwl\Models\SleepingOwlModel;

class Correu extends SleepingOwlModel{
        protected $table = "correus";
	protected $fillable = ['correus'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('contingut', 'asc');
	}

}