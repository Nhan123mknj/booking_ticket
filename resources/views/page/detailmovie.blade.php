@extends('master')
@section('content')
<div class="prs_top_video_section_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="st_video_slider_inner_wrapper float_left" >
                    <div class="st_video_slider_overlay"></div>
                    <div class="st_video_slide_sec float_left">
                        <a href="{{ $details->trailer_url }}" class="test-popup-link video-link" title="title">
                            <img src="source/website/images/index_III/icon.png" alt="img">
                        </a>
                        <h3>{{ $details->title }}</h3>
                        <p>ENGLISH, HINDI, TAMIL</p>
                        <h4>@foreach ($details->genres as $genre)
                            {{ $loop->first ? '' : ' | ' }}<span>{{ $genre->name }}</span>
                        @endforeach</h4>
                        <h5><span>2d</span> <span>3d</span> <span>D 4DX</span> <span>Imax 3D</span></h5>
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
                                <li data-animation="animated fadeInUp" class=""><i class="far fa-calendar-alt"></i> {{ $details->release_date }}</li>
                                <li data-animation="animated fadeInUp" class=""><i class="far fa-clock"></i>{{ $details->duration }} minutes</li>
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
        <div class="st_slider_rating_left">
            <div class="st_rating_box">
                <fieldset class="rating">
                <h3>3</h3>
                    <input type="radio" name="rating" value="5" />
                    <label class="full" title="5 stars"></label>
                    <input type="radio" name="rating" value="4 and a half" />
                    <label class="half" title="4.5 stars"></label>
                    <input type="radio" name="rating" value="4" />
                    <label class="full" title="4 stars"></label>
                    <input type="radio" name="rating" value="3 and a half" />
                    <label class="half" title="3.5 stars"></label>
                    <input type="radio" name="rating" value="3" />
                    <label class="full" title="3 stars"></label>
                    <input type="radio" name="rating" value="2 and a half" />
                    <label class="half" title="2.5 stars"></label>
                    <input type="radio" name="rating" value="2" />
                    <label class="full" title="2 stars"></label>
                    <input type="radio" name="rating" value="1 and a half" />
                    <label class="half" title="1.5 stars"></label>
                    <input type="radio" name="rating" value="1" />
                    <label class="full" title="1 star"></label>
                    <input type="radio" name="rating" value="half" />
                    <label class="half" title="0.5 stars"></label>
                                            </fieldset>
                <h4>CRITICS RATING</h4>
            </div>
            <div class="st_rating_box st_rating_box2">
                <fieldset class="rating">
                <h3>4.5&nbsp;&nbsp;</h3>
                    <input type="radio" name="rating" value="5" />
                    <label class="full" title="5 stars"></label>
                    <input type="radio" name="rating" value="4 and a half" />
                    <label class="half" title="4.5 stars"></label>
                    <input type="radio" name="rating" value="4" />
                    <label class="full" title="4 stars"></label>
                    <input type="radio" name="rating" value="3 and a half" />
                    <label class="half" title="3.5 stars"></label>
                    <input type="radio" name="rating" value="3" />
                    <label class="full" title="3 stars"></label>
                    <input type="radio" name="rating" value="2 and a half" />
                    <label class="half" title="2.5 stars"></label>
                    <input type="radio" name="rating" value="2" />
                    <label class="full" title="2 stars"></label>
                    <input type="radio" name="rating" value="1 and a half" />
                    <label class="half" title="1.5 stars"></label>
                    <input type="radio" name="rating" value="1" />
                    <label class="full" title="1 star"></label>
                    <input type="radio" name="rating" value="half" />
                    <label class="half" title="0.5 stars"></label>
                                            </fieldset>
                <h4>USERS RATING</h4>
            </div>
            <div class="st_rating_box st_rating_box2">
                <fieldset class="rating">
                <h3>0&nbsp;&nbsp;</h3>
                    <input type="radio" name="rating" value="5" />
                    <label class="full" title="5 stars"></label>
                    <input type="radio" name="rating" value="4 and a half" />
                    <label class="half" title="4.5 stars"></label>
                    <input type="radio" name="rating" value="4" />
                    <label class="full" title="4 stars"></label>
                    <input type="radio" name="rating" value="3 and a half" />
                    <label class="half" title="3.5 stars"></label>
                    <input type="radio" name="rating" value="3" />
                    <label class="full" title="3 stars"></label>
                    <input type="radio" name="rating" value="2 and a half" />
                    <label class="half" title="2.5 stars"></label>
                    <input type="radio" name="rating" value="2" />
                    <label class="full" title="2 stars"></label>
                    <input type="radio" name="rating" value="1 and a half" />
                    <label class="half" title="1.5 stars"></label>
                    <input type="radio" name="rating" value="1" />
                    <label class="full" title="1 star"></label>
                    <input type="radio" name="rating" value="half" />
                    <label class="half" title="0.5 stars"></label>
                                            </fieldset>
                <h4>RATE IT</h4>
            </div>
        </div>
        <div class="st_slider_rating_right">
            <div class="st_slider_rating_btn prs_animate_btn1">
                <ul>
                    <li data-animation="animated fadeInUp"><a href="#" class="button button--tamaya prs_upcom_main_btn" data-text="book now"><span>book now</span></a>
                                    </li>
                </ul>
            </div>
            <div class="st_slider_rating_btn_heart">
                <h5><i class="fa fa-heart"></i> 85%</h5>
                <h4>52,291 votes</h4>
            </div>
        </div>
    </div>
