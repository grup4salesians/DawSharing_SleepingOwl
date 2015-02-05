<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */

Admin::menu()->url('/')->label('Inici')->icon('fa-dashboard')->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex');
Admin::menu()->label('Manteniment Taules')->icon('fa-book')->items(function (){

	Admin::menu('\Marca');
	Admin::menu('\Caracteristiques');
	Admin::menu('\Correu');
	Admin::menu('\Model');
	Admin::menu('\Passatger');
	Admin::menu('\Periodicitat');
	Admin::menu('\Ruta');
	Admin::menu('\Usuari');
	Admin::menu('\Vehicle');
  	Admin::menu('\VehiclesUsuari');
	Admin::menu('\Viatge');

});
//Admin::menu(\Administrator::Class);
 