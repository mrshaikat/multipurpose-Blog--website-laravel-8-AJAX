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

    <div class="col-xl-6 d-flex">

        <div class="card flex-fill">
            @include('validate')
            <div class="card-header">
                <h4 class="card-title">Social Media Settings</h4>

            </div>

            <div class="card-body">


                @php
                    $social = $settings -> social;

                    $social_data = json_decode($social);

                @endphp


                <form action="{{ route('social.update') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Facebook</label>
                        <div class="col-lg-9">
                            <input type="text" name="face" class="form-control" value="{{  $social_data -> face }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Twitter</label>
                        <div class="col-lg-9">
                            <input type="text" name="twit" class="form-control" value="{{  $social_data -> twit }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Linkedin</label>
                        <div class="col-lg-9">
                            <input type="text" name="linkd" class="form-control" value="{{  $social_data -> linkd }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Instagram</label>
                        <div class="col-lg-9">
                            <input type="text" name="inst" class="form-control" value="{{  $social_data -> inst }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Dribbble</label>
                        <div class="col-lg-9">
                            <input type="text" name="drib" class="form-control" value="{{  $social_data -> drib }}">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
