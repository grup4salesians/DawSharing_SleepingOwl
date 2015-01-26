<?php

Admin::model(\Marca::Class)->title('Marca')->columns(function (){
	Column::string('marca', 'Marca');
        
})->form(function (){
	FormItem::text('marca', 'Marca');
});