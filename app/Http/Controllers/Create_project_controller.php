<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Create_project_controller extends Controller
{
    public function __invoke(Request $request)
    {
        $rules = [
            'name' => 'required|max:150|min:2',
            'description' => 'required|max:35|min:2',
            'statuses' => 'required', \Illuminate\Validation\Rule::in( ['planned', 'running', 'on hold', 'finished', 'cancel']),
        ];
        /** @var \Illuminate\Support\Facades\Validator */
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $project = new \App\project();
        $project->name = $request->post('name');
        $project->description = $request->post('description');
        $project->statuses = $request->post('statuses');
        $project->save();
        return response()->json($project, 201);
    }
}
