<?php

class Calculestalvi extends BaseController {
public function showformulari() {
    
    return View::make('pages.calculestalvi');
}

public function showcalcul(){
    
    $litroskm = Input::get('l100');
    $euroslitro = Input::get('€/L');
    $distanciaa = Input::get('distancia');
     
    
     $userdata = array(
            'litroskm' => Input::get('l100'),
    'euroslitro' => Input::get('€/L'),
    'distancia' => Input::get('distancia'));
    
     return View::make('pages.Calculestalvi')->with('userdata',$userdata);
}
}
