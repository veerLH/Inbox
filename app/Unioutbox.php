<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unioutbox extends Model
{
    //
   protected $fillable=
   [

    'department_id',
    'content',
    'filelink',
    'status',
    'recontent'
   ];

   public function department()
    {
        return $this->belongsTo('App\department');
    }
}
