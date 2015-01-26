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

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\SleepingOwl\Admin\Controllers\DummyController@getIndex');
Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function (){

	Admin::menu(\Marca::Class);
	Admin::menu(\Caracteristica::Class);
	Admin::menu(\Correu::Class);
	Admin::menu(\Model::Class);
	// Admin::menu(\Passatger::Class);
	// Admin::menu(\Periodicitat::Class);
	// Admin::menu(\Ruta::Class);
	// Admin::menu(\Usuari::Class);
	// Admin::menu(\Vehicle::Class);
	// Admin::menu(\VehiclesUsuari::Class);
	// Admin::menu(\Viatge::Class);

});
Admin::menu(\Administrator::Class);
 