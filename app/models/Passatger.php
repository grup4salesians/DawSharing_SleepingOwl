<?php

use SleepingOwl\Models\SleepingOwlModel;

class Passatger extends SleepingOwlModel{
        protected $table = "passatgers";
	

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}

}

