<?php

use SleepingOwl\Models\SleepingOwlModel;

class Usuari extends SleepingOwlModel{
        protected $table = "usuaris";
	protected $fillable = ['nom', 'cognoms', 'dni', 'grup_escolar', 'foto', 'correu', 'rol', 'fecha_inscripcion', 'contrasenya', 'sexe', 'data_naixement', 'idioma'];
        protected $hidden = [];

        public function scopeDefaultSort($query){
		return $query->orderBy('nom', 'asc');
	}

}

