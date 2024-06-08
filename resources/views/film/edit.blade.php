@extends('layouts.app')

@section('content')
    <link href="https://unpkg.com/multiple-select@1.7.0/dist/multiple-select.min.css" rel="stylesheet">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Actions</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('film.index')}}">Films</a>
                            </li>
                        </ul>

                        <h3 class="text-center">Edit Film</h3>
                        <div class="d-flex justify-content-center">
                            <form action="{{route('film.update',$film)}}" method="post" class="mx-auto" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Film name</label>
                                    <input name="name" class="form-control" type="text"
                                           id="name" placeholder="Film name" value="{{$film->name}}">

                                    @error('name')
                                    <div>
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Poster of the film</label>
                                    <input name="image" class="form-control" type="file" id="formFile">
                                    <img src="{{asset('storage/'.$film->image)}}" alt="old image" class="w-25">

                                    @error('image')
                                    <div>
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="genres" class="form-label">Choose genres</label>
                                    <select class="w-100" name="genre_ids[]" id="genres" multiple="multiple">
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}" @if(in_array($genre->id,$film->genres->pluck('id')->toArray()??[])) selected @endif>{{$genre->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('genre_ids')
                                    <div>
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/multiple-select@1.7.0/dist/multiple-select.min.js"></script>
    <script>
        $(function () {
            $('select').multipleSelect()
        })
    </script>
@endsection
