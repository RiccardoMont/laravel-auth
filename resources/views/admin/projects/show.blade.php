@extends('layouts.admin')

@section('content')



<div class="mt-4 single-project">
    <div class="title">
        <h3 class="text-uppercase fw-bold">{{$project->title}}</h3>
        <span class="fst-italic fw-bold">{{$project->slug}}</span>
    </div>
    <div class="d-flex justify-content-between">
        @if (Str::startsWith($project->cover_image, 'https://'))
        <img loading="lazy" class="rounded" width="100%" src="{{$project->cover_image}}" alt="">
        @else
        <img loading="lazy" class="rounded" width="50%" src="{{asset('storage/' . $project->cover_image)}}" alt="">
        @endif
        <div class="col-6 position-relative">
            <p class="text-break"><strong>Objectives:</strong> {{$project->objectives ?? 'N/A'}}</p>
            <span><strong>Languages and framework:</strong> {{$project->languages_and_frameworks}}</span>
            <div class="position-absolute bottom-0 end-0">
                <span class="fst-italic">Id: {{$project->id}}</span>
            </div>
        </div>
    </div>

</div>

@endsection