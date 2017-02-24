<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Option;

class Input extends Model
{

    protected $fillable = ['name', 'label', 'input_group_id', 'group_option_id', 'input_type_code'];

    public function group()
    {
        return $this->belongsTo(InputGroup::class, 'input_group_id', 'id');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'group_option_id', 'group_option_id');
    }

    public function type()
    {
        return $this->hasOne(InputType::class, 'code', 'input_type_code');
    }

    public function groupOption()
    {
        return $this->hasOne(GroupOption::class, 'id', 'group_option_id');
    }
}
