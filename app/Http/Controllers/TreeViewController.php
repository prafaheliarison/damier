<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TreeViewController extends Controller
{
    public function form(Request $request)
    {
        $data = [];
        if ($request->isMethod('POST')) {
            $file = $request->file('json')->getClientOriginalName();
            $request->file('json')->move('json', $file);
            $data['file'] = $file;
        }
        return view('tree-view', $data);
    }
}
