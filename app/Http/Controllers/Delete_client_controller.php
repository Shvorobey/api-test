<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Delete_client_controller extends Controller
{
 public function __invoke(Request $request, $id)
 {
     try {
         $client = \App\client::findOrFail($id);
     } catch (\Exception $exception) {
         return response()->json(null, 404);
     }
     $client->delete();
     return response()->json(null, 204);
 }
}
