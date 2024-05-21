@extends('layouts.admin')

@section('content')


<h1>Project list</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Languages and frameworks</th>
            <th>Objectives</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
        <tr>
            <td>{{$project->id}}</td>
            <td>{{$project->title}}</td>
            <td>{{$project->languages_and_frameworks}}</td>
            <td>{{$project->objectives ?? 'N/A'}}</td>
            <td>{{$project->objectives ?? 'N/A'}}</td>
            <td>
                <a href="{{route('admin.projects.edit', $project)}}"><i class="fa-solid fa-pencil"></i></a>
                <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye"></i></a>
                <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#DeleteModal"></i>
        

                <!-- Modal -->
                <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="DeleteModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this element permanently?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <form action="{{route('admin.projects.destroy', $project)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td>No content here</td>
        </tr>
        @endforelse
    </tbody>
    @endsection