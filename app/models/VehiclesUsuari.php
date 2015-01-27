<?php

use SleepingOwl\Models\SleepingOwlModel;

class VehiclesUsuari extends SleepingOwlModel{
    protected $table = "VehiclesUsuaris";
	protected $fillable = ['id_vehicle', 'id_usuaris', 'matricula'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}

}