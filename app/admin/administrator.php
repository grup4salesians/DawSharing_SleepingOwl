<?php

Admin::model(\Administrator::Class)->title('Administradors')->columns(function (){
	Column::string('username', 'Nom Usuari');
        Column::string('password', 'Contrasenya');
        Column::string('name', 'Nom');
        
})->form(function (){
      	FormItem::text('username', 'Nom Usuari');
        FormItem::text('password', 'Contrasenya');
        FormItem::text('name', 'Nom');
});