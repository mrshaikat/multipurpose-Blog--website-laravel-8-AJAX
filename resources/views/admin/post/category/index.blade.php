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
            
            <div class="card-header">
                <h4 class="card-title">All Categories</h4>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Acion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Banglaseshi Food</td>
                                <td>bangladeshi-food</td>
                                <td>Published</td>
                                <td>
                                    <a class=" btn btn-warning btn-sm" href="">Edit</a>
                                    <a class=" btn btn-danger btn-sm" href="">Delete</a>
                                </td>
                            </tr>
                            
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
                <form action="">
                    <div class="form-group">
                        <input class=" form-control" type="text" placeholder="Category Name">
                    </div>

                    <div class="form-group">
                        <label style="font-family: impact; font-size: 20px;" for="">Category Status</label><br> <br>
                        <input class="" type="checkbox" id="Published"><label class="ml-1" for="Published">Published</label> <br>
                        <input class="" type="checkbox" id="Unpublished"><label class="ml-1" for="Unpublished">Unpublished</label>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-info btn-block" type="submit" value="SUBMIT">
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