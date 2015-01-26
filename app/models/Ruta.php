<?php

use SleepingOwl\Models\SleepingOwlModel;

class Ruta extends SleepingOwlModel{
        protected $table = "ruta";
	protected $fillable = ['inici_ruta', 'fi_ruta', 'km'];
        protected $hidden = [];

        public function scopeDefaultSort($query){
		return $query->orderBy('inici_ruta', 'asc');
	}

}


