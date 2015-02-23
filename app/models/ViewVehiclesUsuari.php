<?php

use SleepingOwl\Models\SleepingOwlModel;

class ViewVehiclesUsuari extends SleepingOwlModel  {

    protected $table = "viewvehiclesusuaris";
    protected $fillable = ['vehicles_id', 'usuari_id', 'matricula', 'vehicle', 'usuari'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('usuaris_id', 'asc');
    }

    public static function getList() {
        return static::lists('vehicle', 'id');
    }
}
