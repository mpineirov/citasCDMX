<?php

Auth::routes();

Route::namespace('Citas')->group(function () {
    Route::get('/', 'CitasController@bienvenida')->name('bienvenida');
    Route::get('registro/{tramite}', 'AgendarController@registro')->name('registro');
    Route::post('consulta', 'ConsultaController@consulta')->name('consulta');
    Route::get('reagendar/{id}', 'AgendarController@reagendar')->name('reagendar');
    Route::post('horario/{tramite}', 'AgendarController@horario')->name('horario');
    Route::post('guardar', 'AgendarController@guardar')->name('guardar');
    Route::get('comprobante/{id}', 'AgendarController@comprobante')->name('comprobante');
});

Route::namespace('Panel')->group(function () {
    Route::get('/home', 'PanelController@home')->name('home');
    Route::get('/listado', 'RevisorController@listado')->name('listado');
    Route::get('asistencia/{id}', 'RevisorController@asistencia')->name('informacion');
});

