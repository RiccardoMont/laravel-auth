@extends('layouts.admin')

@section('content')


<h1>{{$project->title}}</h1>
<p>Languages and framework: {{$project->languages_and_frameworks}}</p>
<span>Slugs: {{$project->slug}}</span>
<p>Objectives: {{$project->objectives ?? 'N/A'}}</p>
<em>Id: {{$project->id}}</em>


@endsection