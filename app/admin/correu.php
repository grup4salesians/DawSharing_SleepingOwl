<?php

Admin::model(\Correu::Class)->title('Correu')->columns(function (){
    	//Column::string('id', 'id');	
        //Column::string('id_usuari', 'id_usuari');
        Column::string('usuari.nom', 'Usari');
	Column::string('contingut', 'Contingut');
        Column::string('vist', 'Vist');
        
})->form(function (){
        //FormItem::text('id', 'id');	
        FormItem::select('id_usuari', 'Usuari')->list(\Usuari::class)->required();
	FormItem::ckeditor('contingut', 'Contingut');
        FormItem::checkbox('vist', 'Vist');

});
