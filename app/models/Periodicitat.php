<?php

use SleepingOwl\Models\SleepingOwlModel;

class Periodicitat extends SleepingOwlModel{
    protected $table = "periodicitats";
	protected $fillable = ['data_limit', 'dies'];

	public function scopeDefaultSort($query){
		return $query->orderBy('data_limit', 'asc');
	}

}

