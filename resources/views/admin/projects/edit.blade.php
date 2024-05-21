@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.projects.update', $project) }}" method="post">
    @csrf
    @method('PUT')

    <div class="campo">
        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" value="{{$project->title}}">
    </div>
    <div class="campo">
        <label for="languages_and_frameworks">Descrizione</label>
        <textarea type="text" name="languages_and_frameworks" id="languages_and_frameworks" rows="6" cols="100">{{$project->languages_and_frameworks}}</textarea>
    </div>
    <div class="campo">
        <label for="slug">Slugs</label>
        <input type="text" name="slug" id="slug" size="100" value="{{$project->slug}}">
    </div>
    <div class="campo">
        <label for="objectives">Objectives</label>
        <textarea type="text" name="languages_and_frameworks" id="languages_and_frameworks" rows="6" cols="100">{{$project->objectives}}</textarea>
    </div>
    <div class="update-comic">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>



@endsection