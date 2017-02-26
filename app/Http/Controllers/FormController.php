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

    public function edit($id)
    {
        $form = Forms::find($id);
        $groups = InputGroup::all()->toTree();
        $groupIds = FormHasInputGroup::where('forms_id', '=', $id)->get(['input_group_id'])->toArray();
        $groupIds = !empty($groupIds) ? $groupIds : [0];

        $groupIdsSelected = [];

        foreach ($groupIds as $groupId){
            $groupIdsSelected[] = $groupId['input_group_id'];
        }

        return view('form_app.form.edit', compact('form', 'groups', 'groupIdsSelected'));
    }

    public function show($id, Input $inputs)
    {
        $title = Forms::find($id)->name;

        $groupIds = FormHasInputGroup::where('forms_id', '=', $id)
            ->get(['input_group_id'])
            ->toArray();

        $groupIds = !empty($groupIds) ? $groupIds : [0];

        $nodes = InputGroup::whereIn('id',$groupIds)
            ->with(['inputs' => function($query){
                $query->orderBy('sort', 'asc');
            }])
            ->orderBy('sort', 'asc')
            ->get();

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

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        DB::transaction(function() use($request){

            $form = Forms::find($request->input('id'));
            $form->name = $request->input('name');
            $form->save();

            $groupIds = $request->input('group_id');

            if(is_array($groupIds) && !empty($groupIds)){
                FormHasInputGroup::where('forms_id', '=', $request->input('id'))->delete();
                foreach ($groupIds as $groupId){
                    $pivot = new FormHasInputGroup();
                    $pivot->forms_id = $request->input('id');
                    $pivot->input_group_id = $groupId;
                    $pivot->save();
                }
            }

        });

        return redirect()->back()->with('message', 'Сохранено');
    }
}