</div>
<!-- st slider rating wrapper End -->
<!-- st slider sidebar wrapper Start -->
<div class="st_slider_index_sidebar_main_wrapper st_slider_index_sidebar_main_wrapper_md float_left">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="st_indx_slider_main_container float_left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ne_busness_main_slider_wrapper float_left">
                                        <div class="ne_recent_heading_main_wrapper ne_recent_heading_main_wrapper_index_II float_left">
                                            <h2>TRENDING STORIES</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="st_md_ts_main_sec float_left">
                                        <img src="source/website/images/content/md1.png" alt="img">
                                        <p><a href="#">Aquaman: Film Review - Makes A Refreshing Spl...</a>
                                        </p>	<span>14 December</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="st_md_ts_main_sec float_left">
                                        <img src="source/website/images/content/md2.png" alt="img">
                                        <p><a href="#">Here's Proof That the Hype Is Real for James ...</a>
                                        </p>	<span>25 December</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="st_md_ts_main_sec float_left">
                                        <img src="source/website/images/content/md3.png" alt="img">
                                        <p><a href="#">The Epic Cast of Aquaman Will Definitely Make...</a>
                                        </p>	<span>28 December</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="prs_upcome_tabs_wrapper prs_upcome_tabs_wrapper_mss float_left">
                                <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="best" role="tab" data-toggle="tab">Summary</a>
                        </li>
                        <li role="presentation"><a href="#menu2" aria-controls="trand" role="tab" data-toggle="tab">Behind The Scenes</a>
                        </li>
                    </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div id="home" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="st_md_summ_pera float_left">
                                                <h5>Mô tả</h5>
                                                <div>{!! $details->description !!}</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="prs_ms_scene_slider_img prs_ms_scene_slider_img22">
                                                <img src="source/website/images/content/movie_single/sc1.jpg" alt="scene_img">
                                                <div class="prs_ms_scene_img_overlay">	<a href="source/website/images/content/movie_single/sc1.jpg" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><i class="flaticon-tool"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="prs_ms_scene_slider_img prs_ms_scene_slider_img22">
                                                <img src="source/website/images/content/movie_single/sc2.jpg" alt="scene_img">
                                                <div class="prs_ms_scene_img_overlay">	<a href="source/website/images/content/movie_single/sc2.jpg" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><i class="flaticon-tool"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="prs_ms_scene_slider_img prs_ms_scene_slider_img22">
                                                <img src="source/website/images/content/movie_single/sc3.jpg" alt="scene_img">
                                                <div class="prs_ms_scene_img_overlay">	<a href="source/website/images/content/movie_single/sc3.jpg" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><i class="flaticon-tool"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="prs_ms_scene_slider_img prs_ms_scene_slider_img22">
                                                <img src="source/website/images/content/movie_single/sc4.jpg" alt="scene_img">
                                                <div class="prs_ms_scene_img_overlay">	<a href="source/website/images/content/movie_single/sc4.jpg" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><i class="flaticon-tool"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="prs_ms_scene_slider_img prs_ms_scene_slider_img22">
                                                <img src="source/website/images/content/movie_single/sc5.jpg" alt="scene_img">
                                                <div class="prs_ms_scene_img_overlay">	<a href="source/website/images/content/movie_single/sc5.jpg" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><i class="flaticon-tool"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="prs_ms_scene_slider_img prs_ms_scene_slider_img22">
                                                <img src="source/website/images/content/movie_single/sc6.jpg" alt="scene_img">
                                                <div class="prs_ms_scene_img_overlay">	<a href="source/website/images/content/movie_single/sc6.jpg" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><i class="flaticon-tool"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="st_ind_sidebar_right_wrapper float_left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="st_ind_sidebar_md_textbox float_left">
                                <p>Highest grossing movie in Mumbai in last 24 hours</p>	<a href="#">Know Box Office Report</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="st_ind_sidebar_md_textbox_btn float_left">
                                <ul>
                                    <li>	<a href="#">Corporate booking &nbsp; <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="st_ind_sidebar_advertiz st_ind_sidebar_advertiz_md float_left">
                                <a href="#">
                                    <img src="source/website/images/index_III/add.png" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="st_ind_sidebar_advertiz_social st_video_slide_social_left  float_left">
                                <h3>Profiles</h3>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- st slider sidebar wrapper End -->
