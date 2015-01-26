<?php

Admin::model(\Ruta::Class)->title('Rutes')->columns(function () {
    /* Column::{type}('{field name}', '{column label}') */
    Column::string('inici_ruta', 'Inici de ruta');
    Column::string('fi_ruta', 'Final de ruta');
    Column::string('km', 'Km');
})->form(function () {
    FormItem::text('inici_ruta', 'Inici de ruta');
    FormItem::text('fi_ruta', 'Final de ruta');
    FormItem::text('km', 'Km');
});

