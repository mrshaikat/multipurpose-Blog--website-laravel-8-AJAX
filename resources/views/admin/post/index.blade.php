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
      <li class="breadcrumb-item active">Posts</li>
    </ul>
  </div>
</div>
</div>
<!-- /Page Header -->

{{-- table  --}}

<div class="row">

    <div class="col-md-12">

        <div class="card">
            @include('validate')
            <div class="card-header">
                <h4 class="card-title">All Posts
                    <a class="btn btn-info btn-sm pull-right" data-toggle="modal" href="#post-modal">Add New Post</a>
                </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped data-table mb-0">
                        <thead>


                            <tr>
                                <th>SL</th>

                                <th>Title</th>
                                <th>Categories</th>
                                <th>Tags</th>
                                <th>Feature Image</th>
                                <th>Times</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Acion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_data as $data)
                            <tr>
                                <td>{{ $loop -> index+1 }}</td>



                                <td>{{ $data -> title }}</td>
                                <td>

                                    @foreach($data -> categories as $category)
                                         {{ $category -> name }} |
                                    @endforeach


                                </td>
                                <td>{{ $data -> tag }}</td>
                                <td>
                                    @if( !empty($data -> featured_img) )
                                    <img style="height: 50px; width: 50px;" src="{{ URL::to('/') }}/admin/media/post/{{ $data -> featured_img }}" alt="">
                                    @endif


                                </td>
                                <td>{{ $data -> created_at -> diffForHumans() }}</td>
                                <td>{{ $data -> author -> name }}</td>
                                <td>
                                    @if($data -> status == 'Published')
                                        <span class=" badge badge-success">Published</span>
                                    @else
                                        <span class=" badge badge-danger">Unpublished</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data -> status == 'Published')
                                        <a class="btn btn-danger btn-sm" href="{{ route('tag.unpublished', $data -> id) }}"><i class="fa fa-eye-slash"></i></a>
                                    @else
                                    <a class="btn btn-success btn-sm" href="{{ route('tag.published', $data -> id) }}"><i class="fa fa-eye"></i></a>
                                    @endif
                                    <a id="post-edit" edit_id="{{ $data -> id }}" class=" btn btn-warning btn-sm" href="#" data-toggle="modal">Edit</a>
                                    <form style="display: inline;" action="{{ route('tag.destroy', $data -> id) }}" method="POST">
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
{{-- Add New Post --}}
<div id="post-modal" class=" modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class=" modal-header">
                <h1 class=" modal-title">Add New Post</h1>



                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input name="title" class=" form-control" type="text" placeholder="Title">
                    </div>

                    <div class="form-group row">
                        <label style="font-family: candara; " class="col-form-label col-md-3"><h5>Choose Category</h5></label>

                        <div class="col-md-9">

                            @foreach($all_category as $category)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="category[]" value="{{ $category -> id }}"> {{ $category -> name }}
                                </label>
                            </div>
                            @endforeach



                        </div>
                    </div>


                    <div class="form-group">
                        <img style="max-width: 100%; display:block;" id="post_featured_img_load" src="" alt="">
                        <label style="font-size: 70px; cursor: pointer;" for="fimage"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                        <input style="display: none;" name="fimg" class="" type="file" id="fimage">
                    </div>

                    <div class="form-group">
                        <textarea name="content" id="post_editor"></textarea>
                    </div>



                    <div class="form-group">
                        <input class="btn btn-info btn-block" type="submit" value="Add Post">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

{{-- Add POst End --}}

{{-- Update POST --}}
<div id="post-modal-edit" class=" modal fade">
    <div class=" modal-dialog modal-dialog-centered modal-lg">
        <div class=" modal-content">
            <div class=" modal-header">
                <h1 class=" modal-title">Update Post</h1>



                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class=" modal-body">
                <form action="{{ route('post.update.ajax') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input name="title" class=" form-control" type="text" placeholder="Title">
                        <input name="id" class="form-control" type="hidden">
                    </div>

                    <div class="form-group row">
                        <label style="font-family: candara; " class="col-form-label col-md-3"><h5>Choose Category</h5></label>

                        <div class="col-md-9">

                           <div class="cl"></div>



                        </div>
                    </div>


                    <div class="form-group">
                        <img style="max-width: 100%; display:block;" id="post_featured_img_edit" src="" alt="">
                        <label style="font-size: 70px; cursor: pointer;" for="fimage"><i class="fa fa-file-image-o" aria-hidden="true"></i></label>
                        <input style="display: none;" name="fimg" class="" type="file" id="fimage">
                    </div>

                    <div class="form-group">
                        <textarea name="content" id="" class="form-control"></textarea>
                    </div>



                    <div class="form-group">
                        <input class="btn btn-info btn-block" type="submit" value="Update Post">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

{{-- Upadate Post End --}}



</div>
</div>


</div>
</div>
<!-- /Page Wrapper -->
@endsection
