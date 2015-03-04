<?php

class PublicarViatgeController extends BaseController {

    public function showpublicar() {
        if (!Auth::check()) {    //Si no has iniciado sesión no puedes publicar un viage
            //return Redirect::to('/');
            return Redirect::back()->withInput()->withErrors("Tienes que estar logueado para poder publicar un viaje");
        }

        $userdata = array(
            'PublicarViatgeOrigen' => Input::get('PublicarViatgeOrigen'),
            'PublicarViatgeDesti' => Input::get('PublicarViatgeDesti'),
        );

        return View::make('pages.publicarViatge', $userdata);
    }

    public function InsertarDatos() {
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
        $validatorPas2 = "";
        $dataAnada = "";
        $horaAnada = "";
        $horaTornada = "";
        $dataTornada = "";
        $dataHoraAnada = "";
        $dataHoraTornada = "";

        if (Input::get('frequencia') == "data_concreta") {
            $dataAnada = Input::get("DataAnada");

            if (Input::get("tipus") == "anada_i_tornada") {
                $dataTornada = Input::get("DataTornada");
                $horaTornada = date("H:i", strtotime(Input::get("inTornadaHora")));
                $dataHoraTornada = $dataTornada . " " . $horaTornada;
                if (($dataAnada == $dataTornada) && ($horaAnada == $horaTornada)) {
                    $validatorPas2 = "Las dates i hores no poden coincidir.";
                    return Redirect::back()->withInput()->withErrors($validatorPas2);
                }
            }
        }
        $horaAnada = date("H:i", strtotime(Input::get("inAnadaHora")));
        $dataHoraAnada = $dataAnada . " " . $horaAnada;

        $DiesPeriodicsAnada = "";
        $DiesPeriodicsTornada = "";
        if (Input::get('frequencia') == "viatge_periodic") {
            $DiesPeriodicsAnada = SaberCheckBoxChekeados("anadaPeriodicDies");
            if (Input::get("tipus") == "anada_i_tornada") {
                $dataTornada = Input::get("DataTornada");
                $horaTornada = date("H:i", strtotime(Input::get("inTornadaHora")));
                $dataHoraTornada = $dataTornada . " " . $horaTornada;
                $DiesPeriodicsTornada = SaberCheckBoxChekeados("tornadaPeriodicDies");
            }
        }
        //*********************  fi validacio pas 2  ***********************\\
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
        //*********************  INSERTAR  *****************\\
        $select = "";
        $id_ruta = 0;
        $id_viatge = null;
        $id_periodicitat = null;
        $permisos = "";
        $duracio = "";
        $i = 0;
        $dataFiCurs = "26-05-" . date("Y");
        $dataFiCurs = date("Y-m-d", strtotime($dataFiCurs));
        $comentaris = "";

        if (Input::get('frequencia') == "viatge_periodic") {
            $periodicitat = new Periodicitat();
            $periodicitat->data_limit = $dataFiCurs;
            $periodicitat->dies = $DiesPeriodicsAnada;
            $periodicitat->save();
            $id_periodicitat = $periodicitat->id;
        }

        $inici_ruta = Input::get('searchTextField');
        $fi_ruta = Input::get('searchTextFieldFin');

        $id_ruta = Ruta::where('inici_ruta', $inici_ruta)->where('fi_ruta', $fi_ruta)->get();
        if (sizeof($id_ruta) == 0) {
            $ruta = new Ruta();
            $ruta->inici_ruta = $inici_ruta;
            $ruta->fi_ruta = $fi_ruta;
            $ruta->km = Input::get("hidden_distance");
            $ruta->save();
            $id_ruta = $ruta->id;
        } else {
            $id_ruta = $id_ruta[0]->id;
        }

        $id_usuari = Auth::user()->id;
        $id_vehicle = ViewVehiclesUsuari::where('vehicle', Input::get("meuVehicle"))->where('usuaris_id', $id_usuari)->get();
        $id_vehicle = $id_vehicle[0]->vehicles_id;

        $preu = Input::get('valorplaça');
        $numseientdisponible = Input::get('numplaces');
        $numseientrestant = $numseientdisponible;
        $permisos = Caracteristiques::orderBy('id', 'desc')->get();
        $permis = explode(";", $permisos[0]->permisosViatges);
        $permisos = "";
        foreach ($permis as &$valor) {
            $arrayPermisos = explode("_", Input::get('Permisos_' . $i));
            if ($arrayPermisos[1] == "si") {
                $permisos = $permisos . ";" . $arrayPermisos[0];
            }
            $i = $i + 1;
        }

        $permisos = substr($permisos, 1);
        $parsed = date_parse(explode(" ", Input::get("hidden_duration"))[0]);
        $duracio = $parsed['minute'] + $parsed['hour'] * 60;


        $dataActual = date("Y-m-d");

        if (Input::get('frequencia') == "data_concreta") {
            $dataFiCurs = date("Y-m-d", strtotime($dataActual . ' + 1 days'));
        }

        while ($dataActual <> $dataFiCurs) {
            if (Input::get('frequencia') == "viatge_periodic") {
                if (ComprobarDiaFecha($dataActual, $DiesPeriodicsAnada)) {
                    InsertarViatge_Passatger($id_ruta, $id_usuari, $id_vehicle, $id_periodicitat, $preu, $numseientdisponible, $numseientrestant, $duracio, $permisos, $dataActual, $horaAnada);
                    if (Input::get("tipus") == "anada_i_tornada") {
                        InsertarViatge_Passatger($id_ruta, $id_usuari, $id_vehicle, $id_periodicitat, $preu, $numseientdisponible, $numseientrestant, $duracio, $permisos, $dataActual, $horaTornada);
                    }
                }
            } else {
                InsertarViatge_Passatger($id_ruta, $id_usuari, $id_vehicle, $id_periodicitat, $preu, $numseientdisponible, $numseientrestant, $duracio, $permisos, $dataActual, $horaAnada);
                if (Input::get("tipus") == "anada_i_tornada") {
                    InsertarViatge_Passatger($id_ruta, $id_usuari, $id_vehicle, $id_periodicitat, $preu, $numseientdisponible, $numseientrestant, $duracio, $permisos, $dataActual, $horaTornada);
                }
            }
            $dataActual = date("Y-m-d", strtotime($dataActual . ' + 1 day'));
        }

        return Redirect::to('/');

        //*********************  FI INSERTAR  ********************\\
    }

}

