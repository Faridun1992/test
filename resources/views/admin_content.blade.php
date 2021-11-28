@extends('layouts.index')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div style="margin:0px 50px 0px 50px;">

        @if($movies)
            <table class="table table-hover table-striped">
                <thead>
                <tr>

                    <th>Название</th>
                    <th>Изоброжение</th>
                    <th>Жанр</th>
                    <th>Статус публикации</th>
                    <th>Добавлено</th>
                </tr>
                </thead>

                <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td><img src="{{asset('pink')}}/images/{{$movie->image ?? "no_image.jpg"}}"
                                 class="img-responsive" width="100px" height="150px"
                                 alt="{{asset('pink')}}/images/no_image.jpg"></td>
                        <td>{{ $movie->genres->implode('title', ', ')}}</td>
                        <td>{{($movie->status == false) ? 'не опубликован' : 'опубликован'}}</td>
                        <td>{{ $movie->created_at->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{route('admin.movies.update', $movie)}}" class="form-horizontal" , method="POST">
                                @csrf
                                @method('patch')
                                @if($movie->status == false)
                                    <button class='btn btn-success' type='submit'>Показать</button>
                                @else
                                    <button class='btn btn-danger' type='submit'>Не показать</button>
                                @endif

                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>
    {{$movies->links('vendor.pagination.bootstrap-4')}}
    @endif


@endsection

