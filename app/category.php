<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';

    protected $thePrimaryKey = 'id';

    protected $fillable = ['parent_id', ];
}
