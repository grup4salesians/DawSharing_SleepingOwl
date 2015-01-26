<?php

Admin::model(\Periodicitat::Class)->title('Periodicitat')->columns(function () {
    /* Column::{type}('{field name}', '{column label}') */
    Column::string('data_limit', 'data_limit');
    Column::string('dies', 'dies');
})->form(function () {
    FormItem::text('data_limit', 'data_limit');
    FormItem::text('dies', 'dies');
});

