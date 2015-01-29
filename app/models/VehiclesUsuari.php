<?php

use SleepingOwl\Models\SleepingOwlModel;

class VehiclesUsuari extends SleepingOwlModel{
	protected $table = "VehiclesUsuaris";
	protected $fillable = ['vehicles_id', 'usuaris_id', 'matricula'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}

	public function vehicle() {
		return $this->belongsTo('Vehicle', 'vehicles_id');
	}

	public function usuari() {
		return $this->belongsTo('Usuari', 'usuaris_id');
	}

}