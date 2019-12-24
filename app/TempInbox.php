<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempInbox extends Model
{
    //
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
    ];
    public function Tododepartment()
    {
        return $this->hasOne('App\Tododepartment');
    }
    public function ministry()
    {
        return $this->belongsTo('App\ministry');
    }
}
