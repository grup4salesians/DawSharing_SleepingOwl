<?php

class blockRuta {

    private $id, $data, $rutaInici, $rutaFi, $preu, $seientsRestants, $permisos;

    public function __construct($id = 0, $data = null, $rutaInici = "", $rutaFi = "", $preu = 99999, $seientsRestants = 0, $permisos = "") {
        $this->id = $id;
        $this->data = $data;
        $this->rutaInici = $rutaInici;
        $this->rutaFi = $rutaFi;
        $this->preu = $preu;
        $this->seientsRestants = $seientsRestants;
        $this->permisos = $permisos;
    }

    public function mostrarMapa() {
        $code = "";



        return $code;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
        return $this;
    }

}

?>