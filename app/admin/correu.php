<?php

Admin::model(\Correu::Class)->title('Correu')->columns(function (){
    	Column::string('id', 'id');	
        Column::string('id_usuari', 'id_usuari');
	Column::string('contingut', 'Contingut');
        Column::string('vist', 'Vist');
        
})->form(function (){
        FormItem::text('id', 'id');	
        FormItem::text('id_usuari', 'id_usuari');
	FormItem::text('contingut', 'Contingut');
        FormItem::text('vist', 'Vist');
});
