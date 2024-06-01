@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Project n. {{ $project->id }}</h2>
        <a class="btn btn-sm btn-primary mt-5" href="{{ route('admin.projects.index') }}">Turn back to projects list</a>
        <div class="card mt-5" style="max-width: 540px;">
            <div class="row g-0">

                <div class="col-md-4">
                    {{-- I dont'use snippet to make image sixe bigger --}}
                    @if (Str::startsWith($project->cover_image, 'https://'))
                        <img width="150" src="{{ $project->cover_image }}" alt="">
                    @else
                        <img width="150" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                    @endif
                    <p><strong>Type:</strong> {{ $project->type ? $project->type->name : 'no one type' }}</p>
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text"><small class="text-muted">{{ $project->slug }}</small></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
