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
            'telefon' => Input::get('telefon')
        );

        if (Auth::attempt($userdata, Input::get('remember-me', 0))) {
            return Redirect::to('/');
        }
        return Redirect::to('login')->with('mensaje_error', 'Tus datos son incorrectos')->withInput();
    }

}

?>