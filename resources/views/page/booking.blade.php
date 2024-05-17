@extends('master')
@section('content')
<div class="prs_title_main_sec_wrapper">
    <div class="prs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_title_heading_wrapper">
                    <h2>Movie Booking</h2>
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li>&nbsp;&nbsp; >&nbsp;&nbsp; Movie Booking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs title wrapper End -->
<!-- prs video top Start -->
<div class="prs_booking_main_div_section_wrapper">
<div class="prs_top_video_section_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="st_video_slider_inner_wrapper float_left">
                    <div class="st_video_slider_overlay"></div>
                    <div class="st_video_slide_sec float_left">
                        <a rel='external' href='{{ $movie->trailer_url }}' title='title' class="test-popup-link">
                            <img src="source/website/images/index_III/icon.png" alt="img">
                        </a>
                        <h3>{{ $movie->title }}</h3>
                        <p>ENGLISH, HINDI, TAMIL</p>
                        <h4>@foreach ($movie->genres as $genre)
                            {{ $loop->first ? '' : ' | ' }}<span>{{ $genre->name }}</span>
                        @endforeach</h4>

                    </div>
                    <div class="st_video_slide_social float_left">
                    <div class="st_slider_rating_btn_heart st_slider_rating_btn_heart_5th">
                            <h5><i class="fa fa-heart"></i> 85%</h5>
                            <h4>52,291 votes</h4>
                        </div>
                        <div class="st_video_slide_social_left float_left">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="st_video_slide_social_right float_left">
                            <ul>
                                <li data-animation="animated fadeInUp" class=""><i class="far fa-calendar-alt"></i> {{ $movie->release_date }}</li>
                                <li data-animation="animated fadeInUp" class=""><i class="far fa-clock"></i> {{ $movie->duration }} phút</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs video top End -->
<!-- st slider rating wrapper Start -->
<div class="st_slider_rating_main_wrapper float_left">
    <div class="container">
        <div class="st_calender_tabs">
            <ul class="nav nav-tabs">
                @php $uniqueDates = $movie->showtimes->sortBy('Date_show')->groupBy('Date_show'); @endphp
                @foreach ($uniqueDates as $date => $times)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#date_{{ $loop->index }}">
                            {{ \Carbon\Carbon::parse($date)->format('D') }} <br>
                            {{ \Carbon\Carbon::parse($date)->format('d') }}
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
<!-- st slider rating wrapper End -->
<!-- st slider sidebar wrapper Start -->
<div class="st_slider_index_sidebar_main_wrapper st_slider_index_sidebar_main_wrapper_booking float_left">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="st_indx_slider_main_container float_left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content">
                                @foreach ($uniqueDates as $date => $times)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="date_{{ $loop->index }}">
                                        <div class="st_calender_contant_main_wrapper float_left" >
                                            @php
                                                $groupedByTheater = $times->groupBy('theater.id');
                                            @endphp
                                            @foreach ($groupedByTheater as $theaterId => $showtimes)
                                                <div class="st_calender_row_cont float_left"style="border-bottom: none;">
                                                    <div class="st_calender_asc">
                                                        <div class="st_calen_asc_heart_cont">
                                                            <h3>{{ $showtimes->first()->theater->name ?? 'Default Cinema' }}</h3>

                                                        </div>
                                                    </div>
                                                    <div class="st_calen_asc_tecket_time_select">
                                                        <ul>
                                                            @foreach ($showtimes as $showtime)
                                                                <li>
                                                                    <a href="{{ route('seats.index',$showtime->id) }}">{{ \Carbon\Carbon::parse($showtime->Time_show)->format('h:i A') }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="prs_mcc_left_side_wrapper">
                    <div class="prs_mcc_left_searchbar_wrapper">
                        <input type="text" placeholder="Search Movie">
                        <button><i class="flaticon-tool"></i>
                        </button>
                    </div>
                    <div class="prs_mcc_bro_title_wrapper">
                        <h2>Thể loại</h2>
                        <ul>
                            @foreach ($genres as $item)
                            @if ($item->movies_count > 0)
                                <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('moviesByGenre', ['id' => $item->id]) }}">{{ $item->name }} <span>{{ $item->movies_count }}</span></a>
                                </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- st slider sidebar wrapper End -->
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
