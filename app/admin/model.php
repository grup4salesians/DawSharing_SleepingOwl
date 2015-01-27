<?php

Admin::model(\Model::Class)->title('Model')->columns(function (){
    Column::string('id', 'id');
    //Column::string('id_marca', 'id_marca');
    Column::string('foranea_marca.marca', 'Marca');
    Column::string('model', 'Model');
        
})->form(function (){
        FormItem::text('id', 'id');
        FormItem::text('id_marca', 'id_marca');
	FormItem::text('model', 'Model');
});