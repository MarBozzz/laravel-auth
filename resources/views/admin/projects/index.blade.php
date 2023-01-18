@extends('layouts.app')


@section('title')
    | Admin
@endsection

@section('content')
<div class="container h-100 ">
    <h1 class="text-center my-5">Progetti</h1>
    <div class="row d-flex">
        @forelse ($projects as $project)
        <div class="col-6 d-flex justify-content-center py-5">
            <div class="card" style="width: 18rem;">
                <img src="{{$project->cover_image}}" class="card-img-top" alt="{{$project->name}}">
                <div class="card-body">
                <h5 class="card-title">{{$project->name}}</h5>
                <p class="card-text">{{$project->summary}}</p>
                <a href="#" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>

    @empty
       <h2>NO RESULTS</h2>
    @endforelse

    </div>
</div>
@endsection
