<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
  	public $primaryKey = 'id_room';
  	protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'rooms';
    protected $guarded = [];

}
