<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['name', 'value', 'group_option_id'];

    public function group()
    {
        return $this->hasOne(GroupOption::class, 'id', 'group_option_id');
    }
}
