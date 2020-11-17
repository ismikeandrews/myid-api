<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'cidadao'], function () use ($router) {
    $router->get('/', 'CidadaoController@index');
    $router->get('/{codCidadao}', 'CidadaoController@show');
    $router->post('/', 'CidadaoController@store');
    $router->put('/{codCidadao}', 'CidadaoController@update');
    $router->delete('/{codCidadao}', 'CidadaoController@destroy');

    $router->get('/documento/', 'DocumentoCidadaoController@index');
    $router->get('/documento/{codDocumentoCidadao}', 'DocumentoCidadaoController@show');
    $router->post('/documento/', 'DocumentoCidadaoController@store');
    $router->delete('/documento/{codDocumentoCidadao}', 'DocumentoCidadaoController@destroy');
});

$router->group(['prefix' => 'consultor'], function () use ($router) {
    $router->get('/', 'ConsultorController@index');
    $router->get('/{codConsultor}', 'ConsultorController@show');
    $router->post('/', 'ConsultorController@store');
    $router->put('/{codConsultor}', 'ConsultorController@update');
    $router->delete('/{codConsultor}', 'ConsultorController@destroy');

    $router->get('/documento/', 'ConsultorDocumentoController@index');
    $router->get('/documento/{codConsultorDocumento}', 'ConsultorDocumentoController@show');
    $router->post('/documento/', 'ConsultorDocumentoController@store');
    $router->delete('/documento/{codConsultorDocumento}', 'ConsultorDocumentoController@destroy');

    $router->get('/tipo/', 'TipoConsultorController@index');
    $router->get('/tipo/{codTipoConsultor}', 'TipoConsultorController@show');
    $router->post('/tipo/', 'TipoConsultorController@store');
    $router->put('/tipo/{codTipoConsultor}', 'TipoConsultorController@update');
    $router->delete('/tipo/{codTipoConsultor}', 'TipoConsultorController@destroy');
});

$router->group(['prefix' => 'documento'], function () use ($router) {
    $router->get('/', 'DocumentoController@index');
    $router->get('/{codDocumento}', 'DocumentoController@show');
    $router->post('/', 'DocumentoController@store');
    $router->put('/{codDocumento}', 'DocumentoController@update');
    $router->delete('/{codDocumento}', 'DocumentoController@destroy');

    $router->get('/campo/', 'DocumentoCampoController@index');
    $router->get('/campo/{codDocumentoCampo}', 'DocumentoCampoController@show');
    $router->post('/campo/', 'DocumentoCampoController@store');
    $router->put('/campo/{codDocumentoCampo}', 'DocumentoCampoController@update');
    $router->delete('/campo/{codDocumentoCampo}', 'DocumentoController@destroy');

    $router->get('/campo/opcao/', 'DocumentoCampoOpcaoController@index');
    $router->get('/campo/opcao/{codDocumentoCampoOpcao}', 'DocumentoCampoOpcaoController@show');
    $router->post('/campo/opcao/', 'DocumentoCampoOpcaoController@store');
    $router->put('/campo/opcao/{codDocumentoCampoOpcao}', 'DocumentoCampoOpcaoController@update');
    $router->delete('/campo/opcao/{codDocumentoCampoOpcao}', 'DocumentoController@destroy');
});

$router->group(['prefix' => 'orgao-emissor'], function () use ($router) {
    $router->get('/', 'OrgaoEmissorController@index');
    $router->get('/{codOrgaoEmissor}', 'OrgaoEmissorController@show');
    $router->post('/', 'OrgaoEmissorController@store');
    $router->put('/{codOrgaoEmissor}', 'OrgaoEmissorController@update');
    $router->delete('/{codOrgaoEmissor}', 'OrgaoEmissorController@destroy');

    $router->get('/funcionario/', 'FuncionarioController@index');
    $router->get('/funcionario/{codFuncionario}', 'FuncionarioController@show');
    $router->post('/funcionario/', 'FuncionarioController@store');
    $router->put('/funcionario/{codFuncionario}', 'FuncionarioController@update');
    $router->delete('/funcionario/{codFuncionario}', 'FuncionarioController@destroy');
});

$router->group(['prefix' => 'usuario'], function () use ($router) {
    $router->get('/', 'UsuarioController@index');
    $router->get('/{codUsuario}', 'UsuarioController@show');
    $router->post('/', 'UsuarioController@store');
    $router->put('/{codUsuario}', 'UsuarioController@update');
    $router->delete('/{codUsuario}', 'UsuarioController@destroy');

    $router->get('/tipo/', 'TipoUsuarioController@index');
    $router->get('/tipo/{codTipoUsuario}', 'TipoUsuarioController@show');
    $router->post('/tipo/', 'TipoUsuarioController@store');
    $router->put('/tipo/{codTipoUsuario}', 'TipoUsuarioController@update');
    $router->delete('/tipo/{codTipoUsuario}', 'TipoUsuarioController@destroy');
});
