<?php

use SleepingOwl\Models\SleepingOwlModel;

class Passatger extends SleepingOwlModel {

    protected $table = "passatgers";
    
    public function scopeDefaultSort($query) {
        return $query->orderBy('id', 'asc');
    }

    public function viatge() {
        return $this->belongsTo('Viatge', 'id_viatge');
    }

    public function usuari() {
        return $this->belongsTo('Usuari', 'id_usuari');
    }

}
