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
      <li class="breadcrumb-item active">Our Clients</li>
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
                <h4 class="card-title">Our Clients Settings</h4>

            </div>

            <div class="card-body">


                @php
                    $clients = $settings -> clients;

                    $clients_data = json_decode($clients);

                @endphp


                <form action="{{ route('clients.update') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Clients Title</label>
                        <div class="col-lg-9">
                            <input type="text" name="client_title" class="form-control" value="">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Clients-1</label>
                        <div class="col-lg-9">
                            <input type="file" name="client_1" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Clients-2</label>
                        <div class="col-lg-9">
                            <input type="file" name="client_2" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Clients-3</label>
                        <div class="col-lg-9">
                            <input type="file" name="client_3" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Clients-4</label>
                        <div class="col-lg-9">
                            <input type="file" name="client_4" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Clients-5</label>
                        <div class="col-lg-9">
                            <input type="file" name="client_5" class="form-control" value="">
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Clients-6</label>
                        <div class="col-lg-9">
                            <input type="file" name="client_6" class="form-control" value="{{ $clients_data -> client_6 }}">
                        </div>
                    </div> --}}



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
