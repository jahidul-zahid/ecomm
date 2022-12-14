


@extends('admin.admin_layouts')

@section('brand')active

@endsection

@section('admin_content')
 <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="/admin">Dashboard</a>

      <span class="breadcrumb-item active">Brand</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">



                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Update Brand
                        </div>

                        <div class="card-body">


                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                              @endif


                            <form action="{{route('update.brand')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$brand->id}}" name='id'>
                                <div class="form-group">

                                  <input type="text" name="brand_name" value="{{$brand->brand_name}}"class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter brand">

                                  @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                                  @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Add Brand </button>
                              </form>




                        </div>
                    </div>

                </div>












        </div>


            </div>
        </div>



@endsection









