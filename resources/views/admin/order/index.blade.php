
@extends('admin.admin_layouts')

@section('orders')active

@endsection

@section('admin_content')
 <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="/admin">Dashboard</a>

      <span class="breadcrumb-item active">Order</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">





                <div class="col-md-12">


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
                                <th class="wd-15p">Invoice NO</th>
                                <th class="wd-15p">payment type</th>
                                <th class="wd-20p">Total</th>
                                <th class="wd-20p">Subtotal</th>
                                <th class="wd-15p">Action</th>

                              </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i=1;
                                @endphp

                                @foreach ($orders as $row)


                              <tr>
                                <td>{{$i++}}</td>
                                <td>#{{$row->invoice_no}}</td>
                                <td>{{$row->payment_type}}</td>
                                <td>{{$row->total}}$</td>
                                <td>{{$row->subtotal}}$</td>
                                <td>
                                    @if ($row->coupon_discount==NULL)
                                <span class="badge badge-danger" >No </span>
                                @else
                                <span class="badge badge-success" >Yes</span>
                                    @endif

                                </td>
                                <td>
                                   <a href="{{url('admin/orders/view/'.$row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                   <a href="{{url('admin/coupon/delete/'.$row->id) }}" class="btn btn-sm btn-danger"  onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>

                                </td>

                              </tr>

                              @endforeach
                            </tbody>
                          </table>
                        </div><!-- table-wrapper -->
                      </div><!-- card -->
                </div>








        </div>


            </div>
        </div>



@endsection









