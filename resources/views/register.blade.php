  @include('inc.navbar')
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
        <input type="date" class="form-control" id="name" placeholder="Enter dob" name="dob">
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
        <input type="text" class="form-control" id="moile" placeholder="Enter mobile" name="mobile">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Alernate mobile number:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="alt_moile" placeholder="Alernate mobile number" name="confirm_mobile">
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
    <script>
      $(function() {
        $('#register_form').on('submit', function(e) {
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
            success: function(obj) {
              alert('success')
              // window.location = "http://localhost/university_addmission/public/";
            },
            error: function(obj) {
              alert('Error')
              console.log(obj.responseJSON.errors)
              $.each(obj.responseJSON.errors, function(key, val) {
                $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
              });
            }
          })
        })
      })
    </script>
</body>
</html>