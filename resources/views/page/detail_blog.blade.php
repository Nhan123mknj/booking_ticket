@extends('master')
@section('content')
<style>
    .image img {
    max-width: 100%;
    height: auto;
}
</style>
<div class="prs_title_main_sec_wrapper">
    <div class="prs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_title_heading_wrapper">
                    <h2>Blog Singe Page</h2>
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
<div class="hs_blog_categories_main_wrapper hs_blog_categories_main_wrapper2">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="hs_blog_left_sidebar_main_wrapper">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="hs_blog_box1_main_wrapper">
                                <div class="hs_blog_box1_img_wrapper">
                                    <img src="{{ $detail->images }}" alt="blog_img">
                                </div>
                                <div class="hs_blog_box1_cont_main_wrapper">
                                    <div class="hs_blog_cont_heading_wrapper">
                                        <ul>
                                            <li>{{ $detail->created_date }}</li>
                                            <li>{{ $detail->author }}</li>
                                        </ul>
                                        <h2>{{ $detail->title }}</h2>
                                        {!! $detail->contents !!}
                                    </div>



                                </div>
                                <div class="hs_blog_box1_bottom_cont_main_wrapper">
                                    <div class="hs_blog_box1_bottom_cont_left">
                                        <ul>
                                            <li><i class="fa fa-thumbs-up"></i> &nbsp;&nbsp;<a href="#">1244 Likes</a>
                                            </li>
                                            <li><i class="fa fa-comments"></i> &nbsp;&nbsp;<a href="#">{{ $detail->comments->count() }} Bình luận</a>
                                            </li>
                                            <li><i class="fa fa-tags"></i> &nbsp;&nbsp;<a href="#">Presenter Movie</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="hs_blog_box1_bottom_cont_right">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-youtube-play"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="prs_bs_comment_heading_wrapper">
                                <h2>Bình luận</h2>
                            </div>
                        </div>
                        @foreach ($comments->comments as $item)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="hs_rs_comment_main_wrapper">
                            <div class="hs_rs_comment_img_wrapper">
                                <img src="{{ $item->images }}" alt="comment_img">
                            </div>
                            <div class="hs_rs_comment_img_cont_wrapper hs_rs_blog_single_comment_img_cont_wrapper">
                                <h2>{{ $item->name }}<br> <span>{{ $item->created_date }}</span> <a href="#"> - Reply</a></h2>
                                <p>{{ $item->detail }}</p>
                            </div>
                        </div>
                    </div>
                        @endforeach

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="prs_bs_comment_heading_wrapper prs_bs_leave_comment_heading_wrapper">
                                <h2>LEave a comment</h2>
                            </div>
                        </div>
                        <form action="{{ route('comment_post',$detail->id) }}" method="post">
                            @csrf
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="hs_kd_six_sec_input_wrapper">
                                    <input type="text" placeholder="Name" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="hs_kd_six_sec_input_wrapper">
                                    <input type="email" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_kd_six_sec_input_wrapper">
                                    <textarea rows="6" placeholder="Comments" name="detail"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="prs_contact_input_wrapper prs_contact_input_wrapper2">
                                    <ul>
                                        <li>
                                            <input type="hidden" name="form_type" value="comment" />
                                            <button type="submit" class="submitForm">Gửi</button>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </form>

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

@endsection
