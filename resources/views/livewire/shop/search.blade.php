<div><div class="row">
    <div class="s007">
        <form action="" method="">
            <div class="inner-form">
                <div class="basic-search">
                    <div class="input-field">
                        <div class="icon-wrap">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20"
                                viewBox="0 0 20 20">
                                <path
                                    d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z">
                                </path>
                            </svg>
                        </div>
                        <input id="search" type="text" placeholder="Search..." wire:model="search" />
                        <div class="result-count">
                            <span>Result {{ $count }}</span>
                        </div>
                    </div>
                </div>
                <div class="advance-search">
                    <label class="desc"> Advanced Search <input type="checkbox" name="" id=""
                            value="1" wire:model="checkbox">👈
                        <span class="checkmark"></span>
                    </label>
                    <div class="row">
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" class="select" name="choices-single-defaul"
                                    wire:model="supplier">
                                    <option placeholder="" selected value="1">Supplier</option>
                                    @foreach ($supplies as $supplier)
                                        <option value="{{ $supplier->IDsupplier }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" class="select" name="choices-single-defaul"
                                    wire:model="category">
                                    <option placeholder="" selected value="1">Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->IDcategory }}">{{ $category->nameCategory }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" class="select" name="choices-single-defaul"
                                    wire:model="promotion">
                                    <option placeholder="" selected value="1">Promotion</option>
                                    @foreach ($promotions as $promotion)
                                        <option value="{{ $promotion->IDpromotion }}">{{ $promotion->namePromotion }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <div class="col">
        <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
            <!-- Product 1 -->
            @foreach ($products as $product)
                <div class="product-item men" style="float: left">
                    <div class="product discount product_filter">
                        <div class="product_image">
                            <a href="product/{{ $product->IDproduct }}"><img src="{{asset('storage')}}/{{ $product->defaultimage }}"
                                    alt="" style="height: 100%; width:100%"></a>
                        </div>
                     {{--  <div
                            class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                            <span>{{ $product->namePromotion }}</span>
                        </div>  --}}
                        <div class="product_info">
                            <h4 class="product_name"><a
                                    href="product/{{ $product->IDproduct }}">{{ $product->name }}</a>
                                </h6>
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
                    <div class="red_button add_to_cart_button"><a onclick="addToCart({{ $product->IDproduct }})">add
                            to cart</a></div>
                </div>
            @endforeach
        </div>
        <div>
        </div>
    </div>

</div>
{{ $products->links() }}
</div>