?>
<?php

function ComprobarDiaFecha($dia, $diasmarcados) {
    $diaAbreviadoSemana = "";
    $arrayDias = explode(";", $diasmarcados);
    $ok = false;
    $diasemana = date('l', strtotime($dia));

    if ($diasemana == "Monday") {
        $diaAbreviadoSemana = "Dl";
    } elseif ($diasemana == "Tuesday") {
        $diaAbreviadoSemana = "Dm";
    } elseif ($diasemana == "Wednesday") {
        $diaAbreviadoSemana = "Dx";
    } elseif ($diasemana == "Thursday") {
        $diaAbreviadoSemana = "Dj";
    } elseif ($diasemana == "Friday") {
        $diaAbreviadoSemana = "Dv";
    } elseif ($diasemana == "Saturday") {
        $diaAbreviadoSemana = "Ds";
    } elseif ($diasemana == "Sunday") {
        $diaAbreviadoSemana = "Dg";
    }
    for ($i = 0; $i < sizeof($arrayDias); $i++) {
        if ($diaAbreviadoSemana == $arrayDias[$i]) {
            $ok = true;
        }
    }

    return $ok;
}

function InsertarViatge_Passatger($id_ruta, $id_usuari, $id_vehicle, $id_periodicitat, $preu, $numseientdisponible, $numseientrestant, $duracio, $permisos, $dataActual, $hora) {
    //******* INSERTA VIATGE *******\\
    //  return Redirect::back()->withInput()->withErrors($dataActual);
    $dataActual = $dataActual . " " . $hora;
    $dataActual = str_replace('/', '-', $dataActual);
    $dataActual = new DateTime($dataActual);

    $viatge = new InsertViatge();
    $viatge->ruta_id = $id_ruta;
    $viatge->usuari_id = $id_usuari;
    $viatge->vehicles_id = $id_vehicle;
    if (Input::get('frequencia') == "viatge_periodic") {
        $viatge->periodicitat_id = $id_periodicitat;
    }
    //  $viatge->comentaris = Input::get("comentaris");
    $viatge->preu = $preu;
    $viatge->numseientdisponible = $numseientdisponible;
    $viatge->numseientrestant = $numseientrestant;
    $viatge->duracio = $duracio;
    $viatge->permissos = $permisos;
    $viatge->data = $dataActual->format('Y-m-d H:i:s');
    $viatge->save();
    $id_viatge = $viatge->id;
    //******* FIN INSERTA VIATGE *****\\
    //******* INSERTA PASAJERO *******\\
    $passatger = new Passatger();
    $passatger->usuari_id = $id_usuari;
    $passatger->estat = "creador";
    $passatger->viatge_id = $id_viatge;
    $passatger->save();
    //******* FIN INSERTA PASAJERO *****\\
}

function SaberCheckBoxChekeados($array) {
    $i = 0;
    $DiesSeleccionats = "";
    for ($i = 0; $i < sizeof(Input::get($array)); $i++) {
        $DiesSeleccionats = $DiesSeleccionats . ";" . Input::get($array)[$i];
    }
    $DiesSeleccionats = substr($DiesSeleccionats, 1);
    return $DiesSeleccionats;
}

?>