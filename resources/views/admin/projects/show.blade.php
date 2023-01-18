@extends('layouts.app')


@section('title')
    | Admin
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column">
    <div class="card my-5" style="width: 18rem;">
        <img src="{{$project->cover_image}}" class="card-img-top" alt="{{$project->name}}">
        <div class="card-body">
        <h3 class="card-title text-center py-3">{{$project->name}}</h5>
        <h5 class="card-title">Client name: {{$project->client_name}}</h5>
        <p class="card-text py-3">Summary{{$project->summary}}</p>
        </div>
    </div>
    <a class="btn btn-warning mb-2" href="{{ route('admin.projects.edit', $project) }}">Edit this Project</a>
    @include('admin.partials.delete-form')
    <a class="btn btn-primary my-5" href="{{route('admin.projects.index')}}" >TORNA A PROJECTS</a>

</div>
@endsection
