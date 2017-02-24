<?php

namespace App\Http\Controllers;

use App\Models\GroupOption;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index()
    {
        $forms = Option::with('group')->paginate(25);
        $groups = GroupOption::all();

        return view('form_app.options.index', compact('forms', 'groups'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'value' => 'required',
            'group_option_id' => 'required',
        ]);

        Option::create($request->all());

        return redirect()->back();
    }

    public function edit($id)
    {
        $form = Option::find($id);

        $optionGroups = GroupOption::all();

        return view('form_app.options.edit', compact('form', 'optionGroups'));
    }

    public function update()
    {

    }
}
