<?php

class ViatgeDetallsController extends BaseController {
	
    public function getSolicitud($idViatge) {

    	$Passatger = new Passatger();
        $Passatger->viatge_id = $idViatge;
        $Passatger->usuari_id = Auth::user()->id;
        $Passatger->estat = "pendent";
        $Passatger->save();

        try {
	        $destinatari = Passatger::where('viatge_id', $idViatge)->where('estat', 'creador')->get();
	        $destinatari = $destinatari[0]->usuari_id;
        	
        } catch (Exception $e) {
        	$destinatari = 0;
        }

        $correu = new Correu();
        $correu->usuari_id = Auth::user()->id;
        $correu->destinatari_id = $destinatari;
        $correu->assumpte = "Peticio de viatge";
        $correu->contingut = "<a href='".Config::get('constants.BaseUrl')."public/detallViatge/acceptar/".$idViatge."/".Auth::user()->id."'>Acceptar</a>";
        $correu->vist = 0;
        $correu->save();


        return Redirect::to('detallViatge/'.$idViatge);
    }

    public function getAcceptar($idViatge, $idPassatger){
    	$creador = Passatger::where('viatge_id', $idViatge)->where('estat', 'creador')->get();
    	$creador = $creador[0]->usuari_id;
    	if (Auth::user()->id == $creador) {
    		# code...
    		$destinatari = Passatger::where('viatge_id', $idViatge)->where('usuari_id', $idPassatger)->update(array('estat' => 'acceptat'));
    		return Redirect::to('perfil/missatges');
    	}
    	else {
    		return Redirect::to('missatges');
    	}


    }

}