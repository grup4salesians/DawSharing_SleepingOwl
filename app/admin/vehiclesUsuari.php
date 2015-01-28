<?php

Admin::model(\VehiclesUsuari::Class)->title('Vehicles d\'usuaris')->columns(function (){
	Column::string('vehicle.full_name', 'Vehicle');
	Column::string('id_usuaris', 'Id Usuaris');
	Column::string('matricula', 'Matricula');
        
})->form(function (){
	FormItem::select('id_vehicles', 'Vehicle')->list(\Vehicle::Class)->required();
	FormItem::text('id_usuaris', 'Id Usuaris');
	FormItem::text('matricula', 'Matricula');

});