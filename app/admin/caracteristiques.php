<?php

Admin::model('\Caracteristiques')->title('Caracteristiques')->columns(function (){
	Column::string('permisosViatges', 'Permisos Viatges');
})->form(function (){
	FormItem::text('permisosViatges', 'Permisos Viatges');
 });
