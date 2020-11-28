@extends('layouts.app')

@section('main-content')
  <!-- Page Wrapper -->
  <div class="page-wrapper">
			
    <div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">
<div class="row">
  <div class="col-sm-12">
    <h3 class="page-title">Welcome Admin!</h3>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active">Dashboard</li>
    </ul>
  </div>
</div>
</div>
<!-- /Page Header -->

{{-- table  --}}

<div class="row">
   
    <div class="col-md-10">
        <a class="btn btn-info btn-sm" data-toggle="modal" href="#category-modal">Add New Category</a> <br><br>
        <div class="card">
            @include('validate')
            <div class="card-header">
                <h4 class="card-title">All Categories</h4>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>

                           
                            <tr>
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Acion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_data as $data)
                            <tr>
                                <td>{{ $loop -> index+1 }}</td>
                                <td>{{ $data -> name }}</td>
                                <td>{{ $data -> slug }}</td>
                                <td>
                                    @if($data -> status == 'Published')
                                        <span class=" badge badge-success">Published</span>
                                    @else
                                        <span class=" badge badge-danger">Unpublished</span>    
                                    @endif
                                </td>
                                <td>
                                    @if($data -> status == 'Published')
                                        <a class="btn btn-danger btn-sm" href="{{ route('category.unpublished', $data -> id) }}"><i class="fa fa-eye-slash"></i></a>
                                    @else
                                    <a class="btn btn-success btn-sm" href="{{ route('category.published', $data -> id) }}"><i class="fa fa-eye"></i></a>
                                    @endif
                                    <a id="category-edit" edit_id="{{ $data -> id }}" class=" btn btn-warning btn-sm" href="#category-modal-edit" data-toggle="modal">Edit</a>
                                    <form style="display: inline;" action="{{ route('post-category.destroy', $data -> id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="category-modal" class=" modal fade">
    <div class=" modal-dialog modal-dialog-centered">
        <div class=" modal-content">
            <div class=" modal-header">
                <h1 class=" modal-title">Add New Category</h1>
                
                

                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class=" modal-body">
                <form action="{{ route('post-category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="name" class=" form-control" type="text" placeholder="Category Name">
                    </div>
 
                    <div class="form-group">
                        <label style="font-family: impact; font-size: 20px;" for="">Category Status</label><br> <br>
                        <input name="status" class="" type="radio" value="Published" id="Published"><label class="ml-1" for="Published">Published</label> <br>
                        <input name="status" class="" type="radio" value="Unpublished" id="Unpublished"><label class="ml-1" for="Unpublished">Unpublished</label>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-info btn-block" type="submit" value="Add">
                    </div>

                </form>
            </div>
           
        </div>
    </div>
</div>




<div id="category-modal-edit" class=" modal fade">
    <div class=" modal-dialog modal-dialog-centered">
        <div class=" modal-content">
            <div class=" modal-header">
                <h1 class=" modal-title">Update Category</h1>
                
                

                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class=" modal-body">
                <form action="{{ route('category.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="name" class=" form-control" type="text" placeholder="Category Name">
                        <input name="id" class=" form-control" type="hidden" placeholder="Category Name">
                    </div>
 
                    

                    <div class="form-group">
                        <input class="btn btn-info btn-block" type="submit" value="Update">
                    </div>

                </form>
            </div>
           
        </div>
    </div>
</div>



  
</div>
</div>


</div>			
</div>
<!-- /Page Wrapper -->
@endsection