@extends('layouts.app')
@section('title', 'Vacancies')

@section('content')

    @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

    <div class="wrapper d-flex flex-wrap ">
        @forelse($vacancies as $vacancy)
            <div class="card m-2 text-center" style="width: 100%; max-width: 20rem">
                <div class="card-body" style="color: {{ $vacancy->status->hex_color }};">
                    <p class="card-title">
                        <small style="background-color: white; position: absolute; right: 1rem; top: -0.9em; color: {{$vacancy->status->hex_color}}">
                            {{ $vacancy->status->name }}
                            {{ $vacancy->status_assigned_at->diffForHumans() }}
                        </small>
                        <a target="_blank" style="color: inherit" class="link" href="{{ $vacancy->link }}">{{ $vacancy->position }}</a>
                        <small class="fs-6 text-secondary">at&nbsp{{ $vacancy->company_name }}</small>
                    </p>
                    <p class="card-text">
                        {{ $vacancy->title }}
                    </p>
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('vacancy.edit', ['vacancy' => $vacancy->id]) }}" class="card-link btn btn-outline-primary mb-2" style="width: 100%">Edit status</a>
                            <form id="deleteVacancy" action="{{ route('vacancy.destroy', ['vacancy' => $vacancy->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="card-link btn btn-outline-danger" onclick="document.closest('form#deleteVacancy').submit()" style="width: 100%">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="card m-2 text-center">
                <h1>There is nothing yet, create new vacancy</h1>
            </div>
        @endforelse
    </div>
@endsection
