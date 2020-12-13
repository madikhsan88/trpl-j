<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SKANDA &mdash; Media Publikasi dan Pengembangan Bisnis Biro Rental di Jember</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ ('landing/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ ('landing/css/icomoon.css') }}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{ ('landing/css/themify-icons.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ ('landing/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ ('landing/css/magnific-popup.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ ('landing/css/bootstrap-datepicker.min.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ ('landing/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ ('landing/css/owl.theme.default.min.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ ('landing/css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ ('landing/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">SKANDA <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="destination.html">Home</a></li>
						<li class="has-dropdown">
							<a href="#">Jenis Kendaraan</a>
							<ul class="dropdown">
								<li><a href="#">Mobil</a></li>
								<li><a href="#">Motor</a></li>
							</ul>
						</li>
						<li><a href="/pengaduan">Pengaduan</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="/login">Rentalkan</a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-5 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Mau Bepergian Tapi Bingung Kendaraan ?</h1>	
						</div>

						
						<div class="col-md-7 animate-box row row-mt-5em" data-animate-effect="fadeInRight">
							<img style="width: 100%" src="{{ asset('img/HOME.png') }}" alt="">
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Ada Semua Kendaraan Pilihanmu</h2>
					<p>Disini tempat penyewaan atau rental kendaraan dari berbagai jenis. Anda dapat mengiklankan kendaraan anda jika ingin direntalkan. Anda prioritas kami</p>
				</div>
			</div>
			<div class="row">
				@foreach ($pemesanan as $item)
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{ asset('storage/'. $item->gambar) }}" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{ asset('storage/'. $item->kendaraans->gambar) }}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>{{$item->kendaraans->merk_kendaraan}}</h2>
							<p></p>
							<!-- <p><span class="btn btn-primary">Booking Now</span></p> -->
							<a href="{{ url('detailKendaraan', $item->id) }}" class="btn btn-primary">Info Pemesanan</a>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Apa Kelebihan Rental disini</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>1</i>
						</span>
						<h3>Aman dan terjamin</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>2</i>
						</span>
						<h3>Harga Terjangkau dengan wilayah</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>3</i>
						</span>
						<h3>Bonus cewek cantik</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				

			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3>RENTALKAN MOBIL ANDA DI SINI !!!</h3>
						<ul class="gtco-footer-links">
							<li><a href="/login">Rentalkan</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@GetTemplates.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2020 SKANDA. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://GetTemplates.co/" target="_blank">GetTemplates.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{ ('landing/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ ('landing/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ ('landing/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ ('landing/js/jquery.waypoints.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ ('landing/js/owl.carousel.min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ ('landing/js/jquery.countTo.js') }}"></script>

	<!-- Stellar Parallax -->
	<script src="{{ ('landing/js/jquery.stellar.min.js') }}"></script>

	<!-- Magnific Popup -->
	<script src="{{ ('landing/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ ('landing/js/magnific-popup-options.js') }}"></script>
	
	<!-- Datepicker -->
	<script src="{{ ('landing/js/bootstrap-datepicker.min.js') }}"></script>
	

	<!-- Main -->
	<script src="{{ ('landing/js/main.js') }}"></script>

	</body>
</html>

