@extends('shop.layouts.home')
@section('content')
    <!-- Slider -->

    <div class="main_slider" style="background-image:url('template/shop/images/1.jpg')">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        <h1 style="color:white; text-shadow: 0.1em 0.1em #000;">More promotions coming soon 🐧
                        </h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner -->

    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="banner_item align-items-center"
                        style="background-image:url(template/shop/images/mau1.jpg); background-size:100%">
                        <div class="banner_category">
                            <a href="product">Shirt</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(template/shop/images/ball.jpg)">
                        <div class="banner_category">
                            <a href="product">Ball</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner_item align-items-center" style="background-image:url(template/shop/images/mau3.jpg)">
                        <div class="banner_category">
                            <a href="product">Other</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                                data-filter="*">all</li>
                            @foreach ($categories as $category)
                                <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                                    data-filter=".{{ $category->nameCategory }}">{{ $category->nameCategory }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                        @if($products!=null)
                        @foreach ($products as $product)
                            <div class="product-item {{ $product->nameCategory }}">
                                <div class="product discount product_filter">
                                    <div class="product_image">
                                        <a href="product/{{ $product->IDproduct }}"><img src="{{asset('storage')}}/{{$product->defaultimage}} "
                                                alt="" style="height: 100%; width:100%"></a>
                                    </div>
                                    <div
                                        class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                        <span>{{ $product->namePromotion }}</span>
                                    </div>
                                    <div class="product_info">
                                        <h4 class="product_name"><a
                                                href="product/{{ $product->IDproduct }}">{{ $product->name }}</a></h6>
                                            <div class="product_price">
                                                @if ($product->deduction >= 1)
                                                    ${{ $product->price - $product->deduction }}
                                                    <span>${{ $product->price }}</span>
                                                @else
                                                    ${{ $product->price - $product->deduction }}
                                                @endif
                                            </div>
                                    </div>
                                </div>
                                <div class="red_button add_to_cart_button"><a
                                         onclick="addToCart({{ $product->IDproduct }})" >add
                                        to cart</a></div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deal of the week -->

    <div class="deal_ofthe_week">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="deal_ofthe_week_img">
                        <img src="template/shop/images/2.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 text-right deal_ofthe_week_col">
                    <div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
                        <div class="section_title">
                            <h2>Deal Of The Week</h2>
                            @foreach($promotions as $promotion)
                            <h4><a href="product">{{$promotion->description}}</a></h4>
                            @endforeach
                        </div>
                        <ul class="timer">
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="day" class="timer_num">03</div>
                                <div class="timer_unit">Day</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="hour" class="timer_num">15</div>
                                <div class="timer_unit">Hours</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="minute" class="timer_num">45</div>
                                <div class="timer_unit">Mins</div>
                            </li>
                            <li class="d-inline-flex flex-column justify-content-center align-items-center">
                                <div id="second" class="timer_num">23</div>
                                <div class="timer_unit">Sec</div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

   @include('shop.layouts.bestseller')
    <!-- Benefit -->

    <div class="benefit">
        <div class="container">
            <div class="row benefit_row">
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>free shipping</h6>
                            <p>Suffered Alteration in Some Form</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>cach on delivery</h6>
                            <p>The Internet Tend To Repeat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>45 days return</h6>
                            <p>Making it Look Like Readable</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 benefit_col">
                    <div class="benefit_item d-flex flex-row align-items-center">
                        <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                        <div class="benefit_content">
                            <h6>opening all week</h6>
                            <p>8AM - 09PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blogs -->

   
    <!-- Newsletter -->

   @endsection
