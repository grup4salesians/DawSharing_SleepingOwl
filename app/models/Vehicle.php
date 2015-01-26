<?php

use SleepingOwl\Models\SleepingOwlModel;

class Vehicle extends SleepingOwlModel{
        protected $table = "vehicles";
	protected $fillable = ['vehicles'];

	public function scopeDefaultSort($query){
		return $query->orderBy('tipus', 'asc');
	}

}

