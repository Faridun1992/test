@extends('layouts.index')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">

        <div class="row">
            <div>
                <form action="{{ route('genres.update', $genre) }}" class="form-horizontal" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label class="col-xs-2 control-label">Название жанра:</label>
                        <div class="col-xs-8">
                            <input type="text" name="title" value="{{$genre->title}}" class="form-control"
                                   placeholder="введите имя">
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
