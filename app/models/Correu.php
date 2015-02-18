<?php

use SleepingOwl\Models\SleepingOwlModel;

class Correu extends SleepingOwlModel{
        protected $table = "correus";
        protected $fillable = [ 'usuari_id', 'destinatari_id','contingut','vist','assumpte'];
	protected $hidden = ['created_at','updated_at'];

	public function scopeDefaultSort($query){
		return $query->orderBy('contingut', 'asc');
	}
        
        public function usuari(){
            return $this->belongsTo('Usuari','usuari_id');
        }
        public function usuariDest(){
            return $this->belongsTo('Usuari','destinatari_id');
        }

}