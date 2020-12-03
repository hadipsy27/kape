var course = new Vue({
  el: '#course',
  data: {
    courses: [],
    course: null,
    currentCourse: null,
    newProjectCourseId: {name: null, project_id: null},
    newProject: {name: null, project_id: null},
    tempCourseIndex: null,
    lastRequest: false,
    msg: {success: null, error: null}
  },

  ready: function(){
  	this.getCourses();
  },

  methods: {
  	getCourses: function(){
        $.get( window.baseurl + "/api/courses/true", function( results ) {
            course.courses = results.data;
            Vue.nextTick(function () {
                megaMenuInit();
            })
        }).fail(function(e){
            console.log( e );
        });
  	},
    showCreateForm: function(){
          this.msg.success = null;
          this.msg.error = null;
          $(".new-course").show();
          $(".new-course .first").focus();
      },
  	create: function(new_course, update){

		update = update || false;

		$.ajax({
		  type: 'POST',
		  url: window.baseurl + "/api/courses",
		  data: new_course,
		  error: function(e) {
		    var response = jQuery.parseJSON(e.responseText);
		  	$('.new-course .status-msg').text("")
		  								.removeClass('success-msg')
		  								.addClass("error-msg")
		  								.text(response.message);			    
		  	return false;
		  },

		  success: function(result){			  		  	
		  	$('.new-course .status-msg').text("")
		  								.removeClass('remove-msg')		  								
		  								.addClass("success-msg")
		  								.text(result.message);
						
			if (update == true){
                result.data.projects = [];
		  		course.courses.push(result.data);
				Vue.nextTick(function () {
					megaMenuInit();
				})		  		
		  	}

		  	new_course.name = null;
		  	new_course.phone_number = null;
		  	new_course.point_of_contact = null;
		  	new_course.email = null;
		  	new_course.teacher = null;
            $('.popup-form.new-course').find('input[type=text],textarea,select').filter(':visible:first').focus();
          }
		}); 
  	},
	startCourseEditMode: function(courseIndex){
        this.msg.success = null;
        this.msg.error = null;
        this.currentCourse = this.courses[courseIndex];
        this.currentCourse.position = courseIndex;

        $(".popup-form.update-course").show();
        $(".popup-form.update-course").find('input[type=text],textarea,select').filter(':visible:first').focus();
    },
    updateCourse: function(){

        var data = this.currentCourse;
        var id = data.id;
        data._method = "put";

        $.ajax({
            type: "POST",
            url: window.baseurl + "/api/courses/"+id,
            data: data,
            success: function(e){
                console.log(e);
                course.msg.success = e.message;
                course.msg.error = null;
            },
            error: function(e){
                var response = jQuery.parseJSON(e.responseText);
                course.msg.success = null;
                course.msg.error = response.message;
            }
        });
    },
    deleteCourse: function(currentCourse, courseIndex){
        this.currentCourse = currentCourse;

        showSheet();
        makePrompt(
            "Are you sure you want to delete : "+currentCourse.name+"?",
            "By deleting this you will loose all data associated with any course",
            "Not now", "Yes");

        $("#cancel-btn").click(function(){
            closePrompt();
        });

        $("#confirm-btn").click(function(){
            $.ajax({
                type: "POST",
                url: window.baseurl + "/api/courses/"+currentCourse.id,
                data: {_method: "delete"},
                success: function(){
                    course.courses.splice(courseIndex);
                    course.currentCourse = null;

                    $(".mega-menu .links a").removeClass("active").addClass("inactive");
                    $(".mega-menu .links a:first-child").removeClass("inactive").addClass("active");
                    $(".mega-menu .content .item").hide();
                    var id = "#" + $(".mega-menu .content div:first-child").show();

                    closePrompt();
                },
                error: function(){
                    course.currentCourse = null;
                    closePrompt();
                }
            });
        });
    },
    showNewProjectForm: function(courseId, courseIndex){

        this.msg.success = null;
        this.msg.error = null;
        this.newProject.course_id = courseId;
        this.tempCourseIndex = courseIndex;

        $(".popup-form.new-project").show();
        $(".popup-form.new-project .first").focus();
    },
  	createProject: function(){

		 $.ajax({
		   type: 'POST',
		   url: window.baseurl + "/api/projects",
		   data: course.newProject,
		   error: function(e) {
               var response = jQuery.parseJSON(e.responseText);
               course.msg.success = null;
               course.msg.error = response.message;
		   },
		    success: function(result){
                console.log(course.courses);
                console.log(result);
                course.courses[course.tempCourseIndex].projects.push(result.data);
                course.msg.success = result.message;
                course.msg.error = null;

                course.newProject.name = null;
                course.newProject.project_id = null;
                $('.popup-form.new-project').find('input[type=text],textarea,select').filter(':visible:first').focus();
            }
		 });
  	}
  }

});