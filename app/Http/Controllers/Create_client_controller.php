<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Create_client_controller extends Controller
{
   public function __invoke(Request $request)
   {
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

   }
}
