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
    .gtco-nav{
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
                            <li><a href="/pengaduan">Pengaduan</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="/login">Rentalkan</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <div class="gtco-section border-bottom">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6 animate-box fadeInUp animated-fast">
                            <h3>Detail Kendaraan</h3>
                            <img src="{{ asset('storage/'.$data->kendaraans->gambar) }}" alt="" width="400">
                            <br>
                            <br>
                            <div class="gtco-widget">
                                <h3>Info</h3>
                            </div>
                            <div class="col-md-6">
                                <ul class="gtco-footer-links">
                                    <li><a>Kendaraan {{$data->kendaraans->status_iklan}}</a></li>
                                    <li><a>{{$data->kendaraans->merk_kendaraan}}</a></li>
                                    <li><a>{{$data->kendaraans->nopol}}</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="gtco-footer-links">
                                    <li><a>harga sewa {{$data->kendaraans->harga_sewa}}/hari</a></li>
                                    <li><a>{{$data->kendaraans->bahan_bakar}}</a></li>
                                    <li><a>{{$data->kendaraans->tahun_kendaraan}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-push-1 animate-box fadeInUp animated-fast">
                            <br>
                            <div class="gtco-contact-info">
                                <h3>Contact Information</h3>
                                <ul>
                                    <li class="email"><a href="mailto:info@yoursite.com">{{$data->users->name}}</a></li>
                                    <li class="phone"><a href="tel://1234567920">{{DB::table('rentals')->where('id', $data->kendaraans->rental_id)->value('hp')}}</a></li>
                                    <li class="email"><a href="mailto:info@yoursite.com">{{$data->users->email}}</a></li>
                                    <li class="url"><a href="http://GetTemplates.co">{{DB::table('rentals')->where('id', $data->kendaraans->rental_id)->value('alamat')}}</a></li>
                                    <!-- <li><i class="fa fa-address-book" aria-hidden="true"></i></li> -->
                                </ul>
                                <br>
                                <div class="gtco-widget">
                                    <p>Untuk Pemesanan Silahkan Hubungi Contact Informasi di atas</p>
                                </div>
                            </div>


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