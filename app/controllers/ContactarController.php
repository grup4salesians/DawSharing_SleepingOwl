<?php

class ContactarController extends BaseController {
public function showFormulari() {
    return View::make('pages.contactar');
}
public function postFormulari() {
    
     $userdata = array(
            'nom' => Input::get('nom'),
            'correu' => Input::get('correu'),
            'telefon' => Input::get('telefon'),
             'missatge' => Input::get('missatge')
        );
        $rules = [
            'nom' => 'required|min:1',
            'correu' => 'required|email',
            'telefon' => 'between:9,20',
            'missatge' => 'between:1,400'
        ];
        
        $validator = Validator::make($userdata, $rules);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }
            
                  Mail::send('emails.template', array('firstname'=>Input::get('nom')), function ($message) {
                $message->subject('DawSharing04');
                $message->to('dawsharing04@gmail.com');
                
            });
}

}
?>
