<style type="text/css">
	.disabled {
		pointer-events:none;
		opacity:0.8;
	}
</style>
@include('inc.navbar')
	<div class="container">
		<div class="row">
			<div class="col-sm-5 alert_messages">
				<div class="errors">
				</div>
					
				@if(count($errors)>0)
					<ul style="list-style-type: none;">
				    	@foreach($errors->all() as $error)
				    	<li class="alert alert-danger">{{$error}}</li>
				    	@endforeach
					</ul>
				@endif

				@if(session('success'))
				    	<div class="alert alert-success">
				    		{{session('success')}}
				    	</div>
				@endif
								
			</div>
			
		</div>
	</div>
		<div class="container">
			<div class="row">
				<ul class="nav nav-tabs">
				  <li id="personal_details_id" class="active"><a data-toggle="tab" href="#personal_details">Student Personal Details</a></li>
				  <li class=""><a data-toggle="tab" href="#academic_details">Student Academic Details</a></li>
				  <li class=""><a data-toggle="tab" href="#category_details">Student Category Details</a></li>
				  <li class=""><a data-toggle="tab" href="#payment_details">Student Payment Details</a></li>
				  <li class=""><a data-toggle="tab" href="#admission_success">admission Success</a></li>
				</ul>

				<div class="tab-content">
				  <div id="personal_details" class="tab-pane fade in active">
				  	<div class="row col-sm-4	 col-sm-offset-0">
				    <h2>student personal details</h2>					    
					<form id="detail_submit" enctype="multipart/form-data">
						<!-- <form action="" method="post"> -->	
						 <!-- {{csrf_field()}} -->
						   <div class="form-group">
					    <label for="email">Name:</label>
					    <input type="text" class="form-control" id="name" placeholder="enter name" name="name">	
					  </div>
					  <div class="form-group ">
					    <label for="pwd">Mobile:</label>
					    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="enter mobile number" maxlength="10">
					  </div>
					   <div class="form-group">
					    <label for="pwd">email:</label>
					    <input type="email" class="form-control" id="email" name="email" placeholder="enter email">
					  </div>
					    <div class="form-group">
					      <label >address:</label>
							<textarea class="form-control" rows="5" name="address" placeholder="enter address"></textarea>
						</div>
						<div>
						<label>choose your photograph:</label>
						<input type="file" class="form-control" id="photograph" name="student_photo">
						</div>
							<div>
						<label>choose your signature:</label>
						<input type="file" class="form-control" id="photograph" name="student_signature">
						</div><br>
					  	<button type="submit" class="btn btn-success">Save & proceed</button> 
					</form>
										



										<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Personal details</h4>
					      </div>
					      <div class="modal-body">
					        <p>personal details saved successfully.</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-info go_to_next_tab" data-dismiss="modal">Go Next</button>
					      </div>
					    </div>
					  </div>
					</div>
			</div>
	  	</div>
				  	<script>
				      $(function() {
		    			 $('#detail_submit').on('submit', function(e) {
				          e.preventDefault();
				          $.ajax({
				            url: '{{url("/detail_submit")}}',
				            headers:{
				               'X-CSRF-TOKEN': "{{ csrf_token() }}"
				             },   
				            method: 'POST',
				            type: 'JSON',
				            data:  new FormData(this),
				            contentType: false,
				            cache: true,
				            processData:false,
				            success: function(obj) {
				              $(".alert-danger").remove();
				              console.log('removed...')
				              $('#myModal').modal();
				              $('.go_to_next_tab').on('click', function() {
					              $('.nav-tabs a[href="#academic_details"]').tab('show').removeClass('disabled');
				              });

				            },
				            error: function(obj) {
				              // alert('Error')
                            console.log(obj.responseJSON.errors)
              				$.each(obj.responseJSON.errors, function(key, val) {
               				 $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
          					});
				            }
				          })
				        })
				      })
				    </script>
				  <div id="academic_details" class="tab-pane fade">
				   <h2>student Academic details</h2>
				   @if(count($errors)>0)
				   		<ul>
						   @foreach($errors->all() as $error)
						   <li class="alert alert-danger">{{$error}}</li>
						   @endforeach
						</ul>	
				   @endif
				   @if(session('success'))
				   	<div class="alert alert-success">
				   		{{session('success')}}
				   		
				   	</div>

				   @endif
				   <form id="academic_details_form" class="form-inline" enctype="multipart/form-data">
				   	<!-- {{csrf_field()}} -->
					  <div class="form-group">
				    	<div class="form-group">
						      <div class="col-sm-4">
						        <select class="form-control" name="course_year">
						        <option>---academic year--- </option>
						        <option>2010</option>
						        <option>2011</option>
						        <option>2012</option>
						        <option>2013</option>
						        <option>2014</option>
						        <option>2015</option>
						        <option>2016</option>
						        <option>2017</option>
						        <option>2018</option>
						      </select>
						      </div>
						    </div> 
					  	</div>
					  	<div class="form-group">
						      <div class="col-sm-4">
						        <select class="form-control" name="sub_course">
						        <option>---Board--- </option>
						        <option>HSC</option>
						      </select>
						      </div>
						    </div> 
	    				  	<div class="form-group">
						      <div class="col-sm-4">
						        <select class="form-control" name="college_name">
						        <option>---College name--- </option>
						        <option>Bhavan's College, Andheri</option>
						        <option>Chetana College</option>
						        <option>C. H. M. College</option>
						        <option>Elphinstone College</option>
						        <option>Bhavan's College, Andheri, Andheri West</option>
						        <option>C. H. M. College, Ulhasnagar</option>
						        <option>Elphinstone College, Kala Ghoda, Fort</option>
						        <option>Guru Nanak Khalsa College (King's Circle), Matunga</option>
						        <option>Patkar-Varde College, Goregaon</option>
						        <option>Ramnarain Ruia College, Matunga</option>
						        <option>Ramniranjan Anandilal Podar College of Commerce and Economics</option>
						        <option>H.R. College of Commerce and Economics, Churchgate</option>
						        <option>BHARAT ENGLISH HIGH SCHOOL</option>
						        <option>DNYANASADHANA COLLEGE OF ARTS</option>
						        <option>GOVERMENT POLYTECHNIC</option>
						        <option>BHARAT ENGLISH HIGH SCHOOL</option>
						        <option>J.T.T. COLLEGE OF ARTS AND SCIENCE</option>
						        <option>NKT THANAWALA'S</option>
						        <option>NKT THANAWALA'SNKT THANAWALA'S</option>
						        <option>NKT THANAWALA'S</option>
						        <option>bedekar college thane</option>
						        <option>bhavika college thane</option>
						        <option>new kalwa thane</option>
						        <option>indira gandhi college thane </option>
						        <option>muchhala college thane</option>
						      </select>
						      </div>
						    </div>
						     <div class="form-group">
	    						<input type="text" class="form-control" placeholder="marathi" name="marathi" maxlength="3">
	 						 </div>
					 		<div class="form-group" style="margin-top: 15px;">
						      <div class="col-sm-4">
						      	<input type="text" class="form-control"  placeholder="english" name="english" maxlength="3">
						      </div>
						  	</div>
				 			<div class="form-group" style="margin-top: 15px;">
						      <div class="col-sm-4">
						      	<input type="text" class="form-control"  placeholder="biology" name="biology" maxlength="3">
						      </div>
						  	</div>
				 			<div class="form-group" style="margin-top: 15px;">
						      <div class="col-sm-4">
						      	<input type="text" class="form-control"  placeholder="chemestry" name="chemestry" maxlength="3">
						      </div>
						  	</div>
				 			<div class="form-group" style="margin-top: 15px;">
						      <div class="col-sm-4">
						      	<input type="text" class="form-control"  placeholder="mathematics" name="mathematics" maxlength="3">
						      </div>
						  	</div>
				 			<div class="form-group" style="margin-top: 15px;">
						      <div class="col-sm-4">
						      	<input type="text" class="form-control"  placeholder="percentage(%)" name="percentage" maxlength="3">
						      </div>
						  	</div>
					      <div class="form-group" style="margin-top: 25px;">
					        <label class="col-sm-6">Upload hsc Marksheet:</label>
					        <div class="col-sm-2">
					          <input type="file" class="form-control" id="hsc_mksheet" placeholder="" name="hsc_marksheet">
					        </div>
					      </div><br><br><br>
		                    <div class="form-group"> 
	        				<div class="col-sm-2">
	          					<input type="submit" class="btn btn-success" value="Save & Proceed"/>
	        				</div>
	     				 </div>
					</form>
						  <!-- Modal -->
				  <div class="modal fade" id="popUp" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Academic details</h4>
				        </div>
				        <div class="modal-body">
				          <p>Academic details save</p>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-success go_to_next" data-dismiss="modal">Go Next</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>


				</div>
		<script>
      	$(function() {
        	$('#academic_details_form').on('submit', function(e) {
          	e.preventDefault();
          	$.ajax({
            url: '{{url("/academic_details")}}',
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
              $(".alert-danger").remove();
              console.log('removed...')
              $('#popUp').modal();
              $('.go_to_next').on('click', function() {
            	$('.nav-tabs a[href="#category_details"]').tab('show');
            });
            },
            error: function(obj) {
              // alert('Error')
          console.log(obj.responseJSON.errors)
			$.each(obj.responseJSON.errors, function(key, val) {
			 $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
			});		
            }
          })
        })
      })
    </script>


			  <div id="category_details" class="tab-pane fade">
			  	<form id="student_category" class="form-horizontal" enctype="multipart/form-data">
			  		<!-- {{csrf_field()}} -->
			    <h2>student category details</h2>
			   @if(count($errors)>0)
			   		<ul>
					   @foreach($errors->all() as $error)
					   <li class="alert alert-danger">{{$error}}</li>
					   @endforeach
					</ul>	
			   @endif
			   @if(session('success'))
			   	<div class="alert alert-success">
			   		{{session('success')}}
			   		
			   	</div>

			   @endif

			    <i class="fa fa-info-circle"></i>&nbsp;Do you belong to caste category?

      <div class="radio">
        <label><input type="radio" name="caste_category_status" checked>Yes</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="caste_category_status">No</label>
      </div>
  		<label class="col-sm-2">Catse Category</label>
        <div class="col-sm-2">        
          <select class="form-control" id="caste_category" name="caste_category">
            <option>---Caste Category---</option>
            <option>SC/ST</option>
            <option>OBC</option>
            <option>General/Open</option>
          </select>
        </div>
      <div class="form-group">
        <div class="col-sm-4">
          <span style="color: red;">Please upload following documents.</span>
        </div>
      </div><br>
		<label class="col-sm-2">caste certificate</label>
        <div class="col-sm-4">        
        	<input type="file" class="form-control"  name="caste_certificate_data">
        </div><br><br><br>
		<label class="col-sm-2">Ncl certificate</label>
        <div class="col-sm-4">        
        	<input type="file" class="form-control"  name="ncl_certificate_data">
        </div><br><br><br>
			<label class="col-sm-2">Cast validity certificate</label>
        <div class="col-sm-4">        
        	<input type="file" class="form-control"  name="cast_validity_certificate_data">
        </div><br><br><br>
			<label class="col-sm-2">income certificate</label>
        <div class="col-sm-4">        
        	<input type="file" class="form-control"  name="income_certificate_data">
        </div><br><br><br>
			<label class="col-sm-2">Domicile certificate</label>
        <div class="col-sm-4">        
        	<input type="file" class="form-control"  name="Domicile_certificate_data">
        </div><br><br><br>
              <div class="form-group"> 
        <div class="col-sm-2">
          <input type="submit" class="btn btn-success" value="Save & Proceed" style="margin-left: 150px;">
        </div>
      </div>

    </form>
    	<div class="modal fade" id="mypopUp" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Student Categiry</h4>
				        </div>
				        <div class="modal-body">
				          <p>Category Details Save</p>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-success go_to_next_step" data-dismiss="modal">Go Next</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>
  			</div>

	<script>
      		$(function() {
        	$('#student_category').on('submit', function(e) {
          	e.preventDefault();
          	$.ajax({
            url: '{{url("/student_category")}}',
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
              // alert('success')
              // $('.alert-danger').remove();
              // $('.nav-tabs a[href="#payment_details"]').tab('show');
              $(".alert-danger").remove();
              console.log('removed...')
              $('#mypopUp').modal();
              $('.go_to_next_step').on('click', function() {
            	$('.nav-tabs a[href="#payment_details"]').tab('show');
            });     
            },
            error: function(obj) {
              // alert('Error')
              console.log(obj.responseJSON.errors)
			$.each(obj.responseJSON.errors, function(key, val) {
			 $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
			});
            }
          })
        })
      })
    </script>

			  <div id="payment_details" class="tab-pane fade">
			  	<div class="row col-sm-4	 col-sm-offset-0">
			    <h2>student payment details</h2>
			   @if(count($errors)>0)
			   		<ul>
					   @foreach($errors->all() as $error)
					   <li class="alert alert-danger">{{$error}}</li>
					   @endforeach
					</ul>	
			   @endif
			   @if(session('success'))
			   	<div class="alert alert-success">
			   		{{session('success')}}
			   		
			   	</div>

			   @endif
			    <form id="payment_details_form">
			    	 <!-- {{csrf_field()}} -->

				  <div class="form-group">
				    <label>Enter Amount:</label>
				    <input type="text" class="form-control" name="Amount" maxlength="5">
				  </div>
				  <button type="submit" class="btn btn-success">payment</button>
				</form>
		    </form>
		  </div>
		</div>
	<script>
      		$(function() {
        	$('#payment_details_form').on('submit', function(e) {
          	e.preventDefault();
          	$.ajax({
            url: '{{url("/payment_details")}}',
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
              // alert('success')
              $('.alert-danger').remove();
              
            },		
            error: function(obj) {
              // alert('Error')
              console.log(obj.responseJSON.errors)
			$.each(obj.responseJSON.errors, function(key, val) {
			 $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
			});

            }
          })
        })
      })
    </script>

	<div id="admission_success" class="tab-pane fade">
	  	<div class="row col-sm-4 col-sm-offset-0">
	  		<table class="table table-bordered table-hover table-striped">
	  			<thead>
	  				<tr>
	  					<th>SR. NO.</th>
	  					<th>Student Name</th>
	  					<th>Application Number</th>
	  					<th>Stream</th>
	  					<th>Action</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  				<tr>
	  					<td>1.</td>
	  					<td>Dipak Rathod</td>
	  					<td>E0288782019M</td>
	  					<td>BSC CS</td>
	  					<td>
	  						<a href="#">
	  							<i class="fa fa-edit"></i>
	  						</a>
	  						<a href="{{ url('/pdf') }}">
	  							<i class="fa fa-file-pdf-o"></i>
	  						</a>
	  					</td>
	  				</tr>
	  			</tbody>
	  		</table>
		</div>
	</div>

</body>
</html>