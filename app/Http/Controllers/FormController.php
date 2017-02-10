<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use App\Models\Input;
use App\Models\InputGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
        $forms = Forms::all();

        return view('form_app.pages.index', compact('forms'));
    }

    public function show($id, Input $inputs)
    {
        $nodes = InputGroup::with('inputs')->get()->toTree();

        return view('form_app.form.show', compact('nodes'));
    }
}
