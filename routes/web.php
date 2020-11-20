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
    $router->post('/', 'CidadaoController@store');

    $router->get('/documento/', 'DocumentoCidadaoController@index');
    $router->post('/documento/', 'DocumentoCidadaoController@store');

    $router->get('/{codCidadao}', 'CidadaoController@show');
    $router->put('/{codCidadao}', 'CidadaoController@update');
    $router->delete('/{codCidadao}', 'CidadaoController@destroy');

    $router->get('/documento/{codDocumentoCidadao}', 'DocumentoCidadaoController@show');
    $router->delete('/documento/{codDocumentoCidadao}', 'DocumentoCidadaoController@destroy');
});

$router->group(['prefix' => 'consultor'], function () use ($router) {
    $router->get('/', 'ConsultorController@index');
    $router->post('/', 'ConsultorController@store');

    $router->get('/documento/', 'ConsultorDocumentoController@index');
    $router->post('/documento/', 'ConsultorDocumentoController@store');

    $router->get('/tipo/', 'TipoConsultorController@index');
    $router->post('/tipo/', 'TipoConsultorController@store');

    $router->get('/{codConsultor}', 'ConsultorController@show');
    $router->put('/{codConsultor}', 'ConsultorController@update');
    $router->delete('/{codConsultor}', 'ConsultorController@destroy');

    $router->get('/documento/{codConsultorDocumento}', 'ConsultorDocumentoController@show');
    $router->delete('/documento/{codConsultorDocumento}', 'ConsultorDocumentoController@destroy');

    $router->get('/tipo/{codTipoConsultor}', 'TipoConsultorController@show');
    $router->put('/tipo/{codTipoConsultor}', 'TipoConsultorController@update');
    $router->delete('/tipo/{codTipoConsultor}', 'TipoConsultorController@destroy');
});

$router->group(['prefix' => 'documento'], function () use ($router) {
    $router->get('/', 'DocumentoController@index');
    $router->post('/', 'DocumentoController@store');
    
    $router->get('/campo/', 'DocumentoCampoController@index');
    $router->post('/campo/', 'DocumentoCampoController@store');

    $router->get('/campo/opcao/', 'DocumentoCampoOpcaoController@index');
    $router->post('/campo/opcao/', 'DocumentoCampoOpcaoController@store');

    $router->get('/{codDocumento}', 'DocumentoController@show');
    $router->put('/{codDocumento}', 'DocumentoController@update');
    $router->delete('/{codDocumento}', 'DocumentoController@destroy');

    $router->get('/campo/{codDocumentoCampo}', 'DocumentoCampoController@show');
    $router->put('/campo/{codDocumentoCampo}', 'DocumentoCampoController@update');
    $router->delete('/campo/{codDocumentoCampo}', 'DocumentoController@destroy');

    $router->get('/campo/opcao/{codDocumentoCampoOpcao}', 'DocumentoCampoOpcaoController@show');
    $router->put('/campo/opcao/{codDocumentoCampoOpcao}', 'DocumentoCampoOpcaoController@update');
    $router->delete('/campo/opcao/{codDocumentoCampoOpcao}', 'DocumentoController@destroy');
});

$router->group(['prefix' => 'orgao-emissor'], function () use ($router) {
    $router->get('/', 'OrgaoEmissorController@index');
    $router->post('/', 'OrgaoEmissorController@store');

    $router->get('/funcionario/', 'FuncionarioController@index');
    $router->post('/funcionario/', 'FuncionarioController@store');

    $router->get('/{codOrgaoEmissor}', 'OrgaoEmissorController@show');
    $router->put('/{codOrgaoEmissor}', 'OrgaoEmissorController@update');
    $router->delete('/{codOrgaoEmissor}', 'OrgaoEmissorController@destroy');

    $router->get('/funcionario/{codFuncionario}', 'FuncionarioController@show');
    $router->put('/funcionario/{codFuncionario}', 'FuncionarioController@update');
    $router->delete('/funcionario/{codFuncionario}', 'FuncionarioController@destroy');
});

$router->group(['prefix' => 'usuario'], function () use ($router) {
    $router->get('/', 'UsuarioController@index');
    $router->post('/', 'UsuarioController@store');
    
    $router->get('/tipo/', 'TipoUsuarioController@index');
    $router->post('/tipo/', 'TipoUsuarioController@store');
    
    $router->get('/{codUsuario}', 'UsuarioController@show');
    $router->put('/{codUsuario}', 'UsuarioController@update');
    $router->delete('/{codUsuario}', 'UsuarioController@destroy');

    $router->get('/tipo/{codTipoUsuario}', 'TipoUsuarioController@show');
    $router->put('/tipo/{codTipoUsuario}', 'TipoUsuarioController@update');
    $router->delete('/tipo/{codTipoUsuario}', 'TipoUsuarioController@destroy');
});
