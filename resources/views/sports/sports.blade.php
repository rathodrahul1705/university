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
		      <img src="{{ url('assets\imgs\sports\cricket\cricket2.jpg') }}" alt="Los Angeles">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\football\football6.jpg') }}" alt="Chicago">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\pubg\pubg.jpg') }}" alt="New York">
		    </div>

		    <div class="item">
		      <img src="{{ url('assets\imgs\sports\tennis\tennis.jpg') }}" alt="New York">
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
	<div class="row">
		<h3>Register here...</h3>
		<ul>
			<li>
				<a href="{{ url('/cricket_registration') }}">Cricket</a><br>
				<a href="{{ url('/football_registration') }}">football</a><br>
				<a href="{{ url('/PUBG_registration') }}">PUBG</a><br>
				<a href="{{ url('/Tennis_registration') }}">Tennis</a>
			</li>
		</ul>
	</div>
</div>