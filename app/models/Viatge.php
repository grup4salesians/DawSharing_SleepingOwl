<?php

use SleepingOwl\Models\SleepingOwlModel;

//// Usa la vista de viatges en vez de la tabla
class Viatge extends SleepingOwlModel {

    protected $table = "ViewViatges";
    protected $fillable = ['preu', 'numSeientDisponible', 'numSeientRestant', 'duracio', 'permissos', 'data'];
    protected $hidden = ['created_at', 'updated_at'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('id', 'asc');
    }

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
