@extends('layouts.index')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
    <div style="margin:0px 50px 0px 50px;">

        @if($genres)
            <div class="portfolio">

                <div id="filters" class="sixteen columns">
                    <ul style="padding:0px 0px 0px 0px">
                        @foreach($genres as $genre)
                            <li class="{{request()->is('filter')?'active':''}}"><a href="{{ route('filter', ['genre' => $genre->title]) }}">
                                    <h5>{{$genre->title}}</h5>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
    </div>

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
                <td>{{ $movie->title }}</td>
                <td><img src="{{asset('pink')}}/images/{{$movie->image ?? "no_image.jpg"}}"
                         class="img-responsive" width="100px" height="150px"
                         alt="{{asset('pink')}}/images/no_image.jpg"></td>
                <td>{{ $movie->genres->implode('title', ', ')}}</td>
                <td>{{ $movie->created_at->format('d/m/Y') }}</td>


            </tr>

        @endforeach

        </tbody>
    </table>
    {{$movies->links('vendor.pagination.bootstrap-4')}}
    @endif


@endsection
