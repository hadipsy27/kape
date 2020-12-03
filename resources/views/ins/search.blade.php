@extends('templates/ins/master')

@section('content')
	<div class="row">
		<div class="col-xs-12 page-title-section">
			<h1 class="pull-left">Search</h1>
		</div>
		<div class="col-xs-12">
			<strong class="color-primary">
				{{ count($courses) + count($projects) + count($tasks) }}
			</strong>Results for: "<strong class="color-primary"><i>{{ $q }}</i></strong>"</h4><br><br>
		</div>
	</div>

	<div class="row">

		<div class="col-xs-12">
			{{-- courses --}}
			<div class="panel panel-default panel-list">
			  <div class="panel-heading">Courses ({{count($courses)}})</div>
			  <div class="panel-body">
			  	@if (count($courses) > 0)
				  	@foreach ($courses as $course)
				  		<a href="{{ route('courses', ['id' => $course->id]) }}">
				  			{{ $course->name }}
				  		</a>
				  	@endforeach			  			  	
				@else
				    <section class="info">
						<p class="dimmed">Sorry I couldn't find nothing....</p>	
				    </section>
			  	@endif
			  </div>
			</div>			

			{{-- projects --}}
			<div class="panel panel-default panel-list">
			  <div class="panel-heading">Tasks ({{count($projects)}})</div>
			  <div class="panel-body">
			  	@if (count($projects) > 0)
				  	@foreach ($projects as $project)
				  		<a href="{{ route('projects.show', ['id' => $project->id]) }}">
				  			{{ $project->name }}
				  			<span class="weight pull-right">w.{{ $project->totalWeight()}}</span>
				  		</a>
				  	@endforeach			  			  	
				@else
				    <section class="info">
						<p class="dimmed">Sorry I couldn't find nothing....</p>	
				    </section>
			  	@endif
			  </div>
			</div>

			{{-- tasks --}}
			<div class="panel panel-default panel-list">
			  {{-- <div class="panel-heading">Tasks ({{count($tasks)}})</div> --}}
			  <div class="panel-heading">Board ({{count($tasks)}})</div>
			  <div class="panel-body">
			  	@if (count($tasks) > 0)
				  	@foreach ($tasks as $task)
				  		<a href="{{ route('projects.show', ['id' => $task->project_id]) }}">
				  			{{ $task->name }}
				  			<span class="weight pull-right">w.{{ $task->weight}}</span>
				  		</a>
				  	@endforeach			  			  	
				@else
					  <section class="info">
						  <p class="dimmed">Sorry I couldn't find nothing....</p>
					  </section>
			  	@endif
			  </div>
			</div>			
	
		</div>
	</div>

@stop()