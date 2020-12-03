<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Course;
use App\Project;
use App\Task;
use App\Credential;

class CoursesController extends BaseController {

	// Go to Courses index page
	public function index()
	{	
		return View::make('ins/courses/index')->with("pTitle", "Courses");
	}

    // Get all courses for the given user
    public function getAllUserCourses($withWeight = false){
        $courses = Course::with('projects')->where('user_id',Auth::id())->get();

        if (count($courses) === 0) {
            return $this->setStatusCode(400)->makeResponse('Could not find courses');
        }

        // Get each project total weight if needed
        if($withWeight == true){
            if($courses) {
                foreach ($courses as $course) {
                    if($course->projects){
                        foreach($course->projects as $project){
                            $weight = Project::find($project->id)->tasks()->where('state','!=','complete')->sum('weight');
                            $project["weight"] = $weight;
                        }
                    }
                }
            }
        }
        return $this->setStatusCode(200)->makeResponse('Courses retrieved successfully',$courses->toArray());
    }

    // Insert a new course into the database
    public function storeCourse(){

        if (  strlen(trim(Input::get('name'))) == 0) {
            return $this->setStatusCode(400)->makeResponse('Name field is required');
        }

        Input::merge(array('user_id' => Auth::id()));
        Course::create(Input::all());
        $id = \DB::getPdo()->lastInsertId();

        return $this->setStatusCode(200)->makeResponse('Course created successfully', Course::find($id));
    }

    // Update the given course
    public function updateCourse($id){
        if (count(Input::all()) <= 1) {
            return $this->setStatusCode(406)->makeResponse('No information provided to update course');
        }

        if( strlen(trim(Input::get('name'))) === 0 ){
            return $this->setStatusCode(406)->makeResponse('The course name is required');
        }

        if (!Course::find($id)) {
            return $this->setStatusCode(404)->makeResponse('Course not found');
        }

        $input = Input::all();
        unset($input['_method']);

        Course::find($id)->update($input);

        return $this->setStatusCode(200)->makeResponse('The course has been updated');
    }

    // Remove the given course and all tasks, projects and credentials attached to it
    public function removeCourse($id){
        if (!Course::find($id)) {
            return $this->setStatusCode(400)->makeResponse('Could not find the course');
        }

        $course 	= 	Course::find($id);

        // delete all related tasks and credentials
        foreach ($course->projects as $p) {
            Task::where('project_id', $p->id)->delete();
            Credential::where('project_id', $p->id)->delete();
            $p->members()->detach();
        }

        // delete projects
        Project::where("course_id", $id)->delete();
        $course->delete();
        return $this->setStatusCode(200)->makeResponse('Course deleted successfully');
    }

}