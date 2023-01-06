<div class="best_sellers">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Best Sellers</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product_slider_container">
                    <div class="owl-carousel owl-theme product_slider">
                        @if($bestsellers != null)
                        <!-- Slide 1 -->
                        @foreach ($bestsellers as $bestseller) 
                        <div class="owl-item product_slider_item">
                            <div class="product-item">
                                <div class="product discount">
                                    <div class="product_image">
                                        <img src="{{asset('storage')}}/{{$bestseller->defaultimage}} " alt="" width="50px" height="200px">
                                    </div>
                                    <div class="favorite favorite_left"></div>
                                    <div
                                        class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                        <span>{{$bestseller->namePromotion}}</span>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a
                                            href="product/{{ $bestseller->IDproduct }}">{{ $bestseller->name }}</a></h6>
                                        <div class="product_price">${{$bestseller->price - $bestseller->deduction}}<span>${{$bestseller->price}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    <!-- Slider Navigation -->

              {{--       <div
                        class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </div>
                    <div
                        class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
