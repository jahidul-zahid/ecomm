
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



            <div class="card pd-20 pd-sm-40" >
                <h6 class="card-body-title">Shipping Address</h6>
                <p class="mg-b-20 mg-sm-b-30">A form with a label on top of each form control.</p>

                <div class="form-layout">
                  <div class="row mg-b-25">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="firstname" value="{{$shipping->shipping_first_name}}" readonly placeholder="Enter firstname">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="lastname" value="{{$shipping->shipping_last_name}}" readonly placeholder="Enter lastname">
                      </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="email" value="{{$shipping->shipping_email}}" readonly placeholder="Enter email address">
                      </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Shipping Phone: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="email" value="{{$shipping->shipping_phone}}" readonly placeholder="Enter email address">
                        </div>
                      </div><!-- col-4 -->


                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="email" value="{{$shipping->address}}" readonly placeholder="Enter email address">
                        </div>
                      </div><!-- col-4 -->

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="email" value="{{$shipping->state}}" readonly placeholder="Enter email address">
                        </div>
                      </div><!-- col-4 -->

                      <div class="col-lg-4">
                        <div class="form-group">
                          <label class="form-control-label">Post code: <span class="tx-danger">*</span></label>
                          <input class="form-control" type="text" name="email" value="{{$shipping->post_code}}" readonly placeholder="Enter email address">
                        </div>
                      </div><!-- col-4 -->

                  </div><!-- row -->


                </div><!-- form-layout -->
              </div><!-- card -->



<div class="card pd-20 pd-sm-40" style="margin-top: 20px;">
    <h6 class="card-body-title">Orders</h6>
    <p class="mg-b-20 mg-sm-b-30">A form with a label on top of each form control.</p>

    <div class="form-layout">
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Invoice No: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="firstname" value="{{$order->invoice_no}}" readonly placeholder="Enter firstname">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Payment type: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="lastname" value="{{$order->payment_type}}" readonly placeholder="Enter lastname">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="email" value="{{$order->total}}" readonly placeholder="Enter email address">
          </div>
        </div><!-- col-4 -->

        <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Sub Total: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="email" value="{{$order->subtotal}}" readonly placeholder="Enter email address">
            </div>
          </div><!-- col-4 -->


          <div class="col-lg-4">
            <div class="form-group">

                <label class="form-control-label">Coupon Discount: <span class="tx-danger">*</span></label>

                    @if ($order->coupon_discount==NULL)


                <span class="badge badge-pill badge-danger">No</span>
                @else
                <span class="badge badge-pill badge-danger">{{$order->coupon_discount}}%</span>
                @endif
            </div>
          </div><!-- col-4 -->

          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">State: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="email" value="{{$shipping->state}}" readonly placeholder="Enter email address">
            </div>
          </div><!-- col-4 -->

          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Post code: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="email" value="{{$shipping->post_code}}" readonly placeholder="Enter email address">
            </div>
          </div><!-- col-4 -->

      </div><!-- row -->


    </div><!-- form-layout -->
  </div><!-- card -->





<div class="card pd-20 pd-sm-40" style="margin-top: 20px;">
    <h6 class="card-body-title">Order Item</h6>

    <div class="form-layout">
      <div>
        <div class="table-wrapper">
            <table class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Product name</th>
                  <th class="wd-20p">Quantity</th>

                </tr>
              </thead>
              <tbody>



                  @foreach ($orderItems as $row)


                <tr>
                  <td><img src="{{asset($row->product->image_one)}}" height="50px;" width="50px;" alt=""></td>
                  <td>{{$row->product->product_name}}</td>
                  <td>{{$row->product_qty}}</td>


                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->



    </div><!-- form-layout -->
  </div><!-- card -->




</div>

            </div>
        </div>



@endsection









