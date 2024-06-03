@extends('master')
@section('content')
<div class="prs_top_video_section_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="st_video_slider_inner_wrapper float_left">
                    <div class="st_video_slider_overlay"></div>
                    <div class="st_video_slide_sec float_left">
                        <a href="{{ $bannerMovies->trailer_url }}" class="test-popup-link video-link" title="title">
                            <img src="source/website/images/index_III/icon.png" alt="img">
                        </a>
                        <h3>{{ $bannerMovies->title }}</h3>
                        <p>ENGLISH, HINDI, TAMIL</p>
                        <div class="genre-list" style ="white-space: nowrap;font-size: 12px;color: #FFFFFF;letter-spacing: 1px;text-transform: uppercase;padding-top: 10px;">
                            @foreach ($bannerMovies->genres as $genre)
                                {{ $loop->first ? '' : ' | ' }}<span>{{ $genre->name }}</span>
                            @endforeach
                        </div>
                        <h5><span>2d</span> <span>3d</span> <span>D 4DX</span> <span>Imax 3D</span></h5>
                    </div>
                    <div class="st_video_slide_social float_left">
                    <div class="st_slider_rating_btn_heart st_slider_rating_btn_heart_5th">
                            <h5><i class="fa fa-heart"></i> 85%</h5>
                            <h4>52,291 votes</h4>
                        </div>
                        <div class="st_video_slide_social_left float_left">
                            <ul>
                                <li><a href="#"><i class="bx bxl-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="bx bxl-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="bx bxl-linkedin"></i></a>
                                </li>
                                <li><a href="#"><i class="bx bxl-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="st_video_slide_social_right float_left">
                            <ul>
                                <li data-animation="animated fadeInUp" class=""><i class="far fa-calendar-alt"></i> {{ $bannerMovies->release_date }}</li>
                                <li data-animation="animated fadeInUp" class=""><i class="far fa-clock"></i> {{ $bannerMovies->duration }} phút</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs video top End -->
<!-- kv slider wrapper Start -->
<div class="kv_main_slider_wrapper slider-area">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner" role="listbox">
            @php $i = 1; @endphp
            @foreach ($slides as $item)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                <div class="carousel-captions caption-{{ $i++ }}">
                    <div class="container">
                        <div class="st_slider_left_cont_main_wrapper">
                            <div class="content st_slider_left_contact">
                                <h3 data-animation="animated fadeInUp">
                                    @foreach ($item->genres as $genre)
                                    {{ $loop->first ? '' : ' | ' }}<span>{{ $genre->name }}</span>
                                    @endforeach</h3>
                                <h2 data-animation="animated fadeInUp">ENGLISH, HINDI, TAMIL	</h2>
                                <h4 data-animation="animated fadeInUp">{{ $item->title }} <span>2d</span> <span>3d</span> <span>D 4DX</span> <span>Imax 3D</span></h4>
                                <div class="st_slider_list float_left">
                                    <ul>
                                        <li data-animation="animated fadeInUp"><i class="fa fa-calendar"></i> {{ $item->release_date }}</li>
                                        <li data-animation="animated fadeInUp"><i class="fa fa-clock-o"></i> {{ $item->duration }} phút</li>
                                        <li data-animation="animated fadeInUp"><i class="fa fa-heart"></i> 50,133 votes</li>
                                    </ul>
                                </div>
                                <div class="prs_animate_btn1 prs_upcom_main_wrapper prs_third_slider_btn">
                                    <ul>
                                        <li data-animation="animated fadeInUp"><a href="{{ route('showtimeByMovie',$item->slug) }}" class="button button--tamaya prs_upcom_main_btn" data-text="Đặt vé"><span>Đặt vé</span></a>
                                    </li>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="st_slider_right_cont_main_wrapper">
                            <div class="content">
                                <div class="st_slider_img_wrapper float_left">
                                    <img src="{{ asset('source/website/images/' . $item->banner_doc) }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"><span class="number"></span>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""><span class="number"></span>
                </li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""><span class="number"></span>
                </li>
            </ol>
            <div class="carousel-nevigation">
                <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">	<i class="flaticon-back"></i>
                </a>
                <a class="next" href="#carousel-example-generic" role="button" data-slide="next"> <i class="flaticon-right-arrow"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- kv slider wrapper End -->
