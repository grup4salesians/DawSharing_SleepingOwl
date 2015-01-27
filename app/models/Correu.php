<?php

use SleepingOwl\Models\SleepingOwlModel;

class Correu extends SleepingOwlModel{
        protected $table = "correus";
	
	protected $hidden = ['id','id_usuari','id_destinatari','created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('contingut', 'asc');
	}
        
        public function usuari(){
            return $this->belongsTo('Usuari','id_usuari');
        }
        public function usuariDest(){
            return $this->belongsTo('Usuari','id_destinatari');
        }

}