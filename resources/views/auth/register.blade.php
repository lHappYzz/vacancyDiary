@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <div class="wrapper d-flex flex-wrap justify-content-center">
        <form action="{{ route('register') }}" style="width: 60%" method="post">
            @if ($errors->any())
                <div class="alert alert-danger" style="">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            @endif

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">User name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">User email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">User password</label>
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">User password confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
            </div>
            <button class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
