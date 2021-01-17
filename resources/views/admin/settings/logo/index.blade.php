@extends('layouts.app')

@section('main-content')
  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">
<div class="row">
  <div class="col-sm-12">
    <h3 class="page-title">Welcome {{ Auth::user() -> name }}!</h3>
    <ul class="breadcrumb">
      <li class="breadcrumb-item active">Tags</li>
    </ul>
  </div>
</div>
</div>
<!-- /Page Header -->

{{-- table  --}}

<div class="row">

    <div class="col-md-8">
        <a class="btn btn-info btn-sm" data-toggle="modal" href="#category-modal">Website Logo</a> <br><br>
        <div class="card">
            @include('validate')
            <div class="card-header">
                <h4 class="card-title">Upload Logo</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <img class="bg-dark" width="{{ $logo -> logo_width }}" src="{{ URL::to('/') }}/admin/media/settings/logo/{{ $logo -> logo_name }}" alt="">
                                        <br><br>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input type="hidden" name="old_logo" value="{{ $logo -> logo_name }}">
                                        <input class=" form-control" type="file" name="logo" style="">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="">
                                        <input class=" form-control" type="text" name="logo_width" value="{{ $logo -> logo_width }}">
                                    </div>
                                </div>
                            </div>





                    <input type="submit" class="btn btn-success" value="UPdate">

                </form>
            </div>
        </div>
    </div>
</div>

<div id="category-modal" class=" modal fade">
    <div class=" modal-dialog modal-dialog-centered">
        <div class=" modal-content">
            <div class=" modal-header">
                <h1 class=" modal-title">Add New Tag</h1>



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
                <h1 class=" modal-title">Update Tag</h1>



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
