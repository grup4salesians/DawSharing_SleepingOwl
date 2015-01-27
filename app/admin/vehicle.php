<?php

Admin::model(\Vehicle::Class)->title('Vehicle')->columns(function (){
        /*Column::{type}('{field name}', '{column label}')*/
        Column::string('tipus', 'Tipus');
        Column::string('model.model', 'Model');
        Column::string('combustio', 'Combustió');
        Column::string('places', 'Places');
        Column::string('custom_marca', 'Marca');
        Column::string('custom_model', 'Model');
        
})->form(function (){
        FormItem::text('tipus', 'Tipus');
        FormItem::text('combustio', 'Combustió');
        FormItem::text('places', 'Places');
        FormItem::text('custom_marca', 'Marca');
        FormItem::text('custom_model', 'Model');
});

