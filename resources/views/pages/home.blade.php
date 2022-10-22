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
                    <h2>My Profile</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>MY profile</span>
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
                            <div class="row">
                                <div class="col-sm-4">
                                  <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{asset('backend')}}/img/img3.jpg" class="wd-32 rounded-circle" alt="card img cap" style="border-radious:50%; height:100%; weidth:100%;">
                                    <ul class="list group list-group-flush">

                                        <a href="{{url('/')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                                        <a href="{{route('user.order')}}" class="btn btn-primary btn-sm btn-block"> my Orders</a>
                                    </ul>

                                  </div>
                                </div>
                                <div class="col-sm-8">
                                  <div class="card">
                                    <div class="card-body">
                                      <form>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Name</label>
                                          <input type="email" value="{{ Auth::guard()->user()->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" value="{{ Auth::guard()->user()->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                                          </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                      </form>

                                    </div>
                                  </div>
                                </div>
                              </div>

                        </div>
                    </section>
                    <!-- Shoping Cart Section End -->
@endsection
