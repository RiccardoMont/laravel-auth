@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.projects.store') }}" method="post">
    @csrf

    <div class="campo">
        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" value="{{old('title')}}">
    </div>
    <div class="campo">
        <label for="languages_and_frameworks">Descrizione</label>
        <textarea type="text" name="languages_and_frameworks" id="languages_and_frameworks" rows="6" cols="100">{{old('languages_and_frameworks')}}</textarea>
    </div>
    <div class="campo">
        <label for="slug">Slugs</label>
        <input type="text" name="slug" id="slug" size="100" value="{{old('slug')}}">
    </div>
    <div class="campo">
        <label for="objectives">Objectives</label>
        <textarea type="text" name="objectives" id="objectives" rows="6" cols="100">{{old('objectives')}}</textarea>
    </div>
    <div class="update-comic">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>



@endsection