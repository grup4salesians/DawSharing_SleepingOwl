<?php

class BuscarController extends BaseController {
public function showrutas() {
    
    $userdata = array(
            'searchTextField' => Input::get('searchTextField'),
            'searchTextFieldFin' => Input::get('searchTextFieldFin'),
        'fecha' => Input::get('fecha'),
        'fecha1' => Input::get('fecha1'),
        'preumax' => Input::get('preumax'),
        );
        $rules = [
            'searchTextField' => 'required',
            'searchTextFieldFin' => 'required',

        ];
        $validator = Validator::make($userdata, $rules);
        if ($validator->fails()) {
                return Redirect::to('/')->withInput()->withErrors($validator);
            }

            
            return View::make('pages.buscarruta',$userdata);
            
            
}

         
        
    
    
}