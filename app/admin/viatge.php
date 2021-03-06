<?php

Admin::model('\Viatge')->title('Viatges')->columns(function (){
	Column::string('ruta.full_name', 'Ruta');
	Column::string('usuari.full_name', 'Usuari');
	Column::string('vehicles.full_name', 'Vehicle');
	Column::string('periodicitat.dies', 'Dies Periodicitat');
	Column::date('periodicitat.data_limit', 'Final periodicitat')->formatdate('short');
	Column::string('preu', 'Preu');
	Column::string('numSeientDisponible', 'Seients Disponibles');
	Column::string('numSeientRestant', 'Seients Restants');
	Column::string('duracio', 'Duració');
	Column::string('permissos', 'Permissos');
	Column::date('data', 'Data')->format('short','short');
        Column::count('passatgers', 'Passatgers')->append(Column::filter('viatge_id')->model('\Passatger'));

})->form(function (){
	FormItem::select('ruta_id', 'Ruta')->list('\ViewRuta')->required();
	FormItem::select('usuari_id', 'Usuari')->list('\ViewUsuari')->required();
	FormItem::select('vehicles_id', 'Vehicle')->list('\ViewVehicle')->required();
	FormItem::text('dies', 'Dies Periodicitat');
	FormItem::date('data_limit', 'Final periodicitat');
	FormItem::text('preu', 'Preu');
	FormItem::text('numSeientDisponible', 'Seients Disponibles');
	FormItem::text('numSeientRestant', 'Seients Restants');
	FormItem::text('duracio', 'Duració');
	FormItem::text('permissos', 'Permissos');
	//FormItem::timestamp('data', 'Data');
});