<?php

use SleepingOwl\Models\SleepingOwlModel;

class ViewRuta extends SleepingOwlModel{
    protected $table = "viewrutas";
	protected $fillable = ['inici_ruta', 'fi_ruta', 'km'];
        

    public function scopeDefaultSort($query){
		return $query->orderBy('inici_ruta', 'asc');
	}

	public static function getList() {
        return static::lists('NomRuta', 'id');
    }
}
