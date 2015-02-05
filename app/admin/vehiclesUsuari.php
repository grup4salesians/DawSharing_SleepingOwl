<?php

Admin::model('\VehiclesUsuari')->title('Vehicles d\'usuaris')->columns(function (){
	Column::string('vehicle.full_name', 'Vehicle');
	Column::string('usuari.full_name', 'Usuari');
	Column::string('matricula', 'Matricula');
        
})->form(function (){
	FormItem::select('vehicles_id', 'Vehicle')->list('\ViewVehicle')->required();
	FormItem::select('usuaris_id', 'Usuari')->list('\ViewUsuari')->required();
	FormItem::text('matricula', 'Matricula');

});