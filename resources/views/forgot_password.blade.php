@include('inc.navbar')
            @if(count($errors) > 0)
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
            @if(session('forgot_password_msg'))
              <div class="alert alert-info">
                {{session('forgot_password_msg')}}
              </div>
            @endif

	<h1 style="text-align: center;">Forgot Password</h1>
  <form class="form-horizontal" action="{{ url('/forgot_password_save') }}" method="post">
    {{csrf_field()}}
     <div class="form-group">
      <label class="control-label col-sm-4" for="email">Email &nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="email">New Password&nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="password" placeholder="  enter password" name="new_password">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="email">Confirm New Password&nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input type="password" class="form-control" id="password" placeholder="  enter password" name="confirm_new_password">
      </div>
    </div>
        <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-10">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>  
</form>

</body>
</html>