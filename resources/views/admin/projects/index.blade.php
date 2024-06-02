@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.success')

        <div class="table-responsive">
            <table class="table table-primary px-2">
                <a class="btn btn-info m-2" href="{{ route('admin.projects.create') }}">Add a new project</a>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Cover_image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Project_url</th>
                        <th scope="col">Type</th>
                        <th scope="col">Technology</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>

                            {{-- Check for image --}}
                            <td>
                                @include('partials.image_snippet')
                            </td>

                            <td>{{ $project->description }}</td>
                            {{--     <td><a href="{{ $project->project_url }}" target="__blank"></a></td> --}}
                            <td><a href="{{ $project->project_url }}">{{ $project->project_url }}</a></td>
                            <td>
                                <span
                                    class="badge bg-secondary">{{ $project->type ? $project->type->name : 'none type' }}</span>
                            </td>

                            <td>
                                @forelse ($project->technologies as $technology)
                                    <span class="badge bg-secondary">{{ $technology->name }}</span>
                                @empty
                                    None technology
                                @endforelse
                            </td>

                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary ">
                                    <i class="fa-solid fa-binoculars"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-dark m-1 ">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}"><i class="fa-solid fa-ban"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $project->id }}">
                                                    Delete project n.{{ $project->id }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are tou really sure yuo want to remove? 🧐</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="5">No projects found</td>

                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>

    </div>

    {{ $projects->links('pagination::bootstrap-5') }}
@endsection
