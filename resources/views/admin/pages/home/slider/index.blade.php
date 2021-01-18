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

                            <div class="card-body">
                                <form action="#">

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Slider Video</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label"></label>
                                        <div class="col-md-9">
                                            <div class="comet-slider-container">

                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row">

                                        <div class="col-md-9 offset-md-3">
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
