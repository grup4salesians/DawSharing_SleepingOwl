<?php

class RegistreController extends BaseController {

    public function showFormulari() {
        return View::make('pages.registre');
    }

    public function postRegistre() {

        $userdata = array(
            'nom' => Input::get('nom'),
            'cognom' => Input::get('cognom'),
            'email' => Input::get('email'),
            'contrasenya' => Input::get('contrasenya'),
            'telefon' => Input::get('telefon')
        );
        $rules = [
            'nom' => 'required|min:1',
            'cognom' => 'required|min:1',
            'email' => 'required|email|unique:Usuari',
            'contrasenya' => 'required|confirmed|min:6',
            'telefon' => 'min:9|max:20'
        ];

        if (Input::get('chkRegistreCondicions') === 'yes') {
            $validator = Validator::make($userdata, $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            return Redirect::to('/login');
        } else {
            //error
        }
    }

}

?>