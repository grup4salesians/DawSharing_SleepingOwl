<?php

Admin::model('\Periodicitat')->title('Periodicitat')->columns(function () {
    /* Column::{type}('{field name}', '{column label}') */
    Column::date('data_limit', 'data_limit')->formatdate('short');
    Column::string('dies', 'dies');
})->form(function () {
    FormItem::date('data_limit', 'data_limit');
    FormItem::text('dies', 'dies');
});

