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
                        </ul>


                        <div class="my-5">
                            <a class="btn btn-primary" href="{{route('genre.create')}}">Upload Genre</a>
                        </div>

                        <div class="container">
                            <div class="row">
                                @foreach($genres as $genre)
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" id="genre-main-{{$genre->id}}">
                                        <div class="card">

                                        <p class="card-header">
                                            <b>
                                                {{$genre->name}}
                                            </b>
                                        </p>
                                            <div class="card-body">
                                                <span>Actions:</span>
                                                <br>
                                                <a href="{{route('genre.edit',$genre)}}" class="btn btn-primary p-1" style="font-size: small">Edit</a>
                                                <button onclick="deleteFilm({{$genre->id}})" class="btn btn-danger p-1" style="font-size: small">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('input[type="button"]').on('click', function(){
                $(this).prop('disabled', true);
            });
        });

        function deleteFilm(genreId) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var genreMain = $('#genre-main-' + genreId);
            $.ajax({
                type: 'DELETE',
                url: '/genres/' + genreId,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    if (response.code !== '200') {
                        console.log(response);
                        return;
                    }

                    genreMain.remove();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    </script>
@endsection
