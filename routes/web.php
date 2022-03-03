<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','UserController@index'); // Passando uma rota e informando o que quero acessar por meio do controller. Está na views > User > index.php

Route::get('/user/novo','UserController@create'); // Mostrar um formulário para cadastro de usuários. Está na views > User > create.php
Route::post('/user/store','UserController@store'); // Receber os dados que foram cadastrados e interagir com o banco de dados. Está na views > User > show.php

Route::get('/user/{id}', 'UserController@show'); // Mostrar individualmente cada objeto/usuário e as informações contidas em show.php.

Route::get('/user/editar/{id}','UserController@edit'); // Traz o formulário de editar um registro de usuário. Está na views > User > edit.php
Route::put('/user/update/{id}','UserController@update'); // Executar o comando update para atualizar dentro do banco as informações que foram modificadas.
// O método é PUT porque se trata de uma edição.

Route::get('/user/remover/{id}','UserController@destroy'); // Remove o registro dentro do banco de dados.
Route::get('/token', function () {
    return csrf_token();
});
