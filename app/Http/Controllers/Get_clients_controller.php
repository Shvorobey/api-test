<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Get_clients_controller extends Controller
{
 public function __invoke()
 {
     return response()->json(\App\client::all(), 200);
 }
}
