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
        
        if($this->vist==1){$negrita="BandejaMails_PonerTextoNegrita";}
        $text = substr($this->contingut,0,100);
        
        $ruta = Usuari::where('id', '=', $this->emissor)->get();
        $usuario= $ruta[0]->cognoms .','.$ruta[0]->nom;
        $code = "
            <div class='BandejaMails_Mail'>
                        <div class='BandejaMails_Chk'>
                        <input type='checkbox' name='chkBandejaMailsBorrar' value=''><br>
                        </div>
                        <div class='BandejaMails_Emissor $negrita'>$usuario</div>
                        <div class='BandejaMails_Dades $negrita'>$this->assumpte $text ...</div>
                        <div class='BandejaMails_DadesSenceres $negrita'>$this->assumpte $this->contingut</div>
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