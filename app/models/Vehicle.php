<?php

use SleepingOwl\Models\SleepingOwlModel;

class Vehicle extends SleepingOwlModel {

    protected $table = "vehicles";
    protected $fillable = ['id_model', 'tipus', 'combustio', 'places', 'custom_marca', 'custom_model'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('tipus', 'asc');
    }

    public function getFullNameAttribute() {
    	return implode(' ', [$this->tipus, $this->model->marca->marca, $this->model->model]);
    }

    public function model() {
        return $this->belongsTo('Model', 'id_model');
    }

}
