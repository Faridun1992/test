@extends('layouts.index')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">
        <div class="row">
            @if($movie->image)
                <p>Постер:</p>
                <div class="col-lg-offset-0">
                <form action="{{route('deleteImage', $movie->id)}}"
                      method="post">
                    <button class="btn text-danger">x</button>
                    @csrf
                    @method('patch')
                </form>
                <img src="{{asset('pink')}}/images/{{$movie->image}}"
                     class="img-responsive" width="100px" height="100px" alt="">
            </div>
                @endif
        </div>

        <div class="row">
            <div class="col-lg-offset-0">
                <form action="{{ route('movies.update', $movie) }}" class="form-horizontal" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label class="col-xs-2 control-label">Название:</label>
                        <div class="col-xs-8">
                            <input type="text" name="title" value="{{$movie->title}}" class="form-control"
                                   placeholder="введите имя">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">Постер:</label>
                        <div class="col-xs-8">
                            <input type="file" name="image">
                        </div>


                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 control-label">Жанр:</label>

                        <div class="col-xs-8">

                            @foreach ($genres as $genre)

                                @if($movie->genres->contains($genre))
                                    <input checked name="genres[]" type="checkbox" value="{{ $genre->id }}">
                                @else
                                    <input name="genres[]" type="checkbox" value="{{ $genre->id }}">
                                @endif


                                {{ $genre->title }}
                            @endforeach

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-xs-offset-2 col-xs-10">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
