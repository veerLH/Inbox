<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Outbox extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable=
    [

      'outboxid',
      'ministry_id',
      'sendoutdepartment',
      'sendoutuniversity',
      'department_id',
      'outbox_detail',
       'out_date',
      'content',
      'sendministry_id',
      'senddept',
      'senduniversity',
      'senddate',
      'sendby',
      'filelink',
    ];

    public function ministry()
    {
        return $this->belongsTo('App\ministry');
    }
    public function department()
    {
        return $this->belongsTo('App\department');
    }
    
}
