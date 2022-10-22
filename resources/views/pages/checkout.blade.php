@extends('layouts.fontend-master')


@section('content')

  <!-- Hero Section Begin -->
  <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    @php
                    $categories=App\Models\Category::where('status',1)->latest()->get();
                @endphp
                    <ul>
                        @foreach ($categories as $row )


                        <li><a href="#">{{$row->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->



<!-- Breadcrumb Section Begin -->




<section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend')}}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">


            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Cheakout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Cheakout Page</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->



    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{route('place-order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name='shipping_first_name' value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name='shipping_last_name'>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="shipping_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="shipping_email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name='address' placeholder="Street Address" class="checkout__input__add">

                            </div>

                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="post_code">
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>

                                    @foreach ($carts as $cart)

                                    <li>{{$cart->product->product_name}}({{$cart->product_quantity}})<span>{{$cart->price*$cart->product_quantity}}</span></li>
                                    @endforeach
                                </ul>

                                <div class="checkout__order__subtotal">Subtotal <span>${{$subtotal}}</span></div>
                                <input type="hidden" name="subtotal" value="${{$subtotal}}">

                                @if (Session::has('coupon'))

                                  <input type="hidden" name="coupon" value="{{session()->get('coupon')['coupon_name']}}">

                                  <input type="hidden" style="width:300px;" name="discount" value=" {{session()->get('coupon')['coupon_discount']}}%
                                  ({{$subtotal*session()->get('coupon')['coupon_discount']/100}} tk )">

                                  <input type="hidden" name="total" value="${{$subtotal-$subtotal*session()->get('coupon')['coupon_discount']/100}}">



                                <div class="checkout__order__subtotal">Coupon <span>{{session()->get('coupon')['coupon_name']}}</span></div>

                                <div class="checkout__order__subtotal">Discount <span>{{session()->get('coupon')['coupon_discount']}}%
                                    ({{$subtotal*session()->get('coupon')['coupon_discount']/100}} tk )</div>
                                <div class="checkout__order__total">Total <span>${{$subtotal-$subtotal*session()->get('coupon')['coupon_discount']/100}}</span></div>
                                @else


                                <div class="checkout__order__total">Total <span>${{$subtotal}}</span></div>
                                    <input type="hidden" name="total" value="${{$subtotal}}">
                                @endif

                                <h5>select payment method:</h5><br>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash on delivery
                                        <input type="checkbox" id="payment" value="handcash"name="payment_type">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal" name="payment_type" value="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->







@endsection
