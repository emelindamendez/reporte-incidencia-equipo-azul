<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:140',
                'system_name' => 'required|in:sac,sentirse en casa,website,postventa',
                'description' => 'required|max:500',
                'priority' => 'required|in:baja,media,alta',
                'file' => 'required|mimes:png,jpg',
            ]
        );
        
        Form::create($request->only( 'name', 'system_name', 'description', 'priority', 'file'));

        return response()->json(['message' => 'Incidente enviado.'], 201);
    }
}
