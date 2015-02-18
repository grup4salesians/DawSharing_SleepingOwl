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
        $code = "<a href='detallViatge?idViatge=$this->id' class='linkViatge'>
            <div class='blockRuta'>
                <div class='careto'>
                    <img src='' alt=''>
                </div>
                <div class='infomio'>
                    <h4>$this->data</h4>
                    <div class='fila'>
                        <p class='origen'>
                            <i class='fa fa-map-marker'></i> $this->rutaInici
                        </p>
                        <p class='fi'>
                            <i class='fa fa-map-marker'></i> $this->rutaFi
                        </p>
                    </div>
                    <div class='rowDown'>
                        <div class='seientsRestants'><i class='fa fa-user-plus'></i> $this->seientsRestants</div>
                        <div class='permisos'>$this->permisos</div>
                        <div class='preu'>$this->preu <i class='fa fa-eur'></i></div>
                    </div>
                </div>
            </div>
        </a>";


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