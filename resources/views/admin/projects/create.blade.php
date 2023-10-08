@extends('layouts.app')

@section("content")
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <form action="{{route("admin.projects.store")}}" method="POST">
                    @csrf()
                 
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" >
                    </div>
                    
                    <div class="mb-3">
                        <label for="language" class="form-label">Languages</label>
                        <input type="text" class="form-control" id="language" name="language" >
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" class="form-control" id="link" name="link" >
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea  class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="thumb" class="form-label">Thumb</label>
                        <input type="text" class="form-control" id="thumb" name="thumb" >
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Release</label>
                        <input type="date"  class="form-control" id="date" name="release">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection