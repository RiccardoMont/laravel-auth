@extends('layouts.admin')

@section('content')

<h1 class="fw-bold my-4">Insert a new project</h1>

<form class="mt-4" action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label fs-5 fw-bold">Titolo</label>
        <input type="text" class="form-control border-3 border-dark-subtle" name="title" id="title" value="{{old('title')}}">
    </div>
    <div class="mb-3">
            <label for="type_id" class="form-label fs-5 fw-bold">Type</label>
            <select class="form-select border-3 border-dark-subtle" name="type_id" id="type_id">
                <option selected disabled>Select one</option>
                @foreach ($types as $type )
                <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' :'' }}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>
    <div class="mb-3">
        <label for="cover_image" class="form-label fs-5 fw-bold">Cover Image</label>
        <input type="file" class="form-control border-3 border-dark-subtle" name="cover_image" id="cover_image" placeholder="cover_image" aria-describedby="coverImageHelper">
        <div id="coverImageHelper" class="form-text">Upload a cover image for this project</div>
    </div>
    <div class="mb-3">
        <label for="languages_and_frameworks" class="form-label fs-5 fw-bold">Languages and frameworks</label>
        <textarea type="text" class="form-control border-3 border-dark-subtle" name="languages_and_frameworks" id="languages_and_frameworks" rows="6" cols="100">{{old('languages_and_frameworks')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="objectives" class="form-label fs-5 fw-bold">Objectives</label>
        <textarea type="text" class="form-control border-3 border-dark-subtle" name="objectives" id="objectives" rows="6" cols="100">{{old('objectives')}}</textarea>
    </div>
    <button class="btn btn-primary my-4" type="submit">Create</button>
</form>



@endsection