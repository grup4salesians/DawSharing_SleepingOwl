<?php

use SleepingOwl\Models\SleepingOwlModel;

class Marca extends SleepingOwlModel{
        protected $table = "marcas";
	protected $fillable = ['marca'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('marca', 'asc');
	}
	public static function getList(){
		return static::lists('Marca', 'id');
	}

}