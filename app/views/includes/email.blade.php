<?php

class email {

    private $id, $data, $emissor, $assumpte,$contingut,$vist;

    public function __construct($id = 0, $data = null, $emissor = "", $assumpte = "",$contingut="",$vist="") {
        $this->id = $id;
        $this->data = $data;
        $this->emissor = $emissor;
        $this->assumpte = $assumpte;
        $this->contingut =$contingut;
        $this->vist =$vist;
    }

    public function mostrarEmail() {
        $code = "";
        $negrita="";
        $usuario="";
        $text="";

        if($this->vist==0){
            $negrita="BandejaMails_PonerTextoNegrita";
        }
        $text = substr($this->contingut,0,50);
        
        $ruta = Usuari::where('id', '=', $this->emissor)->get();
        $usuario= $ruta[0]->cognoms .','.$ruta[0]->nom;
        $code = "
            <div data-ID='$this->id' class='BandejaMails_Mail $negrita'>
                        <div class='BandejaMails_Chk'>
                        <input type='checkbox' name='chkBandejaMailsBorrar' value=''><br>
                        </div>
                        <div class='BandejaMails_Emissor'>$usuario</div>
                        <div class='BandejaMails_Dades'>$this->assumpte </div>
                        <div class='BandejaMails_DadesSenceres'>$this->assumpte $this->contingut</div>
                        <div class='BandejaMails_Data'>$this->data</div>
                </div>";

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