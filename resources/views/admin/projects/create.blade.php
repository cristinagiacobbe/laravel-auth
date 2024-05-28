@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-3">Add a new project</h1>

        @include('partials.errors')

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title"
                    aria-describedby="helptitle" placeholder="Type a title for your project" value="{{ old('title') }}" />
                <small id="helptitle" class="form-text text-muted">Type project title</small>

                {{-- alternativo al partials.errors --}}
                {{-- @error('title')
                    <div class="alert alert-danger ">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select " name="type_id" id="type_id">
                    <option selected>Select one</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
            </div>


            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover image</label>
                <input type="file" class="form-control @error('cover_image')is-invalid @enderror" name="cover_image"
                    id="cover_image" aria-describedby="helpcover_image"
                    placeholder="Here you can upload an image for your project" />
                <small id="helpcover_image" class="form-text text-muted">Upload cover_image</small>

                {{-- alternativo al partials.errors --}}
                {{-- @error('cover_image')
                    <div class="alert alert-danger ">{{ $message }}</div>
                @enderror --}}
            </div>

            <div class="mb-3">
                <label for="project_url" class="form-label">Project Url</label>
                <input type="text" class="form-control @error('project_url')is-invalid @enderror" name="project_url"
                    id="project_url" aria-describedby="helpproject_url" placeholder="Type a project_url for your project"
                    value="{{ old('project_url') }}" />
                <small id="helpproject_url" class="form-text text-muted">Type project project_url</small>

                {{-- alternativo al partials.errors --}}
                {{-- @error('project_url')
                    <div class="alert alert-danger ">{{ $message }}</div>
                @enderror --}}

            </div>

            <div class="mb-3">
                <label for="description" class="form-label"></label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">Create</button>
            <button class="btn btn-danger">Turn back to project list</button>

        </form>
    </div>
@endsection
