<?php

use SleepingOwl\Models\SleepingOwlModel;

class Vehicle extends SleepingOwlModel{
        protected $table = "vehicles";
	protected $fillable = ['tipus', 'combustio', 'places', 'custom_marca', 'custom_model'];
        

	public function scopeDefaultSort($query){
		return $query->orderBy('tipus', 'asc');
	}

}

