<?php

Admin::model(\ViewViatge::Class)->title('Viatges')->columns(function (){
	Column::string('ruta.full_name', 'Ruta');
	Column::string('usuari.full_name', 'Usuari');
	Column::string('vehicles.full_name', 'Vehicle');
	Column::string('periodicitat.dies', 'Dies Periodicitat');
	Column::string('periodicitat.data_limit', 'Final periodicitat');
	Column::string('preu', 'Preu');
	Column::string('numSeientDisponible', 'Seients Disponibles');
	Column::string('numSeientRestant', 'Seients Restants');
	Column::string('duracio', 'Duració');
	Column::string('permissos', 'Permissos');
	Column::string('data', 'Data');

})->form(function (){
	FormItem::select('id_ruta', 'Ruta')->list(\ViewRuta::Class)->required();
	FormItem::select('id_usuaris', 'Usuari')->list(\ViewUsuari::Class)->required();
	FormItem::select('id_vehicles', 'Vehicle')->list(\ViewVehicle::Class)->required();
	FormItem::text('dies', 'Dies Periodicitat');
	FormItem::text('data_limit', 'Final periodicitat');
	FormItem::text('preu', 'Preu');
	FormItem::text('numSeientDisponible', 'Seients Disponibles');
	FormItem::text('numSeientRestant', 'Seients Restants');
	FormItem::text('duracio', 'Duració');
	FormItem::text('permissos', 'Permissos');
	FormItem::text('data', 'Data');
});