<?php

Admin::model(\Correu::Class)->title('Correu')->columns(function (){
	Column::string('contingut', 'Contingut');
        Column::string('vist', 'Vist');
        
})->form(function (){
	FormItem::text('contingut', 'Contingut');
        FormItem::text('vist', 'Vist');
});
