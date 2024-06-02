@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row row-cols-2 mt-5">
            <div class="col">
                <h2>Here's all projects associeted to type n. {{ $type->id }}</h2>
            </div>
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <h3 class="text-primary">Type name: {{ $type->name }}</h3>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="">
                                <td>
                                    @forelse ($type->projects as $project)
                                        <ul>
                                            <li><strong>{{ $project->title }}</strong>
                                                <div>
                                                    {{ $project->description }}
                                                </div>
                                            </li>
                                        </ul>
                                    @empty
                                        No projects found
                                    @endforelse
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
@endsection
