<?php

use SleepingOwl\Models\SleepingOwlModel;

class Vehicle extends SleepingOwlModel {

    protected $table = "vehicles";
    protected $fillable = ['model_id', 'tipus', 'combustio', 'places', 'custom_marca', 'custom_model'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('tipus', 'asc');
    }

    public function getFullNameAttribute() {
    	return implode(' ', [$this->tipus, $this->model->marca->marca, $this->model->model]);
    }

    public static function getList() {
        return static::lists('id', 'id');
    }

    public function model() {
        return $this->belongsTo('Model', 'model_id');
    }

}
