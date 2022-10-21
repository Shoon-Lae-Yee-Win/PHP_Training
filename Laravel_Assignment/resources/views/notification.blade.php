@extends('layout.app')
@section('content')
    <div class="container text-center">
        <h1 class="lead mt-3">Hello User,This is Product Excel File.</h1>
        <p class="lead">Please open attachment.</p>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- Jquery CDN --}}
    <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
@endsection
