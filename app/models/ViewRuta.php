<?php

use SleepingOwl\Models\SleepingOwlModel;

class Ruta extends SleepingOwlModel{
        protected $table = "rutas";
	protected $fillable = ['inici_ruta', 'fi_ruta', 'km'];
        

        public function scopeDefaultSort($query){
		return $query->orderBy('inici_ruta', 'asc');
	}

	public static function getList() {
        return static::lists('NomRuta', 'id');
    }
}
