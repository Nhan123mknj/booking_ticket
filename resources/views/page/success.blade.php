@extends('master')
@section('content')
<div class="prs_title_main_sec_wrapper">
    <div class="prs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_title_heading_wrapper">
                    <h2>Confirmation Screen</h2>
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li>&nbsp;&nbsp; >&nbsp;&nbsp; Confirmation Screen</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs title wrapper End -->
<!-- st bc Start -->
<div class="st_bcc_main_main_wrapper float_left">
    <div class="st_bcc_main_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="st_bcc_heading_wrapper float_left">	<i class="fa fa-check-circle"></i>
                        <h3>Thanh toán <span>{{ number_format($totalPrice) }} VND</span> Hoàn tất</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="st_bcc_ticket_boxes_wrapper float_left">
                        <div class="st_bcc_tecket_top_hesder float_left">
                            <p>Thanh toán hoàn tất</p> Booking ID<span> </span>
                        </div>
                        <div class="st_bcc_tecket_bottom_hesder float_left">
                            <div class="st_bcc_tecket_bottom_left_wrapper">
                                <div class="st_bcc_tecket_bottom_inner_left">
                                    <div class="st_bcc_teckt_bot_inner_img">
                                        <img style="width: 85px;height:127px" src="{{ asset('source/website/images/' . $bookings->first()->showtime->movie->banner_url) }}" alt="img">
                                    </div>

                                    <div class="st_bcc_teckt_bot_inner_img_cont">


                                        <h3>{{ $bookings->first()->showtime->Date_show }} | {{ $bookings->first()->showtime->Time_show }}</h3>
                                        <h6>{{ $bookings->first()->showtime->movie->title }}</h6>
                                    </div>
                                    <div class="st_purchase_img">
                                        <img src="source/website/images/content/pur2.png" alt="img">
                                    </div>
                                </div>
                                @php
                                            $seatNumbers = $seats->pluck('number')->all();
                                            $seatDisplay = implode(', ', $seatNumbers);
                                @endphp
                                <div class="st_bcc_tecket_bottom_inner_right">	<i class="fas fa-chair"></i>
                                    <h3>({{ count($seatNumbers) }} Vé) <br>

                                    <span> Ghế {{ $seatDisplay }}</span></h3>
                                </div>
                            </div>
                            <div class="st_bcc_tecket_bottom_right_wrapper">
                                <img src="{{ asset('qrcodes/' . $bookings->first()->qr_code_path) }}" alt="img">
                                <h4>Booking ID<br>SSST0000310644</h4>
                            </div>
                            <div class="st_bcc_tecket_bottom_left_price_wrapper">
                                <h4>Tổng tiền</h4>
                                <h5>{{ number_format($totalPrice) }} VND</h5>
                            </div>
                        </div>
                    </div>
                    <div class="st_bcc_ticket_boxes_bottom_wrapper float_left">
                        <p>Bạn có thể check Email của bạn.
                            <br>Chúng tôi đã gửi mã QRCODE vào email của bạn.</p>
                        <ul>
                            <li><a href="#">INVITE FRIENDS</a>
                            </li>
                            <li><a href="#">Locate Friend</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- st bc End -->
<!-- prs patner slider Start -->
<div class="prs_patner_main_section_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_heading_section_wrapper">
                    <h2>Our Patner’s</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_pn_slider_wraper">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="prs_pn_img_wrapper">
                                <img src="source/website/images/content/p1.jpg" alt="patner_img">
                            </div>
                        </div>
                        <div class="item">
                            <div class="prs_pn_img_wrapper">
                                <img src="source/website/images/content/p2.jpg" alt="patner_img">
                            </div>
                        </div>
                        <div class="item">
                            <div class="prs_pn_img_wrapper">
                                <img src="source/website/images/content/p3.jpg" alt="patner_img">
                            </div>
                        </div>
                        <div class="item">
                            <div class="prs_pn_img_wrapper">
                                <img src="source/website/images/content/p4.jpg" alt="patner_img">
                            </div>
                        </div>
                        <div class="item">
                            <div class="prs_pn_img_wrapper">
                                <img src="source/website/images/content/p5.jpg" alt="patner_img">
                            </div>
                        </div>
                        <div class="item">
                            <div class="prs_pn_img_wrapper">
                                <img src="source/website/images/content/p6.jpg" alt="patner_img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
