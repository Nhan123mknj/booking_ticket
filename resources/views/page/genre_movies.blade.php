@extends('master')
@section('content')
<div class="prs_title_main_sec_wrapper">
    <div class="prs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_title_heading_wrapper">
                    <h2>{{ $genre->name }}</h2>
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li>&nbsp;&nbsp; >&nbsp;&nbsp;Thể lọai phim</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs title wrapper End -->
<!-- prs mc slider wrapper Start -->
@include('page.slide.slide');
<!-- prs mc slider wrapper End -->
<!-- prs mc category slidebar Start -->
<div class="prs_mc_category_sidebar_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                <div class="prs_mcc_left_side_wrapper">
                    <div class="prs_mcc_left_searchbar_wrapper">
                        <form action="{{ route('searchMovie') }}" method="get">

                        <input type="text" placeholder="Tìm kiếm phim" name="keyword_submit">
                        <button type="submit" name="search_movie"><i class="flaticon-tool"></i>
                        </button>
                    </form>
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
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="prs_mcc_right_side_wrapper">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="prs_mcc_right_side_heading_wrapper">
                                <h2>Sắp chiếu</h2>
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#grid"><i class="fa fa-th-large"></i></a>
                                    </li>
                                    <li><a data-toggle="pill" href="#list"><i class="fa fa-list"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="tab-content">
                                <div id="grid" class="tab-pane fade in active">
                                    <div class="row">
                                        @foreach ($movies as $item)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 prs_upcom_slide_first">
                                            <div class="prs_upcom_movie_box_wrapper prs_mcc_movie_box_wrapper">
                                                <div class="prs_upcom_movie_img_box">
                                                    <img src="{{ asset('source/website/images/' . $item->banner_url) }}" alt="movie_img" />
                                                    <div class="prs_upcom_movie_img_overlay"></div>
                                                    <div class="prs_upcom_movie_img_btn_wrapper">
                                                        <ul>
                                                            <li><a href="{{ $item->trailer_url }}" class="test-popup-link video-link" title="title">
                                                                Xem Trailer
                                                            </a>
                                                            </li>
                                                            <li><a href="{{ route('detailMovie',$item->slug) }}">Chi tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="prs_upcom_movie_content_box">
                                                    <div class="prs_upcom_movie_content_box_inner"style="height: 150px">
                                                        <h2><a href="{{ route('detailMovie',$item->slug) }}">{{ $item->title }}</a></h2>
                                                        <p>@foreach($item->genres as $genre)
                                                            {{ $loop->first ? '' : ', ' }}{{ $genre->name }}
                                                            @endforeach
                                                        </p>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
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


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pager_wrapper gc_blog_pagination">
                                                <ul class="pagination">
                                                    <li><a href="#"><i class="flaticon-left-arrow"></i></a>
                                                    </li>
                                                    <li><a href="#">1</a>
                                                    </li>
                                                    <li><a href="#">2</a>
                                                    </li>
                                                    <li class="prs_third_page"><a href="#">3</a>
                                                    </li>
                                                    <li class="hidden-xs"><a href="#">4</a>
                                                    </li>
                                                    <li><a href="#"><i class="flaticon-right-arrow"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="list" class="tab-pane fade">
                                    <div class="row">
                                        @foreach ($movies as $item)
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="prs_mcc_list_movie_main_wrapper">
                                                <div class="prs_mcc_outer_wrapper">
                                                <div class="prs_mcc_list_movie_img_wrapper">
                                                    <img src="{{ asset('source/website/images/' . $item->banner_url) }}" alt="categoty_img" style="height: 360px">
                                                </div>
                                                <div class="prs_mcc_list_movie_img_cont_wrapper">
                                                    <div class="prs_mcc_list_left_cont_wrapper">
                                                        <h2>{{ $item->title }}</h2>
                                                        <p>@foreach($item->genres as $genre)
                                                            {{ $loop->first ? '' : ', ' }}{{ $genre->name }}
                                                            @endforeach &nbsp;&nbsp;&nbsp;<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                                                        </p>
                                                        <h4>Movie Director - {{ $item->director }}</h4>
                                                    </div>
                                                    <div class="prs_mcc_list_right_cont_wrapper">	<a href="#"><i class="flaticon-cart-of-ecommerce"></i></a>
                                                    </div>
                                                    <div class="prs_mcc_list_bottom_cont_wrapper">
                                                        <p>{{ \Illuminate\Support\Str::limit($item->description, 100, '...') }}</p>
                                                        <ul>
                                                            <li><a href="{{ $item->trailer_url }}" class="test-popup-link video-link" title="title">
                                                                Xem Trailer
                                                            </a>
                                                            </li>
                                                            <li><a href="{{ route('detailMovie',$item->slug) }}">Chi tiết</a>
                                                            </li>
                                                        </ul>
                                                    </div>
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
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 visible-sm visible-xs">
                <div class="prs_mcc_left_side_wrapper">
                    <div class="prs_mcc_left_searchbar_wrapper">
                        <input type="text" placeholder="Search Movie">
                        <button><i class="flaticon-tool"></i>
                        </button>
                    </div>
                    <div class="prs_mcc_bro_title_wrapper">
                        <h2>browse title</h2>
                        <ul>
                            <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">All <span>23,124</span></a>
                            </li>
                            <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Action <span>512</span></a>
                            </li>
                            <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Romantic <span>548</span></a>
                            </li>
                            <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Love <span>557</span></a>
                            </li>
                            <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Musical <span>554</span></a>
                            </li>
                            <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Drama <span>567</span></a>
                            </li>
                            <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Thriller <span>689</span></a>
                            </li>
                            <li><i class="fa fa-caret-right"></i> &nbsp;&nbsp;&nbsp;<a href="#">Horror <span>478</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="prs_mcc_event_title_wrapper">
                        <h2>Top Events</h2>
                        <img src="source/website/images/content/movie_category/event_img.jpg" alt="event_img">
                        <h3><a href="#">Music Event in india</a></h3>
                        <p>Mumbai & Pune <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
                        </p>
                        <h4>June 07 <span>08:00-12:00 pm</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs mc category slidebar End -->
<!-- prs theater Slider Start -->

<!-- prs theater Slider End -->
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
