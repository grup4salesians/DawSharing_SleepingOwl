<?php

Admin::model(\Passatger::Class)->title('Passatgers')->columns(function () {
    /* Column::{type}('{field name}', '{column label}') */
    Column::string('id', 'id');
    Column::string('id_viatge', 'id_viatge');
    Column::string('id_usuari', 'id_usuari');
  
    
})->form(function () {
    FormItem::text('id', 'id');
    FormItem::text('id_viatge', 'id_viatge');
    FormItem::text('id_usuari', 'id_usuari');
});

