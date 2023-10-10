@extends('layouts.app')

@section("content")
    <div class="container mt-5 index-container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Language</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>                    
                    </thead>
                    <tbody>
                        @foreach ($projects as $singleProject )  
                        <tr>
                            <td>{{$singleProject->title}}</td>
                            <td>{{implode(",", $singleProject->language)}}</td>
                            <td>{{$singleProject->link}}</td>
                            <td>
                                <a href="{{route("admin.projects.show", $singleProject->slug )}}" class="btn btn-primary btn-lg" type="button">Dettagli</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>

            <div class="container text-center mt-5">
                <a href="{{route("admin.projects.create")}}" class="btn btn-primary btn-lg" type="button">ADD PROJECT</a>
            </div>
            
        </div>
    </div>
@endsection