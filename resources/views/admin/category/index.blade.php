@extends('admin.admin_layouts')

@section('category')active

@endsection

@section('admin_content')
 <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="/admin">Dashboard</a>
      <span class="breadcrumb-item active">Categories</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm">





                <div class="col-md-8">


                      <div class="card pd-20 pd-sm-40">
                        <h6>Category list</h6>


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
                                <th class="wd-15p">Category name</th>
                                <th class="wd-20p">Status</th>
                                <th class="wd-15p">Action</th>

                              </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i=1;
                                @endphp

                                @foreach ($categories as $category )


                              <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    @if ($category->status==1)
                                <span class="badge badge-success" >Active </span>
                                @else
                                <span class="badge badge-danger" > Inactive </span>
                                    @endif

                                </td>
                                <td>
                                   <a href="{{url('admin/categories/edit/'.$category->id) }}" class="btn btn-sm btn-success">Edit</a>
                                   <a href="{{url('admin/categories/delete/'.$category->id) }}" class="btn btn-sm btn-danger">Delete</a>

                                   @if ($category->status==1)

                                   <a href="{{url('admin/categories/inactive/'.$category->id) }}" class="btn btn-sm btn-danger"> Inactive</a>

                                    @else
                                   <a href="{{url('admin/categories/active/'.$category->id) }}" class="btn btn-sm btn-success"> Active</a>
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
                        <div class="card-header">Add Category
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


                            <form action="{{route('store.category')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                 
                                  <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                                  @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                  @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Add</button>
                              </form>




                        </div>
                    </div>

                </div>












        </div>


            </div>
        </div>



@endsection
