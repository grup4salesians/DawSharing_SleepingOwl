<?php

class PublicarViatgeController extends BaseController {

    public function showpublicar() {
        if (!Auth::check()) {    //Si no has iniciado sesión no puedes publicar un viage
            return Redirect::to('/');
        }

        $userdata = array(
            'PublicarViatgeOrigen' => Input::get('PublicarViatgeOrigen'),
            'PublicarViatgeDesti' => Input::get('PublicarViatgeDesti'),
        );

        return View::make('pages.publicarViatge', $userdata);
    }

    public function InsertarDatos() {
        // return View::make('pages.home');
        //*********************  validacio pas 1  **********************\\

        $pas1 = array(
            'origen' => Input::get('searchTextField'),
            'destinacio' => Input::get('searchTextFieldFin')
        );
        $rulesPas1 = [
            'origen' => 'required|min:1',
            'destinacio' => 'required|min:1|different:origen'
        ];

        $validatorPas1 = Validator::make($pas1, $rulesPas1);
        if ($validatorPas1->fails()) {
            return Redirect::back()->withInput()->withErrors($validatorPas1);
        }

        //*********************  fi validacio pas 1  **********************\\
        //
        //*********************  validacio pas 2  **************************\\
        $dataHoraAnada = "";
        $dataHoraTornada = "";

        if (Input::get('frequencia') == "data_concreta") {
            //Input::get("DataAnada")
            $dataAnada = Input::get("DataAnada");
            $horaAnada = date("H:i", strtotime(Input::get("inAnadaHora")));
            $dataHoraAnada = $dataAnada . " " . $horaAnada;

            if (Input::get("tipus") == "anada_i_tornada") {
                $dataTornada = Input::get("DataTornada");
                $horaTornada = date("H:i", strtotime(Input::get("inTornadaHora")));
                $dataHoraTornada = $dataTornada . " " . $horaTornada;
            }
        }
        
        if (Input::get('frequencia') == "viatge_periodic") {
            //Input::get("DataAnada")
            

            if (Input::get("tipus") == "anada_i_tornada") {
                
            }
        }
        


        //*********************  fi validacio pas 2  ***********************\\
        //
        //*********************  validacio pas 3  **************************\\

        $pas3 = array(
            'numplaces' => Input::get('numplaces'),
            'valorseient' => Input::get('valorplaça')
        );
        $rulesPas3 = [
            'numplaces' => 'min:1',
            'valorseient' => 'min:1'
        ];

        $validatorPas3 = Validator::make($pas3, $rulesPas3);
        if ($validatorPas3->fails()) {
            return Redirect::back()->withInput()->withErrors($validatorPas3);
        }
        //*********************  fi validacio pas 3  ***********************\\
    }

}

?>