@extends('layouts.admin')

@section('content')



<div class="mt-4 single-project">
    <div class="title">
        <h3 class="text-uppercase fw-bold">{{$project->title}}</h3>
        <span class="fst-italic fw-bold">{{$project->slug}}</span>
    </div>
    <div class="d-flex justify-content-between">
        <img class="rounded" src="{{$project->cover_image ?? 'https://picsum.photos/500/350'}}" alt="">
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