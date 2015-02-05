<?php

Admin::model('\Passatger')->title('Passatgers')->filters(function (){
	ModelItem::filter('viatge_id')->title()->from('\Passatger','viatge_id');
})->columns(function () {
    Column::string('viatge_id', 'id_viatge');
    Column::string('usuari.full_name', 'Passatgers');
})->form(function () {
    FormItem::text('viatge_id', 'viatge_id');
    FormItem::Select('usuari_id', 'Usuari')->list('\Usuari')->required();
});

