@extends('layouts.index')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div style="margin:0px 50px 0px 50px;">

        @if($genres)
            <a href="{{ route('genres.create') }}">Добавить новый жанр</a></div>
    <table class="table table-hover table-striped">
        <thead>
        <tr>

            <th>Название</th>
            <th>Создано</th>
        </tr>
        </thead>

        <tbody>
        @foreach($genres as $genre)
            <tr>
                <td><a href="{{route('genres.edit', $genre)}}">{{ $genre->title }}</a></td>
                <td>{{ $genre->created_at->format('d/m/Y') }}</td>
                <td>
                    <form action="{{route('genres.destroy', $genre)}}" class="form-horizontal" , method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>
    {{$genres->links('vendor.pagination.bootstrap-4')}}
    @endif


@endsection
