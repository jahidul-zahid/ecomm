
@extends('admin.admin_layouts')

@section('coupon')active

@endsection

@section('admin_content')
 <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="/admin">Dashboard</a>

      <span class="breadcrumb-item active">Coupon</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">





                <div class="col-md-8">


                      <div class="card pd-20 pd-sm-40">
                        <h6>Coupon list</h6>


                        @if(session('catupdated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('catupdated')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                          @endif

                          @if(session('delete'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>{{session('delete')}}</strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                            @endif



                        <div class="table-wrapper">
                          <table id="datatable1" class="table display responsive nowrap">
                            <thead>
                              <tr>
                                <th class="wd-15p">SL</th>
                                <th class="wd-15p">Coupon name</th>
                                <th class="wd-15p">Coupon discount</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-15p">Action</th>

                              </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i=1;
                                @endphp

                                @foreach ($coupons as $row)


                              <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->coupon_name}}</td>
                                <td>{{$row->discount}}%</td>
                                <td>
                                    @if ($row->status==1)
                                <span class="badge badge-success" >Active </span>
                                @else
                                <span class="badge badge-danger" > Inactive </span>
                                    @endif

                                </td>
                                <td>
                                   <a href="{{url('admin/coupon/edit/'.$row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                   <a href="{{url('admin/coupon/delete/'.$row->id) }}" class="btn btn-sm btn-danger"  onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>

                                   @if ($row->status==1)

                                   <a href="{{url('admin/coupon/inactive/'.$row->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>

                                    @else
                                   <a href="{{url('admin/coupon/active/'.$row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                                    @endif
                                </td>

                              </tr>

                              @endforeach
                            </tbody>
                          </table>
                        </div><!-- table-wrapper -->
                      </div><!-- card -->
                </div>





                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add coupon
                        </div>

                        <div class="card-body">
                            {{-- @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif --}}
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                              @endif


                            <form action="{{route('store.coupon')}}" method="POST">
                                @csrf
                                <div class="form-group">

                                  <input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter coupon">

                                  @error('coupon_name')
                                <span class="text-danger">{{$message}}</span>
                                  @enderror

                                </div>


                                <div class="form-group">

                                    <input type="text" name="coupon_discount" class="form-control @error('coupon_discount') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter coupon discount">

                                    @error('coupon_discount')
                                  <span class="text-danger">{{$message}}</span>
                                    @enderror

                                  </div>

                                <button type="submit" class="btn btn-primary">Add coupon </button>
                              </form>




                        </div>
                    </div>

                </div>












        </div>


            </div>
        </div>



@endsection









