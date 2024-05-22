@extends('layouts.admin')

@section('content')

<h1 class="fw-bold">Edit the project</h1>

<form class="mt-4" action="{{ route('admin.projects.update', $project) }}" method="post">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label fs-5 fw-bold">Titolo</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="title" id="title" value="{{$project->title}}">
    </div>
    <div class="mb-3">
        <label for="languages_and_frameworks" class="form-label fs-5 fw-bold">Descrizione</label>
        <textarea type="text" class="form-control border-3 border-dark-subtle" name="languages_and_frameworks" id="languages_and_frameworks" rows="6" cols="100">{{$project->languages_and_frameworks}}</textarea>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label fs-5 fw-bold">Slugs</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="slug" id="slug" size="100" value="{{$project->slug}}">
    </div>
    <div class="mb-3">
        <label for="objectives" class="form-label fs-5 fw-bold">Objectives</label>
        <textarea type="text" class="form-control border-3 border-dark-subtle" name="objectives" id="objectives" rows="6" cols="100">{{$project->objectives}}</textarea>
    </div>

    <button class="btn btn-primary mt-4" type="submit">Update</button>

</form>



@endsection