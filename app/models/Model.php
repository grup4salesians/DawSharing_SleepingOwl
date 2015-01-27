<?php

use SleepingOwl\Models\SleepingOwlModel;

class Model extends SleepingOwlModel{
        protected $table = "models";
	protected $fillable = ['model'];
	protected $hidden = ['id','id_marca','created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('id', 'asc');
	}
        
           public function marca(){
               return $this->belongsTo('Marca','id_marca');
           }
}