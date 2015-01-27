<?php

Admin::model(\Usuari::Class)->title('Usuaris')->columns(function () {
    Column::string('nom', 'Nom');
    Column::string('cognoms', 'Cognoms');
    Column::string('dni', 'Dni');
    Column::string('grup_escolar', 'Grup escolar');
    Column::image('foto', 'Foto');
    Column::string('correu', 'Correu');
    Column::string('rol', 'Rol');
    Column::string('fecha_inscripcion', 'Data inscripció');
    Column::string('contrasenya', 'Contrasenya');
    Column::string('sexe', 'Sexe');
    Column::date('data_naixement', 'Data naixement');
    Column::string('idioma', 'Idioma');
    
})->form(function () {
    FormItem::text('nom', 'Nom');
    FormItem::text('cognoms', 'Cognoms');
    FormItem::text('dni', 'Dni');
    FormItem::text('grup_escolar', 'Grup escolar');
    //FormItem::text('foto', 'Foto');
    FormItem::image('foto', 'Foto');
    FormItem::text('correu', 'Correu');
    FormItem::text('rol', 'Rol');
    FormItem::timestamp('fecha_inscripcion', 'Data inscripció');
    FormItem::text('contrasenya', 'Contrasenya');
    FormItem::select('sexe', 'Sexe')->enum(['Home', 'Dona', 'NS/SC']);
    FormItem::date('data_naixement', 'Data naixement');
    FormItem::text('idioma', 'Idioma');
});

