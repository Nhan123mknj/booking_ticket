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


<!-- Mirrored from www.webstrot.com/html/moviepro/html/seat_booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 05:48:35 GMT -->
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
    <link rel="stylesheet" type="text/css" href="source/website/css/button_seat.css" />
	<link rel="stylesheet" id="theme-color" type="text/css" href="#"/>
	<!-- favicon links -->
	<link rel="shortcut icon" type="image/png" href="source/website/images/header/favicon.ico" />
</head>

<body>
    <style>
#submitButton {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007BFF;
    color: white;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    float:right;
}

#submitButton:hover {
    background-color: #0056b3;
}
    </style>
	<!-- preloader Start -->
	<div id="preloader">
		<div id="status">
			<img src="source/website/images/header/horoscope.gif" id="preloader_image" alt="loader">
		</div>
	</div>
	<!-- color picker start -->
	<!-- st top header Start -->
	<div class="st_bt_top_header_wrapper float_left">
		<div class="container container_seat">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="st_bt_top_back_btn st_bt_top_back_btn_seatl float_left">	<a href="{{ route('showtimeByMovie',$showtime->movie->slug) }}"><i class="fas fa-long-arrow-alt-left"></i> &nbsp;Back</a>
					</div>
					<div class="cc_ps_quantily_info cc_ps_quantily_info_tecket">
						<p>Select Ticket</p>
											<div class="select_number">
												<button onclick="changeQty(1); return false;" class="increase"><i class="fa fa-plus"></i>
												</button>
												<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
												<button onclick="changeQty(0); return false;" class="decrease"><i class="fa fa-minus"></i>
												</button>
											</div>
											<input type="hidden" name="product_id" />
										</div>
					</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="st_bt_top_center_heading st_bt_top_center_heading_seat_book_page float_left">
						<h3>{{ $showtime->movie->title }}</h3>
						<h4>{{ $showtime->Time_show }}</h4>
                        <h4>{{ $showtime->theater->name}}</h4>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="st_bt_top_close_btn st_bt_top_close_btn2 float_left">	<a href="#"><i class="fa fa-times"></i></a>
					</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- st top header Start -->
	<!-- st seat Layout Start -->
	<div class="st_seatlayout_main_wrapper float_left">
		<div class="container container_seat">
			<div class="st_seat_lay_heading float_left">
				<h3>MÀN HÌNH</h3>
			</div>
			<div class="st_seat_full_container">
				<div class="st_seat_lay_economy_wrapper float_left">
					<div class="screen">
						<img src="source/website/images/content/screen.png">
					</div>

				</div>
				<div class="st_seat_lay_economy_wrapper st_seat_lay_economy_wrapperexicutive float_left">

                    <form action="{{ route('seats.select', $showtime->id) }}" method="POST">
                        @csrf
                        <div class="st_seat_lay_row float_left">
                            <ul>
                                @foreach($showtime->theater->seats as $seat)
                                    @if ($seat->status == 0)
                                    <li class="seat_disable">
                                        <input type="checkbox" id="c{{ $seat->number }}" name="seat[]" value="{{ $seat->id }}" disabled>
                                        <label for="c{{ $seat->number }}"></label>
                                    </li>
                                    @elseif($seat->status == 1)
                                    <li>
                                        <span>Pay Rs.790.00</span>
                                        <input type="checkbox" id="c{{ $seat->number }}" name="seat[]" value="{{ $seat->id }}">
                                        <label for="c{{ $seat->number }}"></label>
                                    </li>
                                    @else
                                    <li class="seat_disable">
                                        <input type="checkbox" id="c{{ $seat->number }}" name="seat[]" value="{{ $seat->id }}" disabled>
                                        <label for="c{{ $seat->number }}"></label>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <input type="submit" value="Đặt chỗ" id="submitButton">
                    </form>

				</div>
			</div>
		</div>
	</div>
	<!-- st seat Layout End -->
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
    <script>document.addEventListener('DOMContentLoaded', function () {
        const submitButton = document.getElementById('submitButton');
        const checkboxes = document.querySelectorAll('input[name="seat[]"]');

        function toggleSubmitButton() {
            const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            submitButton.disabled = !anyChecked;
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', toggleSubmitButton);
        });

        toggleSubmitButton(); // Initial check
    });</script>
</body>


<!-- Mirrored from www.webstrot.com/html/moviepro/html/seat_booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 May 2024 05:48:36 GMT -->
</html>
