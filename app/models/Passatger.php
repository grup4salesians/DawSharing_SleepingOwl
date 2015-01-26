<?php

use SleepingOwl\Models\SleepingOwlModel;

class Passatger extends SleepingOwlModel{
        protected $table = "passatger";
	

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}

}

