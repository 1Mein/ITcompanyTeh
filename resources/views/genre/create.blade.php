@extends('layouts.app')

@section('content')
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
                                <a href="{{route('genre.index')}}">Genres</a>
                            </li>
                        </ul>

                        <h3 class="text-center">Upload Genre</h3>
                        <div class="d-flex justify-content-center">
                            <form action="{{route('genre.store')}}" method="post" class="mx-auto">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Genre name</label>
                                    <input name="name" class="form-control" type="text"
                                           id="name" placeholder="Genre name" value="{{old('name')}}">

                                    @error('name')
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
@endsection
