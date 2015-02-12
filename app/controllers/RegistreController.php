<?php

class RegistreController extends BaseController {

    public function showFormulari() {
        return View::make('pages.registre');
    }

    public function postRegistre() {

        $userdata = array(
            'nom' => Input::get('nom'),
            'cognoms' => Input::get('cognoms'),
            'correu' => Input::get('correu'),
            'password' => Input::get('password'),
            'contrasenya_confirm' => Input::get('contrasenya_confirm'),
            'telefon' => Input::get('telefon')
        );
        $rules = [
            'nom' => 'required|min:1',
            'cognoms' => 'required|min:1',
            'correu' => 'required|email|unique:usuaris',
            'password' => 'required|min:6',
            'contrasenya_confirm' => 'required|same:password',
            'telefon' => 'between:9,20'
        ];

        if (Input::get('chkRegistreCondicions') == 1) {
            $validator = Validator::make($userdata, $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            
            $usuari = new Usuari();
            $usuari->nom = Input::get('nom');
            $usuari->cognoms = Input::get('cognoms');
            $usuari->correu = Input::get('correu');
            $usuari->contrasenya = Hash::make(Input::get('password'));
            $usuari->fecha_inscripcion = date("d-m-Y H:i:s");
            $usuari->telefon = Input::get('telefon');
            $usuari->save();
               
            return Redirect::to('/');
        } else {
            $validator = "No s'han acceptat les condicions d'Ús";
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }

}

?>