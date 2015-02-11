<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Usuari extends SleepingOwlModel implements ModelWithImageFieldsInterface, UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;
    use ModelWithImageOrFileFieldsTrait;

    protected $table = "usuaris";
    protected $fillable = ['nom', 'cognoms', 'dni', 'grup_escolar', 'foto', 'correu', 'rol', 'fecha_inscripcion', 'contrasenya', 'sexe', 'data_naixement', 'idioma','telefon', 'remember_token'];
    
    protected $hidden = array('contrasenya', 'remember_token');
    
    public function scopeDefaultSort($query) {
        return $query->orderBy('nom', 'asc');
    }

    public function getFullNameAttribute() {
        return implode(' ', [$this->nom, $this->cognoms]);
    }

    public static function getList() {
        return static::lists('Nom', 'id');
    }

    public function getImageFields() {  //indica la ruta on es guardaran les imatges public\images\usuaris
        return ['foto' => 'usuaris/'];
    }

    public function getDates() {    
        return array_merge(parent::getDates(), ['data_naixement','fecha_inscripcion']);
    }


    public function getAuthIdentifier() {
        return $this->id;
    }

    public function getAuthPassword() {
        return $this->contrasenya;
        
    }
}
