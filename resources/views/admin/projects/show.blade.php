@extends('layouts.app')

@section("content")
    <div class="container text-dark pb-5">
        <div class="row">
            <div class="col show-col">
                <div class="show-box d-flex flex-column gap-2">
                    <h1 class="display-4">{{$project->title}}</h1>

                    <img src="{{asset("storage/" . $project->thumb)}}" alt="" class="">
                    <small class="fw-bold">{{implode(",", $project->language )}}</small>

                    <p class="mt-2">{{$project->description}}</p>
                    <a href="{{$project->link}}" class="fs-5 text-decoration-none">GitHub</a>
                    <p>Release: {{$project->release->format("d-m-Y")}}</p>

                </div>

                {{-- BOTTONI --}}

                <div class="Btn-container d-flex gap-4 mt-3">
                    <a href="{{route("admin.projects.edit", $project->id)}}" class="btn btn-primary btn-lg mt-2" type="button">EDIT</a>
                    <form action="{{route("admin.projects.destroy", $project->slug)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-primary btn-lg mt-2" type="submit"> DELETE </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection