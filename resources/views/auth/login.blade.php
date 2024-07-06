@include('layouts.layout')
@section('tittle', 'Login')

{{-- @section('content') --}}
<div class="container m-1">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-8">

            <form class="form bg-secondary text-white p-3 rounded" action="{{ route('login') }}" method="post">
                @csrf
                <h3 class="text-center">Sign In</h3>

                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    <div class="text-right">
                        <a href="/register" class="text-white">Register here</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- @endsection --}}
