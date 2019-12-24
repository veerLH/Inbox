<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class department extends Model
{
    //
    use SoftDeletes;

    protected $dates=['delete_at'];

    protected $fillable=
    [
        'name',
        'department_type',
    ];
    public function department()
    {
        return $this->belongsToMany('App\Inbox');
    }
}
