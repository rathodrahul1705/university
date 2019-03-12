@include("inc.navbar")


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
		      <img src="{{ url('assets\imgs\sports\tennis\tennis.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\tennis\tennis2.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\tennis\tennis3.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\tennis\tennis4.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\tennis\tennis1.jpg') }}" alt="New York">
		    </div>cl

	<!-- ------------TENNIS FORM--------------- -->

		<div class="container">
	<div class="row col-sm-6 col-sm-offset-2">
		<center><h1>TENNIS REGISTRATIONS</h1></center>

		<div class="errors">
			
		</div>

			<form class="form-horizontal" id="tennis_registration">
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
        $('#tennis_registration').on('submit', function(e) {
          // $('#loading_icon').show();
          e.preventDefault();
          $.ajax({
            url: '{{url("/tennis_details")}}',
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