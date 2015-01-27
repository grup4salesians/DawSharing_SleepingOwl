<?php

Admin::model(\Viatge::Class)->title('Viatges')->columns(function (){
	Column::string('ruta.inici_ruta', 'Ruta');
	Column::string('usuaris.nom', 'Usuari');
	Column::string('vehicles.tipus', 'Tipus vehicle');
	Column::string('periodicitat.data_limit', 'Final periodicitat');
	Column::string('preu', 'Preu');
	Column::string('numSeientDisponible', 'Seients Disponibles');
	Column::string('numSeientRestant', 'Seients Restants');
	Column::string('duracio', 'Duració');
	Column::string('permissos', 'Permissos');
	Column::string('data', 'Data');
        
})->form(function (){
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