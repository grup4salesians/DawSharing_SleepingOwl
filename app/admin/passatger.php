<?php

Admin::model(\Passatger::Class)->title('Passatgers')->columns(function () {
    /* Column::{type}('{field name}', '{column label}') */
    Column::string('id_viatge', 'id_viatge');
    Column::string('usuari.nom', 'id_usuari');
  
    
})->form(function () {
    FormItem::text('id_viatge', 'id_viatge');
    FormItem::select('id_usuari', 'Usuari')->list(\Usuari::class)->required();
});

