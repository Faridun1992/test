@extends('layouts.index')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div style="margin:0px 50px 0px 50px;">

        @if($movies)
            <a href="{{ route('movies.create') }}">Добавить новый фильм</a></div>
    <table class="table table-hover table-striped">
        <thead>
        <tr>

            <th>Название</th>
            <th>Изоброжение</th>
            <th>Жанр</th>
            <th>Добавлено</th>
        </tr>
        </thead>

        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td><a href="{{route('movies.edit', $movie)}}">{{ $movie->title }}</a></td>
                <td><img src="{{asset('pink')}}/images/{{$movie->image ?? "no_image.jpg"}}"
                         class="img-responsive" width="100px" height="150px" alt="{{asset('pink')}}/images/no_image.jpg"></td>
                <td>{{ $movie->genres->implode('title', ', ')}}</td>
                <td>{{ $movie->created_at->format('d/m/Y') }}</td>
                <td>
                    <form action="{{route('movies.destroy', $movie)}}" class="form-horizontal" , method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>
    {{$movies->links('vendor.pagination.bootstrap-4')}}
    @endif


@endsection

