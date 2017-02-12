<?php

namespace App\Http\Controllers;

use App\Models\InputGroup;
use Illuminate\Http\Request;

class GroupInputController extends Controller
{
    public function index()
    {
        $forms = InputGroup::withDepth()->get();

        return view('form_app.group_input.index', compact('forms'));
    }

    public function store(Request $request, InputGroup $inputGroup)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $res = ['name' => $request->input('name')];
        $parent_id = $request->input('parent_id');
        if($parent_id){
            $group = new InputGroup($res);
            $parent = InputGroup::find($parent_id);
            $group->appendToNode($parent)->save();
        }else{
            InputGroup::create($res);
        }


        return redirect()->back();
    }
}
