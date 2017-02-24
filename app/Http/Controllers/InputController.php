<?php

namespace App\Http\Controllers;

use App\Models\GroupOption;
use App\Models\Input;
use App\Models\InputGroup;
use App\Models\InputType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class InputController extends Controller
{
    public function index()
    {
        $forms = Input::with('group')->paginate(50);

        $groups = InputGroup::all()->toTree();

        $typeOptions = InputType::all();

        $optionGroups = GroupOption::all();

        return view('form_app.inputs.index', compact('forms', 'groups', 'typeOptions', 'optionGroups'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'label' => 'required',
            'input_type_code' => 'required',
        ]);

        Input::create($request->all());

        return redirect()->back();
    }

    public function edit($id)
    {
        $form = Input::find($id);

        $groups = InputGroup::all()->toTree();

        $typeOptions = InputType::all();

        $optionGroups = GroupOption::all();

        return view('form_app.inputs.edit', compact('form', 'groups', 'typeOptions', 'optionGroups'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'label' => 'required',
            'input_type_code' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'label'=> $request->input('label'),
            'input_group_id' => $request->input('input_group_id'),
            'group_option_id' => $request->input('group_option_id'),
            'input_type_code' => $request->input('input_type_code'),
            'updated_at' => Carbon::now(),
        ];

        Input::where('id', $request->input('id'))
            ->update($data);

        return redirect()->back()->with('message', 'Сохранено');
    }
}