<!-- prs theater Slider Start -->
<div class="prs_theater_main_slider_wrapper">
    <div class="prs_theater_img_overlay"></div>
    <div class="prs_theater_sec_heading_wrapper">
        <h2>PHIM SẮP CHIẾU</h2>
    </div>
    <div class="wrap-album-slider">
        <ul class="album-slider">
            @foreach ($upmovies as $item)
            <li class="album-slider__item">
                <figure class="album">
                    <div class="prs_upcom_movie_box_wrapper">
                        <div class="prs_upcom_movie_img_box">
                            <img src="{{ asset('source/website/images/' . $item->banner_url) }}" alt="movie_img" />
                            <div class="prs_upcom_movie_img_overlay"></div>
                            <div class="prs_upcom_movie_img_btn_wrapper">
                                <ul>
                                    <li><a href="{{ $item->trailer_url }}" class="test-popup-link video-link" title="title">    Xem trailer</a>
                                    </li>
                                    <li><a href="{{ route('detailMovie',$item->slug) }}">Chi tiết</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="prs_upcom_movie_content_box">
                            <div class="prs_upcom_movie_content_box_inner"style="height: 112px">
                                <h2><a href="{{ route('detailMovie',$item->slug) }}">{{ $item->title }}</a></h2>
                                <p>@foreach ($item->genres as $genre)
                                    {{ $loop->first ? '' : ' | ' }}<span>{{ $genre->name }}</span>
                                @endforeach</p>	<i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prs_upcom_movie_content_box_inner_icon">
                                <ul>
                                    <li><a href="movie_booking.html"><i class="flaticon-cart-of-ecommerce"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End album body -->
                </figure>
                <!-- End album -->
            </li>
            @endforeach

            <!-- End album slider item -->
        </ul>
        <!-- End slider -->
    </div>
</div>
<!-- prs theater Slider End -->
<!-- prs patner slider Start -->
<div class="prs_patner_main_section_wrapper prs_patner_main_section_wrapper_ind3">
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