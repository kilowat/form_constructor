<?php

namespace App\Http\Controllers;

use App\Models\Input;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index()
    {
        $forms = Input::paginate(50);

        return view('form_app.inputs.index', compact('forms'));
    }
}
