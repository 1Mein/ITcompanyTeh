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
                            <a class="btn btn-primary" href="{{route('film.create')}}">Upload Film</a>
                        </div>

                        <div class="container">
                            <div class="row">
                                @foreach($films as $film)
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4" id="film-main-{{$film->id}}">
                                        <div class="card">
                                            <img src="{{asset('storage/'.$film->image)}}" class="card-img-top"
                                                 alt="Film 1">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$film->name}}</h5>

                                                <p class="mb-0">Genres:</p>
                                                @foreach($film->genres as $genre)
                                                    <span class="border px-1 rounded-5 border-1 border-black">{{$genre->name}}</span>
                                                @endforeach

                                                <div class="mt-3">
                                                    <a href="{{route('film.edit',$film)}}" class="btn btn-primary p-1 mb-1" style="font-size: small">Edit</a>
                                                    <button onclick="deleteFilm({{$film->id}})" class="btn btn-danger p-1 mb-1" style="font-size: small">Delete</button>
                                                    <br>
                                                    @if($film->status == 0)
                                                        <button onclick="publishFilm(this,{{$film->id}})" class="btn btn-primary p-1" style="font-size: small">Publish</button>
                                                    @else
                                                        <p class="mb-0">
                                                            <b>{{$film->statusLabel}}</b>
                                                        </p>
                                                    @endif
                                                </div>
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

        function deleteFilm(filmId) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var filmMain = $('#film-main-' + filmId);
            $.ajax({
                type: 'DELETE',
                url: '/films/' + filmId,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    if (response.code !== '200') {
                        console.log(response);
                        return;
                    }

                    filmMain.remove();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function publishFilm(button,filmId){
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var publishBtn = $(button);


            $.ajax({
                type: 'patch',
                url: '/films/' + filmId + '/publish',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    if(response.code !== '200'){
                        console.log(response);
                        return;
                    }
                    let wrapper = publishBtn.parent();
                    publishBtn.remove();
                    wrapper.append('<p class="mb-0"><b>'+ response.status_label +'</b></p>')
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    </script>
@endsection
