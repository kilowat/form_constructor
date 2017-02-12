<?php

namespace App\Http\Controllers;

use App\Models\FormHasInputGroup;
use App\Models\Forms;
use App\Models\Input;
use App\Models\InputGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
        $forms = Forms::paginate(25);

        return view('form_app.pages.index', compact('forms'));
    }

    public function show($id, Input $inputs)
    {
        $title = Forms::find($id)->first()->name;
        $groupIds = FormHasInputGroup::where('forms_id', '=', $id)->get(['input_group_id'])->toArray();
        $groupIds = !empty($groupIds) ? $groupIds : [0];
        $nodes = InputGroup::whereIn('id',$groupIds)->with('inputs', 'inputs.options')->toTree();

        return view('form_app.form.show', compact('nodes', 'title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Forms::create($request->all());

        return redirect()->back();
    }
}
