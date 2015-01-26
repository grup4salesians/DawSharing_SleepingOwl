<?php

use SleepingOwl\Models\SleepingOwlModel;

class Viatge extends SleepingOwlModel{
    protected $table = "viatges";
	protected $fillable = ['viatges'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}

}