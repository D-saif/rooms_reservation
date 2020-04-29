<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public $primaryKey = 'id_role';
    protected $table = 'roles';

    protected $guarded = [];
}
