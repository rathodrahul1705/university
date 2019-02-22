@include('inc.navbar')


<style type="text/css">
	#myCarousel {
	    /*width: 100%;*/
	    margin: 0 auto;
	}
	img {
		width: 100%;
		height: 450px !important;
	}
</style>
<div class="container">
	<div class="row">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner">
		    <div class="item active">
		      <img src="{{ url('assets\imgs\sports\pubg\pubg1.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\pubg\pubg2.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\pubg\pubg3.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\pubg\pubg4.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\pubg\pubg5.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\pubg\pubg6.png') }}" alt="New York">
		    </div>
		  </div>
		  

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>		
	</div>



	<!-- ------------pubg form------------------ -->


	<div class="container">
	<div class="row col-sm-6 col-sm-offset-2">
		<center><h1>PUBG MOBILE REGISTRATIONS</h1></center>

<!-- 		@if(count($errors) > 0)
		    @foreach($errors->all() as $error)
		      <div class="alert alert-danger">
		      {{$error}}
		      </div>
		    @endforeach
		  @endif -->
<div class="errors">
	
</div>


		<!-- <form class="form-horizontal"  action="{{url('/pubg_details')}}" method="post"> -->
			<!-- {{ csrf_field()}} -->
			<form class="form-horizontal" id="register_form">
		  <div class="form-group">
		    <label class="control-label col-sm-2">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="email">Email:</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2">mobile:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" maxlength="10">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Department:</label>
		    <div class="col-sm-10"> 
		      <!-- <input type="text" class="form-control" placeholder="Enter Department"> -->
		      <select class="form-control" name="Department">
		      	<option>---Select---</option>
		      	<option>BE</option>
		      	<option>ME</option>
		      	<option>BSC IT</option>
		      	<option>BSC PLAIN</option>
		      	<option>BSC CS</option>
		      </select>
		    </div>
		  </div>

<div class="participants_section">
	
  			<center><h3>Enter number of participates</h3></center>
  			<div class="form-group">
			    <label class="control-label col-sm-2" for="pwd">participate1:</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="mobile" placeholder="Enter name" name="participate1">
			    </div>
			</div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">participate2:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" id="mobile" placeholder="Enter name" name="participate2">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">participate3:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" id="mobile" placeholder="Enter name" name="participate3">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">participate4:</label>
		    <div class="col-sm-10"> 
		      <input type="text" class="form-control" id="mobile" placeholder="Enter name" name="participate4">
		    </div>
		  </div>
		</div>
	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-2">
	      <button type="submit" class="btn btn-success">Submit</button>
	    </div>
	    <div class="col-sm-offset-2">
	      <button type="button" class="btn btn-primary" id="add_participants_btn">Add Participants</button>
	    </div>
	  </div>
		</form>		
	</div>	
</div>


    <script>
      $(function() {
        // $('#loading_icon').hide();
        $('#register_form').on('submit', function(e) {
          // $('#loading_icon').show();
          e.preventDefault();
          $.ajax({
            url: '{{url("/pubg_details")}}',
            headers:{
               'X-CSRF-TOKEN': "{{ csrf_token() }}"
             },   
            method: 'POST',
            type: 'JSON',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(obj) {
            	alert('success')
            },
            error: function(obj) {																						
              // alert(obj)
              $(".alert-danger").remove();
              console.log(obj.responseJSON.errors)
              $.each(obj.responseJSON.errors, function(key, val) {
                $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>");
              });
            },
          })
        })
      })
</script>
<script type="text/javascript">
	$(function() {
		$('.participants_section').hide();
		$('#add_participants_btn').click(function() {
			$('.participants_section').show();
		})
		
	});
</script>