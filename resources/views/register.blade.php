@include('inc.navbar')
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/datepicker.css') }}">
<script type="text/javascript" src="{{ url('/assets/js/moment.js') }}"></script>
<script type="text/javascript" src="{{ url('/assets/js/bootstrap-datepicker.js') }}"></script>

<style type="text/css">
  .ajax_loader {
    /*visibility: hidden;*/
    background-color: rgba(255,255,255,0.7);
    position: absolute;
    z-index: +100 !important;
    height:100%; 
    left: 50%;   
  }
  .ajax_loader img {
    top: 30%;
    position: relative;
  }
</style>

<div class="container">
  <h2>Student registration details</h2>
<!--   @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{$error}}
    </div>
    @endforeach
  @endif

  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
 -->
  @if(session('already_exists_error'))
    <div class="alert alert-danger">
      {{session('already_exists_error')}}
    </div>
  @endif

    @if(session('already_exists_mobile'))
    <div class="alert alert-danger">
      {{session('already_exists_mobile')}}
    </div>
  @endif

  <div class="errors">   
  </div>
  
  <div class="ajax_loader">
      <img id="loading_icon" src="{{ url('assets\icons\loading.gif') }}">
  </div>

  <form id="register_form" class="form-horizontal">
     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name &nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>
    </div>
         <div class="form-group">
      <label class="control-label col-sm-2" for="email">Mothers first name &nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name1">
      </div>
    </div>
             <div class="form-group">
      <label class="control-label col-sm-2" for="email">DOB: &nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input class=" form-control student_dob" type="text" class="form-control" id="name" placeholder="Enter dob" name="dob">
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Gender &nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
    
        <label class="radio-inline">
      <input type="radio" name="gender" value="Male">Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="Female">Female
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender" value="Others">Others
    </label>
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Mobile number &nbsp;<span class="asterik">*</span>:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="moile" placeholder="Enter mobile" name="mobile" maxlength="10">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Alernate mobile number:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="alt_moile" placeholder="Alernate mobile number" name="confirm_mobile" maxlength="10">
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email &nbsp;<span class="asterik">*</span>:</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
        <div class="form-group">
      <label class="control-label col-sm-2" for="email">Password&nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="password" placeholder="  enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Confirm password &nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="c_password" placeholder="  confirm password" name="c_password">
      </div>
    </div>
            <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info">Submit</button>
      </div>
    </div>
  </form>

<!-- ========Modal for Successfully registered msg==================== -->
  <div class="modal fade" id="register_success_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Registration</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-info">
            <strong>Verification email has been sent on your Mail account.Please verify.</strong>
            <a href="https://accounts.google.com/" target="_blank">
              <i class="fa fa-google-plus"></i>
            </a>
          </div>          
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- ========End of Modal for Successfully registered msg======================== -->

<!-- ========Modal for Failed register msg==================== -->
  <div class="modal fade" id="register_errors_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Student Registration Warning</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-warning already_exists_error">
          </div>          
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- ========End of Modal for Successfully registered msg======================== -->

    <script>
      $(function() {
        $('#loading_icon').hide();
        $('#register_form').on('submit', function(e) {
          // $('#loading_icon').show();
          e.preventDefault();
          $.ajax({
            url: '{{url("/registration_details_save")}}',
            headers:{
               'X-CSRF-TOKEN': "{{ csrf_token() }}"
             },   
            method: 'POST',
            type: 'JSON',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
              $('#loading_icon').show();
            },
            success: function(obj) {
              console.log(obj.length);
              console.log(obj);
              $(".alert-danger").remove();
              count=0;
              for(i=0;i<obj.length;i++) {
                if(obj[i]!='') {
                  count++;
                }
              }
              console.log(count)
              if(count>0) {
                $('#register_errors_modal').modal();
                $.each(obj, function(key, val) {
                  if(val!=''){
                    $('.already_exists_error').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>");
                  }
                });
              }
              else {
                $('#register_success_modal').modal();
              }
              // alert('success')
              console.log('removed...')
              // window.location = "http://localhost/university_addmission/public/";
            },
            error: function(obj) {
              // alert('Error')
              $(".alert-danger").remove();
              console.log(obj.responseJSON.errors)
              $.each(obj.responseJSON.errors, function(key, val) {
                $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
              });
            },
            complete: function() {
              $('#loading_icon').hide();
            }
          })
        })
      })
    </script>
    <script type="text/javascript">
      $(function() {
      $('.student_dob').datepicker();

      })
    </script>
</body>
</html>