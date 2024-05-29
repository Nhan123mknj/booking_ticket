@extends('master')
@section('content')

<!-- prs navigation End -->
<!-- prs title wrapper Start -->
<div class="prs_title_main_sec_wrapper">
    <div class="prs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_title_heading_wrapper">
                    <h2>Liên hệ</h2>
                    <ul>
                        <li><a href="{{ route('trang-chu') }}">Trang chủ</a>
                        </li>
                        <li>&nbsp;&nbsp; >&nbsp;&nbsp; Liên hệ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs title wrapper End -->
<!-- prs contact form wrapper Start -->
<div class="prs_contact_form_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="prs_contact_left_wrapper">
                    <h2>Liên hệ đến chúng tôi</h2>
                </div>
                <div class="row">
                    <form method="POST" action="{{ route('lien-he1') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="prs_contact_input_wrapper">
                                <input name="name" type="text" class="require" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="prs_contact_input_wrapper">
                                <input name="email"type="email" class="require" data-valid="email" data-error="Email should be valid." placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="prs_contact_input_wrapper">
                                <textarea name="message" class="require" rows="7" placeholder="Comment"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="response"></div>
                            <div class="prs_contact_input_wrapper prs_contact_input_wrapper2">
                                <ul>
                                    <li>
                                        <input type="hidden" name="form_type" value="contact" />
                                        <button type="submit" class="submitForm">Gửi</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="prs_contact_right_section_wrapper">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> &nbsp;&nbsp;&nbsp;facebook.com/presenter</a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> &nbsp;&nbsp;&nbsp;twitter.com/presenter</a>
                        </li>
                        <li><a href="#"><i class="fa fa-vimeo"></i> &nbsp;&nbsp;&nbsp;vimeo.com/presenter</a>
                        </li>
                        <li><a href="#"><i class="fa fa-instagram"></i> &nbsp;&nbsp;&nbsp;instagram.com/presenter</a>
                        </li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i> &nbsp;&nbsp;&nbsp;youtube.com/presenter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hs_contact_map_main_wrapper">
    <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.1103481701125!2d105.6931747752952!3d18.659043582461663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cddf0bf20f23%3A0x86154b56a284fa6d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBWaW5o!5e0!3m2!1svi!2s!4v1700483833612!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
</div>

<div class="prs_contact_info_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="prs_contact_info_box_wrapper">
                    <div class="prs_contact_info_smallbox">	<i class="flaticon-call-answer"></i>
                    </div>
                    <h3>Liên hệ</h3>
                    <p>+91-123456789
                        <br>+91-4444-5555</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="prs_contact_info_box_wrapper prs_contact_info_box_wrapper2">
                    <div class="prs_contact_info_smallbox">	<i class="flaticon-call-answer"></i>
                    </div>
                    <h3>Địa chỉ</h3>
                    <p>601 - Ram Nagar , India
                        <br>Omex City 245 , America</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="prs_contact_info_box_wrapper prs_contact_info_box_wrapper2">
                    <div class="prs_contact_info_smallbox">	<i class="flaticon-call-answer"></i>
                    </div>
                    <h3>Email</h3>
                    <p><a href="#">presenter@example.com</a>
                        <br> <a href="#">movie@example.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs contact info End -->
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
<!-- prs patner slider End -->
<!-- prs Newsletter Wrapper Start -->
<div class="prs_newsletter_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="prs_newsletter_text">
                    <h3>Get update sign up now !</h3>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="prs_newsletter_field">
                    <input type="text" placeholder="Enter Your Email">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
