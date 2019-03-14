<!DOCTYPE html>
<html>
<head>
  <title>University |website |student</title>
  <script src="{{ url('/assets/js/jquery.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/bootstrap.min.css') }}">
  <script src="{{ url('/assets/js/bootstrap.min.js') }}"></script>
  <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    .asterik{
        color: red;
    }
  </style>
    <style>
    .asterik{
        color: red;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="{{url('/')}}">CADMI</a>
  </div>
  <ul class="nav navbar-nav">
    <li class="active"><a href="{{url('/')}}">Home</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="{{url('/login_page')}}">Admission</a></li>
        <li><a href="{{url('/Brouchure_page')}}">Brouchure</a></li>
        <li><a href="{{url('Examination_page')}}">Examination</a></li>
        <li><a href="{{url('/result_page')}}">Result</a></li>
        <li><a href="{{url('scholership_page')}}">Scholership</a></li>
        <li><a href="{{url('convocation_page')}}">convocation</a></li>
        <li><a href="{{url('Alumni_page')}}">Alumni</a></li>
      </ul>
    </li>  
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Service
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="{{url('/hostel_page')}}">Hostel</a></li>
        <li><a href="{{url('/library_page')}}">Library</a></li>
        <li><a href="{{url('/others_page')}}">Others</a></li>
      </ul>
    </li>    
<!--     <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Faculties
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="{{url('/arts_page')}}">Arts</a></li>
        <li><a href="{{url('/commerce_page')}}">Commerce</a></li>
        <li><a href="{{url('/science_page')}}">Science</a></li>
        <li><a href="{{url('/law_page')}}">law</a></li>
        <li><a href="{{url('/technology_page')}}">Technology</a></li>
        <li><a href="{{url('/sports_page')}}">Sports</a></li>
        <li><a href="{{url('/others_page_faculties')}}">Others</a></li>
      </ul>
    </li>
 -->

     <li><a href="{{url('/about_university')}}">About University</a></li>
     <li><a href="{{url('/sports')}}">Sports</a></li>
     <li><a href="{{url('/events')}}">Events</a></li>
 
    <li><a href="{{url('/contact_page')}}">Contact us</a></li>
    <li><a href="{{url('/admin_page')}}">Admin</a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
      <li><a href="{{url('/register')}}"><span class="glyphicon glyphicon-user" title="sign up"></span> Sign Up</a></li>
      <li><a href="{{url('/login_page')}}"><span class="glyphicon glyphicon-log-in" title="log in"></span> Login</a></li>
    </ul>
</div>
</nav>