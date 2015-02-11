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
            'contrasenya' => Input::get('contrasenya'),
            'contrasenya_confirm' => Input::get('contrasenya_confirm'),
            'telefon' => Input::get('telefon')
        );
        $rules = [
            'nom' => 'required|min:1',
            'cognoms' => 'required|min:1',
            'correu' => 'required|email|unique:usuaris',
            'contrasenya' => 'required|min:6',
            'contrasenya_confirm' => 'required|same:contrasenya',
            'telefon' => 'min:9|max:20'
        ];

        if (Input::get('chkRegistreCondicions') == 1) {
            $validator = Validator::make($userdata, $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            return Redirect::to('/');
        } else {
            $validator = "No s'han acceptat les condicions d'Ús";
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }

}

?>