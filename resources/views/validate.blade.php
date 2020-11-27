@if($errors -> any())
    <p class="alert alert-danger text-center">{{ $errors -> first() }}<button class="close" data-dismiss="alert">&times;</button> </p>
@endif

@if(Session::has('success'))
    <p class="alert alert-success text-center">{{ Session::get('success') }}<button class="close" data-dismiss="alert">&times;</button> </p>
@endif