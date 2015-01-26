<?php

use SleepingOwl\Models\SleepingOwlModel;

class Caracteristiques extends SleepingOwlModel{
        protected $table = "caracteristiques";
	protected $fillable = ['caracteristiques'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('permisosViatges', 'asc');
	}

}