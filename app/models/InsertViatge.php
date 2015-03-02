<?php

use SleepingOwl\Models\SleepingOwlModel;

//// Usa la vista de viatges en vez de la tabla
class InsertViatge extends SleepingOwlModel {

    protected $table = "viatges";
    protected $fillable = ['id_ruta','id_usuari','id_vehicle','id_periodicitat','preu', 'numSeientDisponible', 'numSeientRestant', 'duracio', 'permissos', 'data'];
    protected $hidden = ['created_at', 'updated_at'];



    public function ruta() {
        return $this->belongsTo('Ruta', 'ruta_id');
    }

    public function usuari() {
        return $this->belongsTo('Usuari', 'usuari_id');
    }

    public function vehicles() {
        return $this->belongsTo('Vehicle', 'vehicles_id');
    }

    public function periodicitat() {
        return $this->belongsTo('Periodicitat', 'periodicitat_id');
    }

    public function passatgers() {
        return $this->hasMany('Passatger');
    }

    public function getDates() {
        return array_merge(parent::getDates(), ['data_limit','data']);
    }
}
