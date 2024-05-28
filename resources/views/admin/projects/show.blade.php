@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-sm btn-primary mt-5" href="{{ route('admin.projects.index') }}">Turn back to projects list</a>
        <div class="card mt-5" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    @include('partials.image_snippet')
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <p class="card-text"><small class="text-muted">{{ $project->slug }}</small></p>
                        <p><strong>Type:</strong> {{ $project->type ? $project->type->name : 'no one type' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
