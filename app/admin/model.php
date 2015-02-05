<?php

Admin::model('\Model')->title('Model')->columns(function (){
    Column::string('marca.marca', 'Marca');
    Column::string('model', 'Model');
        
})->form(function (){
        FormItem::select('marca_id', 'Marcas')->list('\Marca')->required();
	FormItem::text('model', 'Model');
});