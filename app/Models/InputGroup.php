<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class InputGroup extends Model
{
    use NodeTrait;

    protected $fillable = ['name', 'parent_id', 'sort'];

    public function inputs()
    {
        return $this->hasMany(Input::class, 'input_group_id','id');
    }

    public function forms()
    {
        return $this->belongsToMany(Forms::class, 'forms_has_input_groups', 'forms_id', 'input_group_id');
    }
}
