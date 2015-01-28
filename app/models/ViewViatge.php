<?php

use SleepingOwl\Models\SleepingOwlModel;

class ViewViatge extends SleepingOwlModel {
    protected $table = "viewviatges";
    protected $fillable = ['preu', 'numSeientDisponible', 'numSeientRestant', 'duracio', 'permissos', 'data', 'dies', 'data_limit'];
    protected $hidden = ['created_at', 'updated_at'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('id', 'asc');
    }
    
    public function ruta() {
        return $this->belongsTo('Ruta', 'id_ruta');
    }

    public function usuari() {
        return $this->belongsTo('Usuari', 'id_usuari');
    }
    
    public function vehicles() {
        return $this->belongsTo('Vehicle', 'id_vehicle');
    }
    
    public function periodicitat() {
        return $this->belongsTo('Periodicitat', 'id_periodicitat');
    }
}