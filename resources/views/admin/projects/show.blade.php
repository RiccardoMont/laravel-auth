@extends('layouts.admin')

@section('content')

@include('partials.session-message')

<div class="my-4 single-project">
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
        <div class="col-6 position-relative px-4">
            <p class="text-break"><strong>Objectives:</strong> {{$project->objectives ?? 'N/A'}}</p>
            <div class="languages_and_frameworks">
                <span><strong>Languages and framework:</strong> {{$project->languages_and_frameworks}}</span>
            </div>
            <div class="type">
                <span><strong>Type:</strong>
                    @forelse ($types as $type)
                    @if($type->id == $project->type_id)
                    {{$type->name}}
                    @endif
                    @empty
                    <p>No types</p>
                    @endforelse
                </span>
            </div>
            <div class="wrapper p-4"></div>
            <div class="position-absolute bottom-0 d-flex justify-content-between" style="width:92%">
                <div class="div">
                    <span class="fst-italic">Id: {{$project->id}}</span>
                </div>
                <div class="div">
                    <span class="fst-italic">By: @forelse ($users as $user)
                        @if($user->id == $project->user_id)
                        {{$user->name}}
                        @endif
                        @empty
                        <p>No User</p>
                        @endforelse
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection