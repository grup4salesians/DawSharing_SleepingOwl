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

}

?>