<?php

use SleepingOwl\Models\SleepingOwlModel;

class VehiclesUsuari extends SleepingOwlModel{
    protected $table = "VehiclesUsuaris";
	protected $fillable = ['id_vehicles', 'id_usuaris', 'matricula'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}

	public function vehicle() {
		return $this->belongsTo('Vehicle', 'id_vehicles');
	}

}