<!-- st slider sidebar wrapper Start -->
<div class="st_slider_index_sidebar_main_wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="st_indx_slider_main_container float_left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ne_busness_main_slider_wrapper">
                                        <div class="ne_recent_heading_main_wrapper">
                                            <h2>Sắp chiếu</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="ne_businees_slider_wrapper">
                                        <div class="owl-carousel owl-theme">

                                            @foreach($upComing as $item)
                                            <div class="item" >
                                                <div class="prs_upcom_movie_box_wrapper">
                                                <div class="prs_upcom_movie_img_box">
                                                    <img src="{{ asset('source/website/images/' . $item->banner_url) }}" alt="movie_img" />
                                                    <div class="prs_upcom_movie_img_overlay"></div>
                                                    <div class="prs_upcom_movie_img_btn_wrapper">
                                                        <ul>
                                                            <li><a href="{{ $item->trailer_url }}" class="test-popup-link video-link" title="title">Xem trailer</a>
                                                            </li>
                                                            <li><a href="{{ route('detailMovie',$item->slug) }}">Chi tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="prs_upcom_movie_content_box">
                                                    <div class="prs_upcom_movie_content_box_inner" style="height: 150px">
                                                        <h2><a href="{{ route('detailMovie',$item->slug) }}">{{ $item->title }}</a></h2>
                                                        <p> @foreach($item->genres as $genre)
                                                            {{ $loop->first ? '' : ', ' }}{{ $genre->name }}
                                                            @endforeach
                                                        </p>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $item->Star)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-e"></i> <!-- Empty star -->
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="prs_upcom_movie_content_box_inner_icon">
                                                        <ul>
                                                            <li><a href="{{ route('showtimeByMovie',$item->slug) }}"><i class="flaticon-cart-of-ecommerce"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 st_ind_seconf_slider">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ne_busness_main_slider_wrapper">
                                        <div class="ne_recent_heading_main_wrapper">
                                            <h2>Đang chiếu </h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="ne_businees_slider_wrapper">
                                        <div class="owl-carousel owl-theme">
                                            @foreach($nowPlaying as $item)
                                            <div class="item">
                                                <div class="prs_upcom_movie_box_wrapper">
                                                <div class="prs_upcom_movie_img_box">
                                                    <img src="{{ asset('source/website/images/' . $item->banner_url) }}" alt="movie_img" />
                                                    <div class="prs_upcom_movie_img_overlay"></div>
                                                    <div class="prs_upcom_movie_img_btn_wrapper">
                                                        <ul>
                                                            <li><a href="{{ $item->trailer_url }}" class="test-popup-link video-link" title="title">Xem trailer</a>
                                                            </li>
                                                            <li><a href="{{ route('detailMovie',$item->slug) }}">Chi Tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="prs_upcom_movie_content_box">
                                                    <div class="prs_upcom_movie_content_box_inner"style="height: 150px">
                                                        <h2><a href="#">{{ $item->title }}</a></h2>
                                                        <p>@foreach($item->genres as $genre)
                                                            {{ $loop->first ? '' : ', ' }}{{ $genre->name }}
                                                            @endforeach</p>
                                                            @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $item->Star)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-e"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="prs_upcom_movie_content_box_inner_icon">
                                                        <ul>
                                                            <li><a href="{{ route('showtimeByMovie',$item->slug) }}"><i class="flaticon-cart-of-ecommerce"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            @endforeach
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
                            <div class="st_ind_sidebar_advertiz float_left">
                                <a href="#">
                                    <img src="source/website/images/index_III/add.png" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="st_ind_sidebar_search float_left">
                                <div class="st_ind_sidebar_search_heading float_left">
                                    <p>Trending Search</p>
                                </div>
                                <div class="st_ind_sidebar_search_ul float_left">
                                    <div class="st_ind_sidebar_search_small_box float_left">
                                        <p><a href="#">KGF</a></p>	<span>Movies</span>
                                        <span class="st_sidebar_search_titte_count">(1050)</span>
                                    </div>
                                    <div class="st_ind_sidebar_search_small_box float_left">
                                        <p><a href="#">Pretham 2</a></p>	<span>Movies</span>
                                        <span class="st_sidebar_search_titte_count">(10)</span>
                                    </div>
                                    <div class="st_ind_sidebar_search_small_box float_left">
                                        <p><a href="#">Maari2</a></p>	<span>Movies</span>
                                        <span class="st_sidebar_search_titte_count">(120)</span>
                                    </div>
                                    <div class="st_ind_sidebar_search_small_box float_left">
                                        <p><a href="#">Njan Prakasan</a></p>	<span>Movies</span>
                                        <span class="st_sidebar_search_titte_count">(1230)</span>
                                    </div>
                                    <div class="st_ind_sidebar_search_small_box float_left">
                                        <p><a href="#">Odiyan</a></p>	<span>Movies</span>
                                        <span class="st_sidebar_search_titte_count">(480)</span>
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
<!-- st slider sidebar wrapper End -->
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
<!-- prs Newsletter Wrapper End -->
@endsection
