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
        $code = '<a href="viatges?idViatge=$id" class="linkViatge">
            <div class="blockRuta">
                <div class="careto">
                    <img src="" alt="">
                </div>
                <div class="info">
                    <h4>$data</h4>
                    <div class="row">
                        <p class="origen">
                            <i class="icon-map-marker"></i> $rutaInici
                        </p>
                        <p class="fi">
                            <i class="icon-map-marker"></i> $rutaFi
                        </p>
                    </div>
                    <div class="rowDown">
                        <div class="seientsRestants">$seientsRestants</div>
                        <div class="permisos">$permisos</div>
                        <div class="preu">$preu €</div>
                    </div>
                </div>
            </div>
        </a>';


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