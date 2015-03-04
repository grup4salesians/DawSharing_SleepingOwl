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
        $correu->contingut = "Aquest usuari ha sol·licitat ser passatger d'un dels teus viatges (<a target='_blank' href='".Config::get('constants.BaseUrl')."public/detallViatge/".$idViatge."'>veure viatge</a>). Vols acceptar-lo? </br>
                                <a href='".Config::get('constants.BaseUrl')."public/detallViatge/acceptar/".$idViatge."/".Auth::user()->id."'>Acceptar</a> </br>
                                <a href='".Config::get('constants.BaseUrl')."public/detallViatge/denegar/".$idViatge."/".Auth::user()->id."'>Denegar</a>";
        $correu->vist = 0;
        $correu->save();


        return Redirect::to('detallViatge/'.$idViatge);
    }

    public function getAcceptar($idViatge, $idPassatger){
        $creador = Passatger::where('viatge_id', $idViatge)->where('estat', 'creador')->get();
        $creador = $creador[0]->usuari_id;
        if (Auth::user()->id == $creador) {
            $estat = Passatger::where('viatge_id', $idViatge)->where('usuari_id', $idPassatger)->get();
            $estat = $estat[0]->estat;
            if ($estat != 'acceptat'){
              Passatger::where('viatge_id', $idViatge)->where('usuari_id', $idPassatger)->update(array('estat' => 'acceptat'));
              Viatge::where('id', $idViatge)->decrement('numSeientRestant');

              //Correu avis
                $correu = new Correu();
                $correu->usuari_id = Auth::user()->id;
                $correu->destinatari_id = $idPassatger;
                $correu->assumpte = "Avis de viatge";
                $correu->contingut = "Has sigut acceptat en el següent viatge (<a href='".Config::get('constants.BaseUrl')."public/detallViatge/".$idViatge."'>veure viatge</a>).";
                $correu->vist = 0;
                $correu->save();
            }
            else{
            }
            return Redirect::to('detallViatge/'.$idViatge);
        }
        else {
            return Redirect::to('/');
        }


    }

    public function getDenegar($idViatge, $idPassatger){
        $creador = Passatger::where('viatge_id', $idViatge)->where('estat', 'creador')->get();
        $creador = $creador[0]->usuari_id;
        if (Auth::user()->id == $creador) {
            $estat = Passatger::where('viatge_id', $idViatge)->where('usuari_id', $idPassatger)->get();
            $estat = $estat[0]->estat;
            if ($estat != 'denegat'){
              Passatger::where('viatge_id', $idViatge)->where('usuari_id', $idPassatger)->update(array('estat' => 'denegat'));
              Viatge::where('id', $idViatge)->decrement('numSeientRestant');

              //Correu avis
                $correu = new Correu();
                $correu->usuari_id = Auth::user()->id;
                $correu->destinatari_id = $idPassatger;
                $correu->assumpte = "Avis de viatge";
                $correu->contingut = "Has sigut denegat en el següent viatge (<a href='".Config::get('constants.BaseUrl')."public/detallViatge/".$idViatge."'>veure viatge</a>).";
                $correu->vist = 0;
                $correu->save();
            }
            else{
            }
            return Redirect::to('detallViatge/'.$idViatge);
        }
        else {
            return Redirect::to('/');
        }


    }

}