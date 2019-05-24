<?php


use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Главная
Route::get('/', '\\' . \App\Http\Controllers\index_controller::class)->name('index');

  //Создание клиента
Route::post('/clients', '\\' . \App\Http\Controllers\Create_client_controller::class)->name('create_client');


//Получение клиента
Route::get('/clients/{id}', '\\' . \App\Http\Controllers\Get_client_controller::class)->name('get_client');

//Получение всех клиентов
Route::get('/clients', '\\' . \App\Http\Controllers\Get_clients_controller::class)->name('get_clients');


//Удаление клиента
Route::delete('/clients/{id}', '\\' . \App\Http\Controllers\Delete_client_controller::class)->name('delete_clients');


//Обновление клиента
Route::put('/clients/{id}', '\\' . \App\Http\Controllers\Update_client_controller::class)->name('update_clients');

//Создание проекта
Route::post('/projects', '\\' . \App\Http\Controllers\Create_project_controller::class)->name('create_project');

//Получение проекта
Route::get('/projects/{id}', '\\' . \App\Http\Controllers\Get_project_controller::class)->name('get_project');

//Получение всех проектов
Route::get('/projects', '\\' . \App\Http\Controllers\Get_projects_controller::class)->name('get_projects');

//Удаление проекта
Route::delete('/projects/{id}', '\\' . \App\Http\Controllers\Delete_project_controller::class)->name('delete_projects');


//Обновление проекта
Route::put('/projects/{id}', '\\' . \App\Http\Controllers\Update_project_controller::class)->name('update_projects');

