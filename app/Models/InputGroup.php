<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputGroup extends Model
{
    use NodeTrait;
    
    public function inputs()
    {
        return $this->hasMany(Input::class, 'input_group_id','id');
    }
}
