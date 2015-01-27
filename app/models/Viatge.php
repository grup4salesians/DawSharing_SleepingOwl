<?php

use SleepingOwl\Models\SleepingOwlModel;

class Viatge extends SleepingOwlModel {
    protected $table = "viatges";
    protected $fillable = ['preu', 'numSeientDisponible', 'numSeientRestant', 'duracio', 'permissos', 'data'];
    protected $hidden = ['created_at', 'updated_at'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('id', 'asc');
    }
    
    public function ruta() {
        return $this->belongsTo('Ruta', 'id_ruta');
    }

    public function usuaris() {
        return $this->belongsTo('Usuaris', 'id_usuari');
    }
    
    public function vehicles() {
        return $this->belongsTo('Vehicles', 'id_vehicle');
    }
    
    public function periodicitat() {
        return $this->belongsTo('Periodicitat', 'id_periodicitat');
    }
}
