<?php

use App\Http\Resources\PostResource;
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
Route::get('/', function () {
    return response()->json(['welcome'=>['Welcome to the test case! '], 'current time'=>date('Y-m-d h:m:s')], 200);
    });

//Создание клиента
Route::post('/clients', function (Request $request) {
    $rules = [
        'first_name' => 'required|max:35|min:2',
        'last_name' => 'required|max:35|min:2',
        'email' => 'required|max:35|min:3| email| unique:clients,email',
        'password' => 'required|max:36|min:3',
    ];
    /** @var \Illuminate\Support\Facades\Validator */
    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }
    $client = new \App\client();
    $client->first_name = $request->post('first_name');
    $client->last_name = $request->post('last_name');
    $client->email = $request->post('email');
    $client->password = $request->post('password');
    $client->save();
    return response()->json($client, 201);
});

//Получение клиента
Route::get('/clients/{id}', function ($id) {
    return response()->json(\App\client::find($id), 200);
});

//Получение всех клиентов
Route::get('/clients', function () {
    return response()->json(\App\client::all(), 200);
    });

//Удаление клиента
Route::delete('/clients/{id}', function (Request $request, $id) {
    try {
        $client = \App\client::findOrFail($id);
    } catch (\Exception $exception) {
        return response()->json(null, 404);
    }
//    $client = \App\client::find($id);
    $client->delete();
    return response()->json(null, 204);
});


//Обновление клиента
Route::put('/clients/{id}', function (Request $request, $id) {
    try {
        $client = \App\client::findOrFail($id);
    } catch (\Exception $exception) {
        return response()->json(null, 404);
    }
    $rules = [
        'first_name' => 'required|max:35|min:2',
        'last_name' => 'required|max:35|min:2',
        'email' => 'required|max:35|min:3| email| unique:clients,email',
        'password' => 'required|max:36|min:3',
    ];
    /** @var \Illuminate\Support\Facades\Validator */
    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }
    $client = new \App\client();
    $client->first_name = $request->post('first_name');
    $client->last_name = $request->post('last_name');
    $client->email = $request->post('email');
    $client->password = $request->post('password');
    $client->save();
    return response()->json($client, 201);
});
