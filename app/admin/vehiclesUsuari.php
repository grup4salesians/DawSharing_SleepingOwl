<?php

Admin::model(\VehiclesUsuari::Class)->title('Vehicles d\'usuaris')->columns(function (){
	Column::string('marca.marca', 'Vehicle');
	Column::string('id_usuaris', 'Id Usuaris');
	Column::string('matricula', 'Matricula');
        
})->form(function (){
	FormItem::text('id_vehicles', 'Id Vehicles');
	FormItem::text('id_usuaris', 'Id Usuaris');
	FormItem::text('matricula', 'Matricula');

});