@extends('layout.app')
@section('content')
    <button class="back-btn m-3 "><a href="{{ '/' }}">Back</a></button>
    <div class="container">
        <div class="row">
            <div class="md-12 mt-5">
                <div class="card">
                    <h1 class="text-center mt-3">Send mail using attachment</h1>
                    <div class="class-body">
                        <div class="col-md-3">
                            @if (\Session::has('success'))
                                <div class="alert alert-success m-3">{{ \Session::get('success') }}</div>
                                {{ \Session::forget('success') }}
                            @endif
                        </div>
                        @if (\Session::has('error'))
                            <div class="alert alert-danger m-3">{{ \Session::get('error') }}</div>
                            {{ \Session::forget('error') }}
                        @endif
                        <form method="post" action="{{ route('mailSend') }}" enctype="multipart/form-data" class="m-5">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="attachment" class="form-label">File upload</label>
                                <input class="form-control" type="file" id="attachment" name="attachment"
                                    accept=".xlsx,.xls,.pdf">
                                @error('attachment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="submit" name="Send mail" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- Jquery CDN --}}
    <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
@endsection
