@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.success')
        @include('partials.errors')

        <div class="row row-cols-2 mt-5">
            <div class="col">
                <form action="{{ route('admin.types.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Type Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="Insert type name" />
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                    <button type="submit" class="btn btn-success">Insert</button>
                </form>

            </div>
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Type name</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr class="">
                                    <td scope="row">{{ $type->id }}</td>
                                    <td>
                                        <form action="{{ route('admin.types.update', $type) }}" method="post">
                                            @csrf
                                            @method('PATCH')

                                            <div class="mb-3">
                                                {{-- <label for="title" class="form-label"><strong>Title</strong></label> --}}
                                                <input type="text" class="form-control" name="name" id="name"
                                                    aria-describedby="helptitle" placeholder="Update type name"
                                                    value="{{ old('name') ?: $type->name }}" />
                                                {{-- <small id="helptitle" class="form-text text-muted">Update project title</small> --}}
                                            </div>
                                            <button class="btn btn-info" type="submit">up date</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.types.show', $type) }}">{{ count($type->projects) }}</a>
                                    <td>

                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalId-{{ $type->id }}"><i class="fa-solid fa-ban"></i>
                                            Delete
                                        </button>

                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitle-{{ $type->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitle-{{ $type->id }}">
                                                            Delete type n.{{ $type->id }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">Are tou really sure yuo want to remove? 🧐</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>

                                                        <form action="{{ route('admin.types.destroy', $type) }}"
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
                                    <td scope="row" colspan="5">No types found</td>

                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
@endsection
