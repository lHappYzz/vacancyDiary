@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="wrapper d-flex flex-wrap justify-content-center">
        <form action="{{ route('login') }}" style="width: 60%" method="post">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">User email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">User password</label>
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
            </div>
            <button class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
