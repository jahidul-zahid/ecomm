
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
                    <h2>My Orders</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span> my Order details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
                    <!-- Shoping Cart Section Begin -->
                    <section class="shoping-cart spad">
                        <div class="container">
                            <div class="row" >
                                <div class="col-sm-4" >
                                  <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{asset('backend')}}/img/img3.jpg" class="wd-32 rounded-circle" alt="card img cap" style="border-radious:50%; height:100%; weidth:100%;">
                                    <ul class="list group list-group-flush">

                                        <a href="{{url('/')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                                        <a href="{{route('user.order')}}" class="btn btn-primary btn-sm btn-block"> my Orders</a>
                                    </ul>

                                  </div>
                                </div>
                                <div class="col-sm-8" >
                                  <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Shipping first name</th>
                                                <th scope="col">Shipping last name</th>
                                                <th scope="col">Shipping email</th>
                                                <th scope="col">Shipping phone</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">State</th>
                                                <th scope="col">Post code</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                              <tr>
                                                <th>{{$shipping->shipping_first_name}}</th>
                                                <td>{{$shipping->shipping_last_name}}</td>
                                                <td>{{$shipping->shipping_email}}</td>
                                                <td>{{$shipping->shipping_phone}}</td>
                                                <td>{{$shipping->address}}</td>
                                                <td>{{$shipping->state}}</td>
                                                <td>{{$shipping->post_code}}</td>

                                              </tr>

                                            </tbody>
                                          </table>

                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-4">


                                </div>

                                <div class="col-sm-8">
                                    <div class="card">
                                      <div class="card-body">
                                          <table class="table">
                                              <thead>
                                                <tr>
                                                  <th scope="col">Invoice No</th>
                                                  <th scope="col">Payment type</th>
                                                  <th scope="col">Sub total</th>
                                                  <th scope="col">Total</th>

                                              </tr>
                                              </thead>
                                              <tbody>

                                                <tr>
                                                  <th>{{$order->invoice_no}}</th>
                                                  <td>{{$order->payment_type}}</td>
                                                  <td>{{$order->subtotal}}</td>
                                                  <td>{{$order->total}}</td>

                                                </tr>

                                              </tbody>
                                            </table>

                                      </div>
                                    </div>
                                  </div>

                              </div>

                              <div class="col-sm-4">
                                <div class="card-body">

                                </div>
                            </div>

                              <div class="col-sm-8" style="margin-left: 400px;">
                                <div class="card">
                                  <div class="card-body">
                                      <table class="table">
                                          <thead>
                                            <tr>
                                              <th scope="col">Product image</th>
                                              <th scope="col">Product name</th>

                                              <th scope="col">Product quantity</th>
                                              <th scope="col">Product code</th>
                                          </tr>
                                          </thead>
                                          <tbody>


                                            @foreach ($orderItems as $item)

                                            <tr>
                                                <td>
                                                    <img style="height: 60px; weidth:60px;" src="{{asset($item->product->image_one)}}" alt="">

                                                </td>
                                                <td>{{$item->product->product_name}}</td>
                                                <td>{{$item->product_qty}}</td>
                                              <td>{{$item->product->product_code}}</td>


                                            </tr>
                                            @endforeach
                                          </tbody>
                                        </table>

                                  </div>
                                </div>
                              </div>

                          </div>

                        </div>
                    </section>
                    <!-- Shoping Cart Section End -->
@endsection




