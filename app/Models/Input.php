<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Option;

class Input extends Model
{
    public function options()
    {
        return $this->hasMany(Option::class, 'group_option_id', 'group_option_id');
    }
}
