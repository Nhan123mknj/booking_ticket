<div class="prs_mc_slider_main_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_heading_section_wrapper">
                    <h2>Comming soon</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="prs_mc_slider_wrapper">
                    <div class="owl-carousel owl-theme">
                        @foreach ($slide as $item)
                        <div class="item">
                            <img src="{{ asset('source/website/images/slide/' . $item->Image_Slide) }}" alt="about_img">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
