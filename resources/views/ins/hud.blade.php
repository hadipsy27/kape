@extends('templates/ins/master')

@section('content')
	<div class="row" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml"
		 xmlns:v-on="http://www.w3.org/1999/xhtml">
		<div class="col-xs-12 page-title-section">
			<h1 class="pull-left">Home</h1>
		</div>
	</div>

	<div id="hud" class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="jumbotron text-center">
                <p class="dim">Courses</p>
                <h1>@{{ courses }}</h1>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="jumbotron text-center">
                <p class="dim">Task</p>
                <h1>@{{ projects.length }}</h1>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="jumbotron text-center">
                <p class="dim">Board</p>
                <h1>@{{ tasks }}</h1>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="project-list-container">
                <template v-if="projects.length > 0">
                    <h4>My Task</h4>
                    <input placeholder="Search tasks" type="text" class="form-control" v-model="my_project_text">
                    <hr>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Progress</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="project in projects | filterBy my_project_text">
                            <td>@{{ $index + 1 }}</td>
                            <td><a href="{{ route('projects.show', ['id' => '']) }}/@{{ project.id }}">@{{ project.name }}</a></td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:@{{ project.completedWeight / project.totalWeight * 100 }}%;">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </template>

                <template v-if="projects.length == 0">
                    <p class="alert alert-warning">
                        Your Tasks will be listed here once you create some.
                        Create a new task within the <a href="{{ route('courses') }}">Task</a> page.
                    </p>
                </template>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="project-list-container">
                <template v-if="sharedProjects.length > 0">
                    <h4>Tasks Shared With Me</h4>
                    <input placeholder="Search Tasks" type="text" class="form-control" v-model="my_sproject_text">
                    <hr>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Progress</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="project in sharedProjects | filterBy my_sproject_text">
                            <td>@{{ $index + 1 }}</td>
                            <td><a href="{{ route('projects.show', ['id' => '']) }}/@{{ project.id }}">@{{ project.name }}</a></td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:@{{ project.completedWeight / project.totalWeight * 100 }}%;">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </template>

                <template v-if="sharedProjects.length == 0">
                    <p class="alert alert-warning">
                        Tasks that you have been invited to will show up here. Currently
                        you have not been invited to any Task.
                    </p>
                </template>
            </div>
        </div>

    </div>

	<div id="course" class="popup-form new-course">
		<header>
			<p class="pull-left">New Course</p>
			<div class="actions pull-right">
				<i title="Minimze " class="ion-minus-round"></i>
				<i title="Close" class="ion-close-round"></i>
			</div>
			<div class="clearfix"></div>
		</header>
		<section>
			<form>
				<span class="status-msg"></span>
				<input v-model="course.name" placeholder="Course Name" type="text" class="form-control">
				<input v-model="course.email" placeholder="Email" type="text" class="form-control">
				<input v-model="course.point_of_contact" placeholder="Point Of Contact" type="text" class="form-control">
				<input v-model="course.phone_number" placeholder="Contact Number" type="text"class="form-control">
			</form>
		</section>
		<footer>
			<a v-on:click="create(course)" href="" class="btn btn-primary pull-right">Save</a>
			<div class="clearfix"></div>
		</footer>
	</div>
    <script src="{{ asset('assets/js/controllers/hud.js') }}"></script>

@stop()