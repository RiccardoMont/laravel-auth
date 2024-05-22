@extends('layouts.admin')

@section('content')


<h1>Project list</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cover Image</th>
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
            <td>{{$project->cover_image ?? 'N/A'}}</td>
            <td>{{$project->title}}</td>
            <td>{{$project->languages_and_frameworks}}</td>
            <td>{{$project->objectives ?? 'N/A'}}</td>
            <td>{{$project->slug}}</td>
            <td>
                <a href="{{route('admin.projects.edit', $project)}}"><i class="fa-solid fa-pencil text-success"></i></a>
                <a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-eye text-primary"></i></a>
                <i class="fa-solid fa-trash text-danger" data-bs-toggle="modal" data-bs-target="#{{$project->id}}"></i>
                <!-- Modal -->
                <div class="modal fade" id="{{$project->id}}" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="DeleteModalLabel">Delete element</h1>
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
                                    <button type="submit" class="btn btn-danger">Delete</button>
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

    <style type="text/css">


    i:hover {

        opacity: 0.7;
        cursor: pointer;


    }
        
    </style>