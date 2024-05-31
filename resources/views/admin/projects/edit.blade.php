@extends('layouts.admin')

@section('content')

<h1 class="fw-bold my-4">Edit the project</h1>

<form class="mt-4" action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label fs-5 fw-bold">Titolo</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="title" id="title" value="{{$project->title}}">
        @error('title')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label fs-5 fw-bold">Type</label>
        <select class="form-select border-3 border-dark-subtle" name="type_id" id="type_id">
            @foreach ($types as $type)
            @if($type->id == $project->type_id)
            <option value="{{$type->id}}" selected>{{$type->name}}</option>
            @else
            <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' :'' }}>{{$type->name}}</option>
            @endif
            @endforeach
        </select>
        @error('type_id')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="d-flex gap-4 align-items-end">
        @if (Str::startsWith($project->cover_image, 'https://'))
        <img width="100px" src="{{$project->cover_image}}" alt="">
        @elseif ($project->cover_image == null)
        @else
        <img width="100px" src="{{asset('storage/' . $project->cover_image)}}" alt="">
        @endif
        <div>
            <label for="cover_image" class="form-label fs-5 fw-bold">Cover Image</label>
            <input type="file" class="form-control border-3 border-dark-subtle" name="cover_image" id="cover_image">
        </div>
        @error('cover_image')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3 d-flex gap-3">
        @foreach ($technologies as $tech)
        <div class="form-check ">
            <input class="form-check-input" type="checkbox" value="{{$tech->id}}" id="tech-{{$tech->id}}" name="technologies[]" {{ in_array($tech->id, old('technologies',[]))  ? 'checked' : '' }} />
            <label class="form-check-label" for="tech-{{$tech->id}}">{{$tech->name}}</label>
        </div>
        @endforeach
        @error('technologies')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="languages_and_frameworks" class="form-label fs-5 fw-bold">Languages and frameworks</label>
        <textarea type="text" class="form-control border-3 border-dark-subtle" name="languages_and_frameworks" id="languages_and_frameworks" rows="6" cols="100">{{$project->languages_and_frameworks}}</textarea>
        @error('languages_and_frameworks')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="objectives" class="form-label fs-5 fw-bold">Objectives</label>
        <textarea type="text" class="form-control border-3 border-dark-subtle" name="objectives" id="objectives" rows="6" cols="100">{{$project->objectives}}</textarea>
        @error('objectives')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

    <button class="btn btn-primary my-4" type="submit">Update</button>

</form>



@endsection