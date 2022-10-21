@extends('layout.app')
@section('content')
    <div class="alert alert-success">
        <h3>Hello,User Product deleted.</h3>
        <p class="lead">Delete Successfuly!</p>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- Jquery CDN --}}
    <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
@endsection
