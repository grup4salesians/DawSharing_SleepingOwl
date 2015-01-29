<?php

use SleepingOwl\Models\SleepingOwlModel;

class Passatger extends SleepingOwlModel {

    protected $table = "passatgers";
    protected $fillable = ['viatge_id', 'usuari_id'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('id', 'asc');
    }

    public function viatge() {
        return $this->belongsTo('Viatge', 'viatge_id');
    }

    public function usuari() {
        return $this->belongsTo('Usuari','usuari_id');
    }
 
}
