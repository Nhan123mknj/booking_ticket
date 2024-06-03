@extends('master')
@section('content')
<div class="prs_title_main_sec_wrapper">
    <div class="prs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_title_heading_wrapper">
                    <h2>Blog categories</h2>
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li>&nbsp;&nbsp; >&nbsp;&nbsp; Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- prs title wrapper End -->
<!-- hs sidebar Start -->
<div class="hs_blog_categories_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
                <div class="hs_blog_left_sidebar_main_wrapper">
                    <div class="row">
                        @foreach ($blogs as $item)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"style="
                        padding-bottom: 20px;
                    ">
                            <div class="hs_blog_box1_main_wrapper">
                                <div class="hs_blog_box1_img_wrapper">

                                    <img src="{{ asset('source/website/images/blog/' .$item->images) }}" alt="blog_img" /></td>
                                </div>
                                <div class="hs_blog_box1_cont_main_wrapper">
                                    <div class="hs_blog_cont_heading_wrapper">
                                        <ul>
                                            <li>{{ $item->created_date }}</li>
                                            <li>{{ $item->author }}</li>
                                        </ul>
                                        <h2>{{ $item->title }}</h2>
                                        <p>{{ $item->depict }}</p>
                                        <h5><a href="{{ route('detailblog',$item->link) }}">Xem thêm <i class="fa fa-long-arrow-right"></i></a></h5>
                                    </div>
                                </div>
                                <div class="hs_blog_box1_bottom_cont_main_wrapper">
                                    <div class="hs_blog_box1_bottom_cont_left">
                                        <ul>

                                            <li><i class="fa fa-comments"></i> &nbsp;&nbsp;<a href="#">{{ $item->comments->count() }} Comments</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="pager_wrapper gc_blog_pagination">
                                {{ $blogs->links('vendor.pagination.custom') }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="hs_blog_right_sidebar_main_wrapper">
                    <div class="prs_mcc_left_searchbar_wrapper">
                        <input type="text" placeholder="Search Movie">
                        <button><i class="flaticon-tool"></i>
                        </button>
                    </div>


                    <div class="prs_mcc_bro_title_wrapper">
                        <h2>Tin gần đây</h2>
                        @foreach ($recents as $item)
                        <div class="hs_blog_right_recnt_cont_wrapper">
                            <div class="hs_footer_ln_img_wrapper">
                                <img src="{{ asset('source/website/images/' . $item->images) }}" alt="ln_img" />
                            </div>
                            <div class="hs_footer_ln_cont_wrapper">
                                <h4>{{ $item->title }}</h4>
                                <p>{{ $item->created_date }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="prs_blog_right_sub_btn_wrapper">
                        <h2>Subscribe</h2>
                        <input type="text" placeholder="Your email id">
                        <ul>
                            <li><a href="#">Subscribe</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- hs sidebar End -->
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
