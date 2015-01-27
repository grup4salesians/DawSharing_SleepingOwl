<?php

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Usuari extends SleepingOwlModel implements ModelWithImageFieldsInterface {

    use ModelWithImageOrFileFieldsTrait;

    protected $table = "usuaris";
    protected $fillable = ['nom', 'cognoms', 'dni', 'grup_escolar', 'foto', 'correu', 'rol', 'fecha_inscripcion', 'contrasenya', 'sexe', 'data_naixement', 'idioma'];

    public function scopeDefaultSort($query) {
        return $query->orderBy('nom', 'asc');
    }

    public static function getList() {
        return static::lists('Nom', 'id');
    }

    public function getImageFields() {  //indica la ruta on es guardaran les imatges public\images\usuaris
        return ['foto' => 'usuaris/'];
    }

    public function getDates() {    
        return array_merge(parent::getDates(), ['data_naixement']);//,'fecha_inscripcion']);
    }
//    public function getTimeStamps() {    
//        return array_merge(parent::getTimeStamps(), ['fecha_inscripcion']);
//    }
    

}
