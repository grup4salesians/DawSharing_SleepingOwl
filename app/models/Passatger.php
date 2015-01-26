<?php

use SleepingOwl\Models\SleepingOwlModel;

class Passatger extends SleepingOwlModel{
        protected $table = "passatger";
	protected $fillable = ['passatger'];

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}

}

