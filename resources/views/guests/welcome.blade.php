@extends('layouts.app')
@section('content')

<div class="jumbotron p-2 rounded-3 text-light">
    <div class="container py-2 px-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 d-flex flex-column align-items-center justify-content-center gap-4">
                <h1 class="display-4 fw-bold text-center text-dark">
                    Hello, this is my Portfolio
                </h1>
        
                <p class="fs-5 text-center lh-lg text-dark">conetent</p>
                {{-- <a href="{{route("admin.projects.index")}}" class="btn btn-primary btn-lg" type="button">My projects</a> --}}
            </div>
            <div class="col-12 col-lg-6 text-center">
                <img src="/img/right-side.svg" class="welcome-svg " alt="">             
            </div>
        </div>

    </div>
</div>

<div class="content">
    <div class="container-fluid text-dark text-center p-5">
        <div class="row row-cols-3 g-5 p-2" >
            @foreach ( $projects as $project)
                <div class="col">
                    <div class="card proj-card">
                        <img src="{{asset("storage/" . $project->thumb)}}" class="card-img-top" alt=".">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{$project->title}}</h5>
                            <small>{{implode(",", $project->language )}}</small>
                            <div class="link-container text-center mt-5">
                                <a href="{{route("admin.projects.show", $project->slug)}}" class="btn btn-primary w-25">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="watch-more mt-3 text-center">
        <a href="{{route("admin.projects.index")}}" class="btn btn-primary more-button">Watch my projects</a>
    </div>
</div>
@endsection