<?php

Admin::model(\Marca::Class)->title('Marca')->columns(function (){
	Column::string('marca', 'Marca');
       // Column::count('models', 'Models')->append(Column::filter('id_marca')->model('\Model'));
})->form(function (){
	FormItem::text('marca', 'Marca');
});