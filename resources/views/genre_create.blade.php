@extends('layouts.index')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">
        <form action="{{route('genres.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="col-xs-2 control-label">Название:</label>
                <div class="col-xs-8">
                    <input type="text" name="title" value="" class="form-control" placeholder="введите название фильма">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-10">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>

        </form>
    </div>



@endsection
