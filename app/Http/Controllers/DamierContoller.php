<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DamierContoller extends Controller
{
    public function form(Request $request)
    {
        $data = [];
        if ($request->isMethod('POST')) {
            $line = $request->line;
            $column = $request->column;
            $data['line'] = $line;
            $data['column'] = $column;
        }
        return view('welcome', $data);
    }
}
