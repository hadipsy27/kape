<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	protected $table = 'courses';
	protected $hidden = ['created_at','updated_at'];
	protected $fillable = [
		'user_id',
		'name',
		'clas',
		'semester',
		'group',
		'teacher'
	];

	/**
	 * Return the related projects for a given course
	 */
	public function projects() {
        return $this->hasMany('App\Project', 'course_id');
		}
		
		
	public function info(){
		return $this->hasMany('App\info', 'course_id');
	}
}