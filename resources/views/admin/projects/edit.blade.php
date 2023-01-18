@extends('layouts.app')


@section('title')
    | Admin
@endsection

@section('content')
<div class="container h-100 ">
    <h1 class="text-center my-5">Edit {{$project->name}} Project</h1>
    <div class="row d-flex">
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('admin.projects.update',$project)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name',$project->name)}}" placeholder="Insert name">
                @error('name')
                    <p  class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
                </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Image *</label>
                <input type="text" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image"  value="{{old('cover_image',$project->cover_image)}}" placeholder="Insert URL image">
                @error('cover_image')
                    <p  class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
                </div>

            <div class="mb-3">
                <label for="client_name" class="form-label">Client Name *</label>
                <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client_name"  value="{{old('client_name',$project->client_name)}}" placeholder="Insert Client Name">
                @error('client_name')
                    <p  class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="summary" class="form-label">Summary *</label>
                <textarea class="form-control" name="summary" id="summary" rows="3">{{old('summary',$project->summary)}}
                </textarea>

            <button type="submit" class="btn btn-primary mb-5">Invia</button>
        </form>
    </div>
</div>
@endsection
