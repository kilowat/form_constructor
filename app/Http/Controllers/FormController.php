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
        $groups = InputGroup::all()->toTree();

        return view('form_app.pages.index', compact('forms', 'groups'));
    }

    public function show($id, Input $inputs)
    {
        $title = Forms::find($id)->name;
        $groupIds = FormHasInputGroup::where('forms_id', '=', $id)->get(['input_group_id'])->toArray();
        $groupIds = !empty($groupIds) ? $groupIds : [0];
        $nodes = InputGroup::whereIn('id',$groupIds)->with('inputs')->get();

        return view('form_app.form.show', compact('nodes', 'title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        DB::transaction(function() use($request){
            $formId = Forms::create($request->all())->id;
            $groupIds = $request->input('group_id');

            if(is_array($groupIds) && !empty($groupIds)){
                foreach ($groupIds as $groupId){
                    $pivot = new FormHasInputGroup();
                    $pivot->forms_id = $formId;
                    $pivot->input_group_id = $groupId;
                    $pivot->save();
                }
            }

        });

        return redirect()->back();
    }
}
