<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Completestatus extends Model
{
    //
    protected $fillable=
    [
        'content',
        'feedback',
        'inbox_id',
        'department_id',
        'status',
        'recontent',
        'agreestatus',
        'filelink'
    ];

    public function Inbox()
    {
        return $this->belongsTo('App\Inbox');
    }
    public function department()
    {
        return $this->belongsTo('App\department');
    }
}
