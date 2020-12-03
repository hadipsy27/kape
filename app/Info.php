<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['user_id','course_id','project_id'];

    public function course(){
        return $this->belongsTo('App\course');
    }

    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }
}
