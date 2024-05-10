<!DOCTYPE html>

<html lang="zxx">
<!--[endif]-->


<!-- Mirrored from www.webstrot.com/html/moviepro/html/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 05:46:53 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Movie Pro Responsive HTML Template</title>
    <base href="{{asset(' ')}}"/>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="Movie Pro" />
	<meta name="keywords" content="Movie Pro" />
	<meta name="author" content="" />
	<meta name="MobileOptimized" content="320" />
	<!--Template style -->
	<link rel="stylesheet" type="text/css" href="source/website/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/flaticon.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/owl.theme.default.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/dl-menu.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/nice-select.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/magnific-popup.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/venobox.css" />
    <link rel="stylesheet" type="text/css" href="source/website/css/style.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/style4.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/responsive4.css" />
	<link rel="stylesheet" id="theme-color" type="text/css" href="#"/>
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="source/website/images/header/favicon.ico" />
    <!-- Thêm CSS của Magnific Popup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- Thêm JavaScript của jQuery và Magnific Popup -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

</head>

<body>
	<!-- preloader Start -->
	<div id="preloader">
		<div id="status">
			<img src="source/website/images/header/horoscope.gif" id="preloader_image" alt="loader">
		</div>
	</div>
	<!-- color picker start -->


	<!-- color picker end -->
	<!-- prs navigation Start -->
	<div class="prs_navigation_main_wrapper">
		<div class="container-fluid">
			<div id="search_open" class="gc_search_box">
				<input type="text" placeholder="Search here">
				<button><i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</div>
			<div class="prs_navi_left_main_wrapper">
				<div class="prs_logo_main_wrapper">
					<a href="{{ route('trang-chu') }}">
						<img src="source/website/images/header/logo.png" alt="logo" />
					</a>
				</div>
				<div class="prs_menu_main_wrapper">
					<nav class="navbar navbar-default">
						<div id="dl-menu" class="xv-menuwrapper responsive-menu">
							<button class="dl-trigger">
								<img src="source/website/images/header/bars.png" alt="bar_png">
							</button>
							<div class="prs_mobail_searchbar_wrapper" id="search_button">	<i class="fa fa-search"></i>
							</div>
							<div class="clearfix"></div>
							<ul class="dl-menu">
								<li class="parent"><a href="{{ route('trang-chu') }}">Trang chủ</a>
								</li>
								<li class="parent megamenu"><a href="#">Blog</a>

								</li>
								<li class="parent"><a href="{{ route('phim') }}">Phim</a>
								</li>
								</li>
								<li class="parent"><a href="{{ route('lien-he') }}">Liên hệ</a>
								</li>
							</ul>
						</div>
						<!-- /dl-menuwrapper -->
					</nav>
				</div>
			</div>
			<div class="prs_navi_right_main_wrapper">
				<div class="prs_slidebar_wrapper">
					<button class="second-nav-toggler" type="button">
						<img src="source/website/images/header/bars.png" alt="bar_png">
					</button>
				</div>
				<div class="prs_top_login_btn_wrapper">
					<div class="prs_animate_btn1">
						<ul>
							<li><a href="#" class="button button--tamaya" data-text="sign up" data-toggle="modal" data-target="#myModal"><span>sign up</span></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="product-heading">
					<div class="con">
						<select>
							<option>All Categories</option>
							<option>Movie</option>
							<option>Video</option>
							<option>Music</option>
							<option>TV-Show</option>
						</select>
						<input type="text" placeholder="Search Movie , Video , Music">
						<button type="submit"><i class="flaticon-tool"></i>
						</button>
					</div>
				</div>
			</div>
			<div id="mobile-nav" data-prevent-default="true" data-mouse-events="true">
				<div class="mobail_nav_overlay"></div>
				<div class="mobile-nav-box">
					<div class="mobile-logo">
						<a href="index.html" class="mobile-main-logo">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="46.996px" height="40px" viewBox="0 0 46.996 40" enable-background="new 0 0 46.996 40" xml:space="preserve">
