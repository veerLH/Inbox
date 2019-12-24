<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Inbox extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable=
    [
     'inboxid',
     'receive_date',
     'ministry_id',
     'senddept',
     'senduniversity',
     'sendbranch',
     'inbox_detail',
     'inbox_no',
     'out_date',
     'receiver',
     'content',
     'filelink',
    'department_id'
    ];


    public function Tododepartment()
    {
            return $this->hasOne('App\Tododepartment');
    }

    public function ministry()
    {
        return $this->belongsTo('App\ministry');
    }

    public function department()
    {
        return $this->belongsTo('App\department');
    }

}
