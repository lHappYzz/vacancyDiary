@extends('layouts.app')
@section('title', 'Create vacancy')

@section('content')
    <div class="wrapper d-flex flex-wrap justify-content-center">
        <form action="{{ route('vacancy.store') }}" style="width: 60%" method="post">
            @csrf

            @if(session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" style="">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            @endif

            <div class="mb-3">
                <label for="title" class="form-label">Vacancy title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Vacancy position</label>
                <input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}" required>
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company name</label>
                <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Vacancy status</label>
                <select id="status" name="status" class="form-select" required>
                    @foreach($statuses as $status)
                        <option name="{{ $status->name }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
