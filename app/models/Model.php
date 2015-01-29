<?php

use SleepingOwl\Models\SleepingOwlModel;

class Model extends SleepingOwlModel {

    protected $table = "models";
    protected $fillable = [ 'marca_id', 'model'];
    protected $hidden = ['id','created_at', 'updated_at'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('id', 'asc');
    }

    public static function getList() {
        return static::lists('model', 'id');
    }

    public function marca() {
        return $this->belongsTo('Marca', 'marca_id');
    }

}
