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


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('landing/css/icomoon.css') }}">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="{{ asset('landing/css/themify-icons.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap-datepicker.min.css') }}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/owl.theme.default.min.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('landing/js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <style>
        .gtco-nav {
            background-color: black;
        }
    </style>
</head>

<body>


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
                            <li><a href="/">Home</a></li>
                            <li class="has-dropdown">
                                <a href="#">Jenis Kendaraan</a>
                                <ul class="dropdown">
                                    <li><a href="#">Mobil</a></li>
                                    <li><a href="#">Motor</a></li>
                                </ul>
                            </li>
                            <li><a href="pricing.html">Pengaduan</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="/login">Rentalkan</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <div class="gtco-section border-bottom" style="margin-bottom: 5vh;">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 animate-box fadeInUp animated-fast">
                            <h3>Pengaduan</h3>
                            <form method="POST" action="{{route('pengaduan.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="sr-only" for="name">Pengaduan</label>
                                        <textarea name="pengaduan" id="message" class="form-control" placeholder="Tulis Pengaduan" required></textarea>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input name="gambar" type="file" class="form-control" placeholder="Harga Sewa Per Hari">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Kirim Pengaduan" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gtco-container">
            @foreach ($data as $dta)
            <div class="price-box" style="text-align:left;">
                <div style="margin-bottom:2vh;">
                    <h4 class="pricing-plan" style="display: inline; margin-right: 2vh;">{{ \DB::table('users')->where('id', $dta->user_id)->value('name')}}</h4>
                    <h6 style="display: inline; color: grey;">{{date('d-m-Y', strtotime($dta->created_at))}}</h6>
                </div>
                <h5 class="pricing-plan">{{ $dta->pengaduan}}</h5>
                <div class="thumb">
                    <img class="img-fluid" width="40%" src="{{asset('storage/'. $dta->gambar)}}" alt="">
                </div>
                <hr>
                @php
                $tanggapan = \DB::table('tanggapan')->where('pengaduan_id', $dta->id)->get();
                //dd($tanggapan);
                @endphp
                <h5>{{count($tanggapan)}} Tanggapan</h5>
                @foreach ($tanggapan as $item)
                <!-- <hr> -->
                <div style="margin: 0 2vh; border-radius: 5px; background-color: #EEE; padding: 10px;margin-bottom: 2vh; color: black;font-weight: lighter;">
                    <h4 style="margin: 0;color: green;">
                        {{\DB::table('users')->where('id', $item->user_id)->value('name')}}
                    </h4>
                    {{$item->tanggapan}}
                </div>
                @endforeach
                <form method="POST" action="{{route('tanggapan.store')}}">
                    @csrf
                    <input type="hidden" name="pengaduan_id" id="post_id" value="{{$dta->id}}">
                    <textarea style="text-transform: capitalize; resize: vertical;margin: 1vh 0;" class="form-control" rows="2" name="tanggapan" placeholder="Beri Tanggapan" required></textarea>
                    <button class="btn btn-primary btn-block">Post</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- footer -->
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
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('landing/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('landing/js/jquery.waypoints.min.js') }}"></script>
    <!-- Carousel -->
    <script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>
    <!-- countTo -->
    <script src="{{ asset('landing/js/jquery.countTo.js') }}"></script>

    <!-- Stellar Parallax -->
    <script src="{{ asset('landing/js/jquery.stellar.min.js') }}"></script>

    <!-- Magnific Popup -->
    <script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/magnific-popup-options.js') }}"></script>

    <!-- Datepicker -->
    <script src="{{ asset('landing/js/bootstrap-datepicker.min.js') }}"></script>


    <!-- Main -->
    <script src="{{ asset('landing/js/main.js') }}"></script>

</body>

</html>