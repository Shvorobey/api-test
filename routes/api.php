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

Route::get('/', function () {
    return response()->json(['welcome'=>['Welcome to the test case! '], 'current time'=>date('Y-m-d h:m:s')], 200);
    });

Route::post('/client', function (Request $request) {

    $rules = [
//        'id' => 'required|integer',
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
//    $client->id = $request->post('user_id');
    $client->first_name = $request->post('first_name');
    $client->last_name = $request->post('last_name');
    $client->email = $request->post('email');
    $client->password = $request->post('password');
    $client->save();
    return response()->json($client, 201);
});

Route::get('/clients', function () {
    return response()->json(\App\client::all(), 200);
    });














Route::get('/single_client/{id}', function ($id) {
    try {
        $client = new App\Http\Resources\PostResource (\App\client::findOrFail($id));
    } catch (\Exception $exception) {
        return response()->json(null, 404);
    }
    return response()->json($post, 200);
});