@extends('layouts.app')

@section("content")
    <div class="container mt-5">
        <div class="row">
            @foreach ($projects as $singleProject )
                <div class="col">
                    <div class="card">
                        <h1>{{$singleProject->title}}</h1>

                        <a href="{{route("admin.projects.show", $singleProject->slug )}}" class="btn btn-primary btn-lg" type="button">Dettagli</a>

                        <a href="{{route("admin.profile.edit")}}" class="btn btn-primary btn-lg mt-2" type="button"" >Edit</a>
                        
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection