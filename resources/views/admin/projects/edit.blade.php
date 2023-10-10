@extends('layouts.app')

@section("content")
    <div class="container edit-container mt-5">
        <div class="row">
            <div class="col text-light">
                <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    @method("put")
                    
                    {{-- TITOLO --}}
        
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control @error("title") is-invalid                            
                        @enderror" value="{{old("title", $project->title)}}">

                        {{-- ALLERT --}}
                        @error("title")
                            <div class="invalid-feedback">You need to give it a title</div>
                        @enderror
                    </div>
                    
                    {{-- LINGUAGGIO --}}

                    <div class="mb-3">
                        <label for="language" class="form-label">Languages</label>
                        <input type="text" class="form-control @error("language") is-invalid                            
                        @enderror" id="language" name="language" value="{{old("language", implode(",",$project->language ))}}" >
                        {{-- ALLERT --}}
                        @error("language")
                            <div class="invalid-feedback">Enter the programming languages you used for the project</div>
                        @enderror
                    </div>

                    {{-- LINK PROGETTO --}}

                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" id="link" name="link" class="form-control @error("link") is-invalid                            
                        @enderror" value="{{old("title", $project->link)}}">
                        {{-- ALLERT --}}
                        @error("link")
                            <div class="invalid-feedback">Enter the link to view the project</div>
                        @enderror
                    </div>

                    {{-- DESCRIZIONE --}}

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea  id="description" name="description" class="form-control @error("description") is-invalid                            
                        @enderror">{{old("description", $project->description)}}</textarea>
                        {{-- ALLERT --}}
                        @error("description")
                            <div class="invalid-feedback">You must enter a description</div>
                        @enderror
                    </div>

                    {{-- IMMAGINE --}}

                    <div class="mb-3">
                        <label for="thumb" class="form-label">Image</label>
                        <input type="file" accept="image/* " id="thumb" name="thumb" class="form-control @error("thumb") is-invalid                            
                        @enderror">
                        {{-- ALLERT --}}
                        @error("thumb")
                            <div class="invalid-feedback">You need to upload an image</div>
                        @enderror
                    </div>

                    {{-- DATA --}}

                    <div class="mb-3">
                        <label for="date" class="form-label">Release</label>
                        <input type="date" id="date" name="release"  class="form-control @error("release") is-invalid                            
                        @enderror" value="{{old("release", $project->release->format("Y-m-d"))}}">
                        {{-- ALLERT --}}
                        @error("release")
                            <div class="invalid-feedback">You need to set the date</div>
                        @enderror
                    </div>

                    {{-- CONFIRM BUTTON --}}

                    <button type="submit" class="btn btn-primary mt-4">CONFIRM</button>

                </form>
            </div>
        </div>
    </div>

@endsection