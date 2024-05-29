<!DOCTYPE html>
<!--
Template Name: Movie Pro
Version: 1.0.0
Author: Webstrot

-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--[endif]-->


<!-- Mirrored from www.webstrot.com/html/moviepro/html/booking_type.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 05:48:29 GMT -->
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
	<link rel="stylesheet" type="text/css" href="source/website/js/plugin/rs_slider/layers.css" />
	<link rel="stylesheet" type="text/css" href="source/website/js/plugin/rs_slider/navigation.css" />
	<link rel="stylesheet" type="text/css" href="source/website/js/plugin/rs_slider/settings.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/seat.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/style.css" />
	<link rel="stylesheet" type="text/css" href="source/website/css/responsive.css" />
	<link rel="stylesheet" id="theme-color" type="text/css" href="#"/>
	<!-- favicon links -->
	<link rel="shortcut icon" type="/image/png" href="source/website/image/header/favicon.ico" />
</head>

<body class="booking_type_back">
	<!-- preloader Start -->
	<div id="preloader">
		<div id="status">
			<img src="source/website/image/header/horoscope.gif" id="preloader_image" alt="loader">
		</div>
	</div>
	<!-- color picker start -->
	<!-- st top header Start -->
	<div class="st_bt_top_header_wrapper float_left">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					<div class="st_bt_top_back_btn float_left">	<a href="index.html"><i class="fas fa-long-arrow-alt-left"></i> &nbsp;Back</a>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="st_bt_top_center_heading float_left">
						<h3>{{ $showtime->movie->title }} - ({{ $showtime->movie->duration}} phút)</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- st top header Start -->
	<!-- st dtts section Start -->
	<div class="st_dtts_wrapper float_left">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
					<div class="st_dtts_left_main_wrapper float_left">
						<div class="row">
							<div class="col-md-12">
								<div class="st_dtts_ineer_box float_left">
									<ul>
										<li><span class="dtts1">Ngày chiếu</span>  <span class="dtts2">{{ $showtime->Date_show }}</span>
										</li>
										<li><span class="dtts1">Giờ chiếu</span>  <span class="dtts2">{{ $showtime->Time_show }}</span>
										</li>
										<li><span class="dtts1">Rạp</span>  <span class="dtts2">{{ $showtime->theater->name }}</span>
										</li>
										@php
                                            $seatNumbers = $seats->pluck('number')->all();
                                            $seatDisplay = implode(', ', $seatNumbers);
                                        @endphp
                                        <li><span class="dtts1">Ghế</span>  <span class="dtts2">{{ $seatDisplay }} ({{ count($seatNumbers) }} Vé)</span></li>
									</ul>
								</div>
							</div>
							<div class="col-md-12">
								<div class="st_cherity_section float_left">
									<div class="st_cherity_img float_left">
										<img src="source/website/images/{{ $showtime->movie->banner_doc }}" alt="img">
									</div>

								</div>
							</div>

							<div class="col-md-12">
								<div class="st_cherity_btn float_left">
									<h3>CHỌN PHƯƠNG THỨC THANH TOÁN</h3>
									<ul>
										<li><a href="#"><i class="flaticon-tickets"></i> &nbsp;M-Ticket</a>
										</li>
										<li><a href="#"><i class="flaticon-tickets"></i> &nbsp;Box office Pickup </a>
										</li>
										<li>
                                            <form action="{{ route('vnpay',['showtimeId'=> $showtime->id]) }}" method="POST">
                                            @csrf
                                            <input type='hidden' name="total" value="{{ $totalPrice }}">
                                            <button type="submit" name="redirect" class="btn btn-primary">Thanh toán</button>
                                        </form>
										</li>
                                        {{-- <li><form action="{{ route('book.Datve', $showtime->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" name="redirect" class="btn btn-primary">Thanh toán</button>
                                        </form>
										</li> --}}
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="row">
						<div class="col-md-12">
							<div class="st_dtts_bs_wrapper float_left">
								<div class="st_dtts_bs_heading float_left">
									<p>Đặt vé</p>
								</div>
								<div class="st_dtts_sb_ul float_left">
									<ul>
										<li>{{ $seatDisplay }}
											<br>({{ count($seatNumbers) }} Vé)  <span> {{number_format($Price) }} nghìn đồng</span>
										</li>
										<li>Phí xử lí internet <span>100 đồng</span>
										</li>
									</ul>
									<p>Phí đặt chỗ <span>50</span>
									</p>
									<p>GST tích hợp (IGST) @ 18% <span>50</span>
									</p>
								</div>
								<div class="st_dtts_sb_h2 float_left">
									<h3>Tổng tiền <span>{{ number_format($totalPrice) }} nghìn đồng</span></h3>

									<h5>Số tiền phải trả <span>{{ number_format($totalPrice) }} nghìn đồng</span></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- st dtts section End -->
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
	<script src="source/website/js/plugin/rs_slider/jquery.themepunch.revolution.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/jquery.themepunch.tools.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.addon.snow.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.actions.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.carousel.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.kenburn.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.layeranimation.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.migration.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.navigation.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.parallax.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.slideanims.min.js"></script>
	<script src="source/website/js/plugin/rs_slider/revolution.extension.video.min.js"></script>
	<script src="source/website/js/custom.js"></script>
	<!--main js file end-->
	<script>
		//* Isotope js
		    function protfolioIsotope(){
		        if ( $('.st_fb_filter_left_box_wrapper').length ){
		            // Activate isotope in container
		            $(".protfoli_inner, .portfoli_inner").imagesLoaded( function() {
		                $(".protfoli_inner, .portfoli_inner").isotope({
		                    layoutMode: 'masonry',
		                });
		            });

		            // Add isotope click function
		            $(".protfoli_filter li").on('click',function(){
		                $(".protfoli_filter li").removeClass("active");
		                $(this).addClass("active");
		                var selector = $(this).attr("data-filter");
		                $(".protfoli_inner, .portfoli_inner").isotope({
		                    filter: selector,
		                    animationOptions: {
		                        duration: 450,
		                        easing: "linear",
		                        queue: false,
		                    }
		                });
		                return false;
		            });
		        };
		    };
		 protfolioIsotope ();

		  function changeQty(increase) {
				            var qty = parseInt($('.select_number').find("input").val());
				            if (!isNaN(qty)) {
				                qty = increase ? qty + 1 : (qty > 1 ? qty - 1 : 1);
				                $('.select_number').find("input").val(qty);
				            } else {
				                $('.select_number').find("input").val(1);
				            }
				        }
	</script>
</body>


<!-- Mirrored from www.webstrot.com/html/moviepro/html/booking_type.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 05:48:30 GMT -->
</html>
