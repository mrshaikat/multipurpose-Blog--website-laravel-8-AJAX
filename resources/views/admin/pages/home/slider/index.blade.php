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
      <li class="breadcrumb-item active">Social Icon</li>
    </ul>
  </div>
</div>
</div>

<!-- /Page Header -->

{{-- table  --}}

            @php
            $all_slider_data = json_decode($slider -> sliders);

            @endphp

<div class="row">

    <div class="col-md-8 col-xl-8 d-flex">

        <div class="card flex-fill">
            @include('validate')
            <div class="card-header">
                <h4 class="card-title">Home Page Sittings</h4>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-xl-8 d-flex">
                        <div class=" flex-fill">

                            <div class="">
                                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf




                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Slider Video</label>
                                        <div class="col-md-9">
                                            <input type="text" name="svideo" class="form-control" value="{{ $all_slider_data -> svideo }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label"></label>
                                        <div class="col-md-9">
                                            <div class="comet-slider-container">

                                                @foreach($all_slider_data -> slider as $slider)
                                                <div id="slider-card-{{ $slider -> slide_code }}" class="card">
                                                    <div data-toggle="collapse" data-target="#slide-{{ $slider -> slide_code }}" style="cursor: pointer;" class="card-header bg-primary">
                                                            <h4 class="">#slide-{{ $slider -> slide_code }} <button id="comet-slide-remove-btn" remove_id="{{ $slider -> slide_code }}" class="close">&times;</button></h4>
                                                                </div>
                                                                    <div id="slide-{{ $slider -> slide_code }}" class="collapse">
                                                                        <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="">Sub Title</label>
                                                            <input type="hidden" name="slider_code[]" class="form-control" value="{{ $slider -> slide_code }}"><input type="text" name="subtitle[]" class="form-control" value="{{ $slider -> subtitle }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Title</label>
                                                            <input type="text" name="title[]" class="form-control" value="{{ $slider -> title }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Button 01 Title</label>
                                                            <input type="text" name="btn1_title[]" class="form-control" value="{{ $slider -> btn1_title }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Button 01 Link</label>
                                                            <input type="text" name="btn1_link[]" class="form-control" value="{{ $slider -> btn1_link }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Button 02 Title</label>
                                                            <input type="text" name="btn2_title[]" class="form-control" value="{{ $slider -> btn2_title }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Button 02 Link</label>
                                                            <input type="text" name="btn2_link[]" class="form-control" value="{{ $slider -> btn2_link }}">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row">

                                        <div class="col-md-8 offset-md-4 mt-0">
                                            <button id="comet-add-slide" class="btn btn-primary">Add new slide</button>
                                        </div>
                                    </div>


                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
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




</div>
</div>


</div>
</div>
<!-- /Page Wrapper -->
@endsection
