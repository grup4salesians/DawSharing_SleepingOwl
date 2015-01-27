<?php

Admin::model(\VehiclesUsuari::Class)->title('Vehicles d\'usuaris')->columns(function (){
	Column::string('vehicle.model', 'Vehicle');
	Column::string('id_usuaris', 'Id Usuaris');
	Column::string('matricula', 'Matricula');
        
})->form(function (){
	FormItem::text('id_vehicle', 'Id Vehicle');
	FormItem::text('id_usuaris', 'Is Usuaris');
	FormItem::text('matricula', 'Matricula');

});