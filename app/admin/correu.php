<?php

Admin::model('\Correu')->title('Correu')->columns(function (){
    	//Column::string('id', 'id');	
        //Column::string('id_usuari', 'id_usuari');
        Column::string('usuari.nom', 'Usuari Envia');
        Column::string('usuariDest.nom', 'Destinatari');
        Column::string('assumpte', 'Assumpte');
	Column::string('contingut', 'Contingut');
        Column::string('vist', 'Vist');
        
        
})->form(function (){
        //FormItem::text('id', 'id');	
        FormItem::select('usuari_id', 'Usari Envia')->list('\Usuari')->required();
        FormItem::select('destinatari_id', 'Destinatari')->list('\Usuari')->required();
        FormItem::text('assumpte', 'Assumpte');
	FormItem::ckeditor('contingut', 'Contingut');
        FormItem::checkbox('vist', 'Vist');

});
