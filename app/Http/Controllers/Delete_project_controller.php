<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Delete_project_controller extends Controller
{
  public function __invoke(Request $request, $id)
  {
      try {
          $project = \App\project::findOrFail($id);
      } catch (\Exception $exception) {
          return response()->json(null, 404);
      }
      $project->delete();
      return response()->json(null, 204);
  }
}
