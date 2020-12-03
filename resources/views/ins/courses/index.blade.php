@extends('templates/ins/master')

@section('content')
    
<div id="course">
    <div class="row">
        <div class="col-xs-12 page-title-section">
            <h1 class="pull-left">Courses</h1>
            <a v-on:click="showCreateForm()" class="btn btn-primary pull-right" title="Create new course">+ New Course</a>
            <div class="clearfix"></div>
        </div>
    </div>

    <template v-if="courses.length != 0">
        <div class="row">
            <div class="col-xs-12">
                <div class="mega-menu">
                    <div class="links">
                        <a v-for="course in courses" data-id="course_@{{course.id}}" href="">
                            @{{course.name}}
                        </a>
                    </div>
                    <div class="content">
                        <div v-for="course in courses" class="item" id="course_@{{course.id}}" title="Edit course">
                            <header>
                                <div class="course course-info-@{{$index}} page-title-section">
                                    <h2 class="pull-left">@{{course.name}} <a v-on:click="startCourseEditMode($index)" class="show-on-hover btn btn-default" title="Edit Course"><i class="ion-edit"></i></a></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <p><label>Group: </label> @{{course.group}}</p>
                                    <p><label>Class: </label> @{{course.clas}}</p>
                                    <p><label>Semester: </label> @{{course.semester}}</a></p>
                                    <p><label>Teacher: </label> @{{course.teacher}}</a></p>
                                </div>
                            </header>
                            <hr>
                            <span v-on:click="showNewProjectForm(course.id, $index)" title="Create new task" class="btn btn-default pull-right">New Task</span>
                            <template v-if="course.projects.length > 0">
                                <h4>Tasks</h4>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Name</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="project in course.projects">
                                        <td>@{{ $index + 1 }}</td>
                                        <td><a href="{{ route('projects.show', ['id' => '']) }}/@{{ project.id }}">@{{ project.name }}</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </template>
                            <br>
                            <div class="clearfix"></div>
                            <hr><br><br>
                            <span v-on:click="deleteCourse(course, $index)" class="btn btn-danger pull-right">Delete @{{ course.name }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </template>

    <template v-if="courses.length == 0">
        <div class="clearfix"></div>
        <p class="alert alert-warning">
            Your Task is Empty
            Create a new course <a v-on:click="showCreateForm()">now</a>.
        </p>
    </template>

	{{-- FORMS --}}
	<div class="popup-form new-course">
		<header>
			<p class="pull-left">New Courses</p>
			<div class="actions pull-right">
				<i title="Minimze "class="ion-minus-round"></i>
				<i title="Close" class="ion-close-round"></i>
			</div>
			<div class="clearfix"></div>
		</header>
		<section>
			<form>
				<span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
				<span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
				<input v-model="Course.name" placeholder="Course Name" type="text" class="form-control first">
				<input v-model="Course.semester" placeholder="Semester" type="text" class="form-control">
				<input v-model="Course.group" placeholder="Group Number" type="text" class="form-control">
				<input v-model="Course.clas" placeholder="Class Number" type="text"class="form-control">
				<input v-model="Course.teacher" placeholder="Teacher Name" type="text"class="form-control">
			</form>
		</section>
		<footer>
			<a v-on:click="create(Course,true)" class="btn btn-primary pull-right">Save</a>
			<div class="clearfix"></div>
		</footer>
	</div>
	<div class="popup-form new-project">
		<header>
			<p class="pull-left">New Task</p>
			<div class="actions pull-right">
				<i title="Minimze "class="ion-minus-round"></i>
				<i title="Close" class="ion-close-round"></i>
			</div>
			<div class="clearfix"></div>
		</header>
		<section>
			<form>
                <span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
                <span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
				<input v-model="newProject.name" placeholder="Name" type="text" class="form-control first">
			</form>
		</section>
		<footer>
			<a v-on:click="createProject(true)" class="btn btn-primary pull-right">Save</a>
			<div class="clearfix"></div>
		</footer>
	</div>
	<div style="z-index: 20" class="popup-form update-course">
        <header>
            <p class="pull-left">Update Course</p>
            <div class="actions pull-right">
                <i title="Minimze "class="ion-minus-round"></i>
                <i title="Close" class="ion-close-round"></i>
            </div>
            <div class="clearfix"></div>
        </header>
        <section>
            <form>
                <span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
                <span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
                <span class="status-msg"></span>
                <input v-model="currentCourse.name" placeholder="Course Name" type="text" class="form-control first">
                <input v-model="currentCourse.semester" placeholder="Semester" type="text" class="form-control">
                <input v-model="currentCourse.group" placeholder="Group name" type="text" class="form-control">
                <input v-model="currentCourse.clas" placeholder="Classes" type="text"class="form-control">
                <input v-model="currentCourse.teacher" placeholder="Teacher" type="text"class="form-control">
            </form>
        </section>
        <footer>
            <a v-on:click="updateCourse()" class="btn btn-primary pull-right">Update</a>
            <div class="clearfix"></div>
        </footer>
	</div>
</div>


	<script src="{{ asset('assets/js/controllers/course.js') }}"></script>
@stop()