<?php

Admin::model(\Correu::Class)->title('Correu')->columns(function (){
    	//Column::string('id', 'id');	
        //Column::string('id_usuari', 'id_usuari');
        Column::string('usuari.nom', 'Usuari Envia');
        Column::string('usuariDest.nom', 'Destinatari');
	Column::string('contingut', 'Contingut');
        Column::string('vist', 'Vist');
        
})->form(function (){
        //FormItem::text('id', 'id');	
        FormItem::select('id_usuari', 'Usari Envia')->list(\Usuari::class)->required();
        FormItem::select('id_destinatari', 'Destinatari')->list(\Usuari::class)->required();
	FormItem::ckeditor('contingut', 'Contingut');
        FormItem::checkbox('vist', 'Vist');

});