<g>
	<g>
		<path  d="M39.919,19.833C39.919,8.88,30.984,0,19.959,0C8.937,0,0,8.88,0,19.833
			c0,10.954,8.937,19.834,19.959,19.834C30.984,39.666,39.919,30.787,39.919,19.833z M35.675,14.425
			c0.379,0,0.686,0.307,0.686,0.683s-0.305,0.683-0.686,0.683c-0.38,0-0.688-0.307-0.688-0.683S35.295,14.425,35.675,14.425z
			 M34.482,20.461c0,0.491-0.025,0.976-0.071,1.452l-11.214-4.512l6.396-7.733C32.592,12.311,34.482,16.167,34.482,20.461z
			 M19.083,2.277c0.379,0,0.687,0.305,0.687,0.682c0,0.378-0.306,0.684-0.687,0.684c-0.378,0-0.686-0.306-0.686-0.684
			C18.396,2.584,18.704,2.277,19.083,2.277z M19.959,6.031c1.916,0,3.743,0.372,5.416,1.042l-6.335,7.662l-6.252-6.82
			C14.906,6.718,17.351,6.031,19.959,6.031z M3.128,16.473c-0.378,0-0.687-0.306-0.687-0.684c0-0.377,0.307-0.682,0.687-0.682
			c0.38,0,0.686,0.305,0.686,0.682C3.814,16.167,3.508,16.473,3.128,16.473z M5.535,22.119c-0.063-0.545-0.098-1.098-0.098-1.658
			c0-3.612,1.339-6.911,3.547-9.444l6.502,7.095L5.535,22.119z M10.462,35.354c-0.379,0-0.687-0.306-0.687-0.683
			s0.307-0.682,0.687-0.682c0.379,0,0.687,0.305,0.687,0.682S10.842,35.354,10.462,35.354z M6.925,26.828l10.4-4.186l0.239,12.052
			C12.88,33.921,8.956,30.922,6.925,26.828z M19.513,22.326c-1.529,0-2.771-1.232-2.771-2.752c0-1.521,1.241-2.753,2.771-2.753
			c1.53,0,2.771,1.232,2.771,2.753C22.284,21.096,21.043,22.326,19.513,22.326z M29.939,33.99c-0.378,0-0.686-0.308-0.686-0.683
			c0-0.377,0.307-0.683,0.686-0.683s0.688,0.306,0.688,0.683C30.626,33.683,30.319,33.99,29.939,33.99z M22.482,34.672
			l-0.246-12.388l10.846,4.365C31.098,30.799,27.177,33.854,22.482,34.672z M35.314,34.585c-1.837,1.531-6.061,4.306-6.061,4.306
			C37.652,36.448,45.953,40,45.953,40l1.043-8.658C41.41,30.454,38.125,32.244,35.314,34.585z"/>
	</g>
