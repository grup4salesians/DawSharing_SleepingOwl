<?php

Admin::model(\Usuari::Class)->title('Usuaris')->columns(function () {
    /* Column::{type}('{field name}', '{column label}') */
    Column::string('nom', 'Nom');
    Column::string('cognoms', 'Cognoms');
    Column::string('dni', 'Dni');
    Column::string('grup_escolar', 'Grup escolar');
    Column::string('foto', 'Foto');
    Column::string('correu', 'Correu');
    Column::string('rol', 'Rol');
    Column::string('fehca_inscripcion', 'Data inscripció');
    Column::string('contrasenya', 'Contrasenya');
    Column::string('sexe', 'Sexe');
    Column::string('data_naixement', 'Data naixement');
    Column::string('idioma', 'Idioma');
    
})->form(function () {
    FormItem::text('nom', 'Nom');
    FormItem::text('cognoms', 'Cognoms');
    FormItem::text('dni', 'Dni');
    FormItem::text('grup_escolar', 'Grup escolar');
    FormItem::text('foto', 'Foto');
    FormItem::text('correu', 'Correu');
    FormItem::text('rol', 'Rol');
    FormItem::text('fehca_inscripcion', 'Data inscripció');
    FormItem::text('contrasenya', 'Contrasenya');
    FormItem::text('sexe', 'Sexe');
    FormItem::text('data_naixement', 'Data naixement');
    FormItem::text('idioma', 'Idioma');
});

