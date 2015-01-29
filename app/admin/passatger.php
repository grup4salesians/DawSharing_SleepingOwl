<?php

Admin::model(\Passatger::Class)->title('Passatgers')->filters(function (){
	ModelItem::filter('viatge_id')->title()->from(\Passatger::Class,'viatge_id');
})->columns(function () {
    /* Column::{type}('{field name}', '{column label}') */
    Column::string('viatge_id', 'id_viatge');
    Column::string('usuari.full_name', 'Passatgers');
    //Column::lists('usuari.full_name', 'Passatgers');
    
})->form(function () {
    FormItem::text('viatge_id', 'viatge_id');
    FormItem::Select('usuari_id', 'Usuari')->list(\Usuari::class)->required();
});