</g>
</svg><span>Movie Pro</span>
						</a>
						<a href="#" class="manu-close"><i class="fa fa-times"></i></a>
					</div>
					<ul class="mobile-list-nav">
						<li><a href="{{ route('trang-chu') }}">TRANG CHỦ</a>
						</li>
						<li><a href="movie_single.html">PHIM</a>
						</li>
						</li>
						<li><a href="blog_single.html">BLOG</a>
						</li>
						<li><a href="{{ route('lien-he') }}">LIÊN HỆ</a>
						</li>
					</ul>
					<div class="product-heading prs_slidebar_searchbar_wrapper">
						<div class="con">
							<select>
								<option>All Categories</option>
								<option>Movie</option>
								<option>Video</option>
								<option>Music</option>
								<option>TV-Show</option>
							</select>
							<input type="text" placeholder="Search Movie , Video , Music">
							<button type="submit"><i class="flaticon-tool"></i>
							</button>
						</div>
					</div>
					<div class="achivement-blog">
						<ul class="flat-list">
							<li>
								<a href="#">	<i class="fa fa-facebook"></i>
									<h6>Facebook</h6>
									<span class="counter">12546</span>
								</a>
							</li>
							<li>
								<a href="#">	<i class="fa fa-twitter"></i>
									<h6>Twiter</h6>
									<span class="counter">12546</span>
								</a>
							</li>
							<li>
								<a href="#">	<i class="fa fa-pinterest"></i>
									<h6>Pinterest</h6>
									<span class="counter">12546</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="prs_top_login_btn_wrapper prs_slidebar_searchbar_btn_wrapper">
						<div class="prs_animate_btn1">
							<ul>
								<li><a href="#" class="button button--tamaya" data-text="sign up" data-toggle="modal" data-target="#myModal"><span>sign up</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- prs navigation End -->
	<!-- prs video top Start -->
    @yield('content')
	<!-- prs Newsletter Wrapper End -->
	<!-- prs footer Wrapper Start -->
	<div class="prs_footer_main_section_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="prs_footer_cont1_wrapper prs_footer_cont1_wrapper_1">
						<h2>LANGUAGE MOVIES</h2>
						<ul>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">English movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Tamil movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Punjabi Movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Hindi movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Malyalam movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">English Action movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Hindi Action movie</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="prs_footer_cont1_wrapper prs_footer_cont1_wrapper_2">
						<h2>MOVIES by presenter</h2>
						<ul>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Action movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Romantic movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Adult movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Comedy movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Drama movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Musical movie</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">Classical movie</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="prs_footer_cont1_wrapper prs_footer_cont1_wrapper_3">
						<h2>BOOKING ONLINE</h2>
						<ul>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">www.example.com</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">www.hello.com</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">www.example.com</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">www.hello.com</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">www.example.com</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">www.hello.com</a>
							</li>
							<li><i class="fa fa-circle"></i> &nbsp;&nbsp;<a href="#">www.example.com</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="prs_footer_cont1_wrapper prs_footer_cont1_wrapper_4">
						<h2>App available on</h2>
						<p>Download App and Get Free Movie Ticket !</p>
						<ul>
							<li>
								<a href="#">
									<img src="source/website/images/content/f1.jpg" alt="footer_img">
								</a>
							</li>
							<li>
								<a href="#">
									<img src="source/website/images/content/f2.jpg" alt="footer_img">
								</a>
							</li>
						</ul>
						<h5><span>$50</span> Payback on App Download</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="prs_bottom_footer_wrapper">	<a href="javascript:" id="return-to-top"><i class="flaticon-play-button"></i></a>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
					<div class="prs_bottom_footer_cont_wrapper">
						<p>Copyright 2022-23 <a href="#">Movie Pro</a> . All rights reserved - Design by <a href="#">Webstrot</a>
						</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
					<div class="prs_footer_social_wrapper">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-youtube-play"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- prs footer Wrapper End -->
	<!-- st login wrapper Start -->
	<div class="modal fade st_pop_form_wrapper" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="st_pop_form_heading_wrapper float_left">
					<h3>Log in</h3>
				</div>
				<div class="st_profile_input float_left">
					<label>Email / Mobile Number</label>
					<input type="text">
				</div>
				<div class="st_profile__pass_input st_profile__pass_input_pop float_left">
					<input type="password" placeholder="Password">
				</div>
				<div class="st_form_pop_fp float_left">
					<h3><a href="#" data-toggle="modal" data-target="#myModa2" target="_blank">Forgot Password?</a></h3>
				</div>
				<div class="st_form_pop_login_btn float_left">	<a href="https://webstrot.com/html/moviepro/html/page-1-7_profile_settings.html">LOGIN</a>
				</div>
				<div class="st_form_pop_or_btn float_left">
					<h4>or</h4>
				</div>
				<div class="st_form_pop_facebook_btn float_left">	<a href="#"> Connect with Facebook</a>
				</div>
				<div class="st_form_pop_gmail_btn float_left">	<a href="#"> Connect with Google</a>
				</div>
				<div class="st_form_pop_signin_btn float_left">
					<h4>Don’t have an account? <a href="#" data-toggle="modal" data-target="#myModa3" target="_blank">Sign Up</a></h4>
					<h5>I agree to the <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy</a></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade st_pop_form_wrapper" id="myModa2" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="st_pop_form_heading_wrapper st_pop_form_heading_wrapper_fpass float_left">
					<h3>Forgot Password</h3>
					<p>We can help! All you need to do is enter your email ID and follow the instructions!</p>
				</div>
				<div class="st_profile_input float_left">
					<label>Email Address</label>
					<input type="text">
				</div>
				<div class="st_form_pop_fpass_btn float_left">	<a href="#">Verify</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade st_pop_form_wrapper" id="myModa3" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="st_pop_form_heading_wrapper float_left">
					<h3>Sign Up</h3>
				</div>
				<div class="st_profile_input float_left">
					<label>Email / Mobile Number</label>
					<input type="text">
				</div>
				<div class="st_profile__pass_input st_profile__pass_input_pop float_left">
					<input type="password" placeholder="Password">
				</div>
				<div class="st_form_pop_fp float_left">
					<h3><a href="#" data-toggle="modal" data-target="#myModa2" target="_blank">Forgot Password?</a></h3>
				</div>
				<div class="st_form_pop_login_btn float_left">	<a href="https://webstrot.com/html/moviepro/html/page-1-7_profile_settings.html">LOGIN</a>
				</div>
				<div class="st_form_pop_or_btn float_left">
					<h4>or</h4>
				</div>
				<div class="st_form_pop_facebook_btn float_left">	<a href="#"><i class="fab fa-facebook-f"></i> Connect with Facebook</a>
				</div>
				<div class="st_form_pop_gmail_btn float_left">	<a href="#"><i class="fab fa-google-plus-g"></i> Connect with Google</a>
				</div>
				<div class="st_form_pop_signin_btn st_form_pop_signin_btn_signup float_left">
					<h5>I agree to the <a href="#">Terms & Conditions</a> & <a href="#">Privacy Policy</a></h5>
				</div>
			</div>
		</div>
	</div>
	<!-- st login wrapper End -->
	<!--main js file start-->
	<script src="source/website/js/jquery_min.js"></script>
	<script src="source/website/js/modernizr.js"></script>
	<script src="source/website/js/bootstrap.js"></script>
	<script src="source/website/js/owl.carousel.js"></script>
	<script src="source/website/js/jquery.dlmenu.js"></script>
	<script src="source/website/js/jquery.sticky.js"></script>
	<script src="source/website/js/jquery.nice-select.min.js"></script>
	<script src="source/website/js/jquery.magnific-popup.js"></script>
	<script src="source/website/js/jquery.bxslider.min.js"></script>
	<script src="source/website/js/venobox.min.js"></script>
	<script src="source/website/js/smothscroll_part1.js"></script>
	<script src="source/website/js/smothscroll_part2.js"></script>
	<script src="source/website/js/custom4.js"></script>
	<!--main js file end-->
</body>
<script>
    $(document).ready(function() {
    $('.video-link').magnificPopup({
        type: 'iframe',  // Đảm bảo rằng các liên kết mở dưới dạng iframe
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});
</script>

<!-- Mirrored from www.webstrot.com/html/moviepro/html/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 05:47:15 GMT -->
</html>
