@extends('layouts.app')


@section('title')
    | Admin
@endsection

@section('content')
<div class="container h-100 d-flex flex-column justify-content-center">
    <h1 class="text-center my-5">Progetti</h1>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    @endif

    <div class="div d-flex justify-content-center">
        <a class="btn btn-warning" href="{{route('admin.projects.create')}}">Create New Project</a>
    </div>

    <div class="row d-flex">
        @forelse ($projects as $project)
        <div class="col-6 d-flex justify-content-center py-5">
            <div class="card" style="width: 18rem;">
                <img src="{{$project->cover_image}}" class="card-img-top" alt="{{$project->name}}">
                <div class="card-body">
                    <h3 class="card-title py-3 text-center">{{$project->name}}</h5>
                    <p class="card-text">{{$project->id}}</p>
                    <p class="card-text">{{$project->summary}}</p>
                    <div class="d-flex flex-column">
                        <a class="btn btn-primary " href="{{route('admin.projects.show', $project)}}" title="show">See Details >></a>
                        <a class="btn btn-success my-2" href="{{route('admin.projects.edit', $project)}}" title="edit">Edit Project</a>
                        <div class="w-100">
                            @include('admin.partials.delete-form')
                        </div>

                    </div>

                </div>
            </div>
        </div>

    @empty
       <h2>NO RESULTS</h2>
    @endforelse

    </div>
</div>
@endsection
