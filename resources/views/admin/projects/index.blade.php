@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.success')

        <div class="table-responsive">
            <table class="table table-primary">
                <a class="btn btn-info m-2" href="{{ route('admin.projects.create') }}">Add a new project</a>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Cover_image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Project_url</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>

                            <td>
                                @include('partials.image_snippet')
                            </td>

                            <td>{{ $project->description }}</td>
                            <td>{{ $project->project_url }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary ">
                                    <i class="fa-solid fa-binoculars"></i>
                                    View</a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary ">
                                    <i class="fa-solid fa-pencil"></i>
                                    Edit</a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}"><i class="fa-solid fa-ban"></i>
                                    Delete
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
@endsection
