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
        return $this->belongsTo('Ruta', 'ruta_id');
    }

    public function usuaris() {
        return $this->belongsTo('Usuari', 'usuaris_id');
    }
    
    public function vehicles() {
        return $this->belongsTo('Vehicle', 'vehicles_id');
    }
    
    public function periodicitat() {
        return $this->belongsTo('Periodicitat', 'periodicitat_id');
    }
    
    public function passatgers(){
        return $this->hasMany('Passatger');
    }
}
