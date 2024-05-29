<!DOCTYPE html>

<html lang="zxx">
<!--[endif]-->


<!-- Mirrored from www.webstrot.com/html/moviepro/html/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 05:46:53 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Movie Booking</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
	@include('header')
	<!-- prs navigation End -->
	<!-- prs video top Start -->
    @yield('content')
	<!-- prs Newsletter Wrapper End -->
	<!-- prs footer Wrapper Start -->
	@include('footer')
	<!-- prs footer Wrapper End -->
	<!-- st login wrapper Start -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.nav-tabs a');

    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            const activeTabs = document.querySelectorAll('.active');

            activeTabs.forEach(function(tab) {
                tab.classList.remove('active', 'show');
            });

            tab.classList.add('active');
            const tabPane = document.querySelector(tab.getAttribute('href'));
            tabPane.classList.add('active', 'show');
        });
    });
});</script>

@if (Session::has('message'))

<script>
    toastr.success("{{ Session::get('message') }}")
</script>
@endif

@if (Session::has('msg'))

<script>
    toastr.success("{{ Session::get('msg') }}")
</script>
@endif
@if (Session::has('success'))

<script>
    toastr.success("{{ Session::get('success') }}")
</script>
@endif
<!-- Mirrored from www.webstrot.com/html/moviepro/html/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 05:47:15 GMT -->
</html>
