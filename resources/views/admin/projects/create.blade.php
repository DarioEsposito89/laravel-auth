@extends('layouts.app')

@section("content")
    <div class="container mt-5">
        <div class="row">
            <div class="col text-dark">
                <form action="{{route("admin.projects.store")}}" method="POST">
                    @csrf()
                    
                    {{-- title --}}

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control @error("title") is-invalid                            
                        @enderror" value="{{old("title")}}">
                        @error("title")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>
                    
                    {{-- language --}}

                    <div class="mb-3">
                        <label for="language" class="form-label">Languages</label>
                        <input type="text" class="form-control @error("language") is-invalid                            
                        @enderror" id="language" name="language" value="{{old("language")}}" >
                        @error("language")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    {{-- link --}}

                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" id="link" name="link" class="form-control @error("link") is-invalid                            
                        @enderror" value="{{old("title")}}">
                        @error("link")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    {{-- description --}}

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea  id="description" name="description" class="form-control @error("description") is-invalid                            
                        @enderror">{{old("description")}}</textarea>
                        @error("description")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    {{-- thumb --}}

                    <div class="mb-3">
                        <label for="thumb" class="form-label">Thumb</label>
                        <input type="text" id="thumb" name="thumb" class="form-control @error("thumb") is-invalid                            
                        @enderror" value="{{old("thumb")}}">
                        @error("thumb")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    {{-- date --}}

                    <div class="mb-3">
                        <label for="date" class="form-label">Release</label>
                        <input type="date" id="date" name="release"  class="form-control @error("release") is-invalid                            
                        @enderror" value="{{old("release")}}">
                        @error("release")
                            <div class="invalid-feedback">Questo campo è obbligatorio</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection