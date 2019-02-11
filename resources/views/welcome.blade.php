 @include('inc.navbar')
<!--  <style type="text/css">
   .border{
    border:1px solid black;
    padding: 90px;
    margin-left: 20px;
    margin-right: 20px;
    background-image: url(assets/imgs/university.jpg);
    background-repeat: no-repeat;
    background-size: cover;
   }
 </style>
 --> <div class="border">
  <div class="container">
    <center><h2>Student Login details</h2></center>


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



@if(session('forgot_password_success'))
    <div class="alert alert-success">
      {{session('forgot_password_success')}}
    </div>
@endif
@if(session('error'))
  <ul style="list-style-type: none;">
    <li class="alert alert-danger">{{session('error')}}</li>
  </ul>
@endif

  <form class="form-horizontal" action="{{ url('/login_save') }}" method="post">
    {{csrf_field()}}
     <div class="form-group">
        <label class="control-label col-sm-4" for="email">Email &nbsp;<span class="asterik">*</span> :</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4" for="email">Password&nbsp;<span class="asterik">*</span> :</label>
        <div class="col-sm-4">
        <input type="password" class="form-control" id="password" placeholder="  enter password" name="password">
        </div>
    </div>
    <div class="form-group">        
    <div class="col-sm-offset-4 col-sm-10">
        <button type="submit" class="btn btn-success">Login</button>
        <a href="{{url('register')}}" class="btn btn-info">Register</a>
        <a href="{{ url('/forgot_password') }}">Forgot password?</a>
    </div>  
</form>
</div>

</body>
</html>