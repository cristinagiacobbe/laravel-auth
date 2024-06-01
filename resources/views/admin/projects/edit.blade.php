@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-3">Update project n.{{ $project->id }}</h1>

        @include('partials.errors')

        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label"><strong>Title</strong></label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title"
                    aria-describedby="helptitle" placeholder="Type here to change post title"
                    value="{{ old('title') ?: $project->title }}" />
                {{-- <small id="helptitle" class="form-text text-muted">Update project title</small> --}}

                @error('title')
                    <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label"><strong>Cover image</strong></label>
                <div>
                    @include('partials.image_snippet')
                </div>

                <input type="file" class="form-control @error('cover_image')is-invalid @enderror" name="cover_image"
                    id="cover_image" aria-describedby="helpcover_image"
                    placeholder="Here you can upload an image for your project" />
                {{--  <small id="helpcover_image" class="form-text text-muted">Upload cover_image</small> --}}

                @error('cover_image')
                    <div class="alert alert-danger ">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label"><strong>Type</strong></label>
                <select class="form-select " name="type_id" id="type_id">
                    <option selected>Select one</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label"><strong>Description</strong></label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?: $project->description }}</textarea>
            </div>

            <div class="mb-3 d-flex gap-3">
                <div>
                    <strong>Technologies</strong>
                </div>
                @foreach ($technologies as $technology)
                    {{-- SOLUZIONE LUIGI --}}
                    {{-- <input class="form-check-input" type="checkbox" id="technology-{{ $technology->id }}"
                            value="{{ $technology->id }}" name="technologies[]"
                            {{ in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray() ?? [])) ? 'checked' : '' }} />

                        <label class="form-check-label" for="tag-{{ $technology->id }}">{{ $technology->name }}</label> --}}

                    {{-- SOLUZIONE FABIO --}}


                    @if ($errors->any())
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                                id="technology-{{ $technology->id }}" name="technologies[]"
                                {{ in_array($technology->id, old('technologies', $project->technologies)) ? 'checked' : '' }} />
                            <label class="form-check-label"
                                for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                        </div>
                    @else
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                                id="technology-{{ $technology->id }}" name="technologies[]"
                                {{ $project->technologies->contains($technology->id) ? 'checked' : '' }} />
                            <label class="form-check-label"
                                for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                        </div>
                    @endif
                @endforeach
            </div>

            <button class="btn btn-primary" type="submit">Update</button>
            <button class="btn btn-danger">Turn back to project list</button>

        </form>
    </div>
@endsection
