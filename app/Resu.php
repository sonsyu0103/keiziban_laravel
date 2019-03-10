<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resu extends Model
{
    protected $fileable=[
        'name',
        'mess',
        'sure_id',
    ];

}

