<?php

class BuscarController extends BaseController {
public function showrutas() {
    
    $userdata = array(
            'searchTextField' => Input::get('searchTextField'),
            'searchTextFieldFin' => Input::get('searchTextFieldFin'),
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