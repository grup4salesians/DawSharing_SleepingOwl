<?php

Admin::model(\Model::Class)->title('Model')->columns(function (){
	Column::string('model', 'Model');
        
})->form(function (){
	FormItem::text('model', 'Model');
});