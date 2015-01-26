<?php

Admin::model(\Viatge::Class)->title('Viatges')->columns(function (){
	Column::string('id', 'id');
	Column::string('id_ruta', 'id Ruta');
	Column::string('id_usuari', 'id Usuari');
	Column::string('id_vehicle', 'id Vehicle');
	Column::string('id_periodicitat', 'id periodicitat');
	Column::string('preu', 'Preu');
	Column::string('numSeientDisponible', 'Seients Disponibles');
	Column::string('numSeientRestant', 'Seients Restants');
	Column::string('duracio', 'Duració');
	Column::string('permissos', 'Permissos');
	Column::string('data', 'Data');
        
})->form(function (){
	FormItem::text('id', 'id');
	FormItem::text('id_ruta', 'id Ruta');
	FormItem::text('id_usuari', 'id Usuari');
	FormItem::text('id_vehicle', 'id Vehicle');
	FormItem::text('id_periodicitat', 'id periodicitat');
	FormItem::text('preu', 'Preu');
	FormItem::text('numSeientDisponible', 'Seients Disponibles');
	FormItem::text('numSeientRestant', 'Seients Restants');
	FormItem::text('duracio', 'Duració');
	FormItem::text('permissos', 'Permissos');
	FormItem::text('data', 'Data');
});