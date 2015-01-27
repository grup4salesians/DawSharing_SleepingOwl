<?php

use SleepingOwl\Models\SleepingOwlModel;

class Model extends SleepingOwlModel {

    protected $table = "models";
    protected $fillable = [ 'id_marca', 'model'];
    protected $hidden = ['id','created_at', 'updated_at'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('id', 'asc');
    }

    public function marca() {
        return $this->belongsTo('Marca', 'id_marca');
    }

}
