<div class="container portfolio_title">

    <!-- Title -->
    <div class="section-title">
        <h2>{{$title}}</h2>
    </div>
    <!--/Title -->

</div>
<!-- Container -->


<div class="portfolio">

    <div id="filters" class="sixteen columns">
        <ul style="padding:0px 0px 0px 0px">
            <li class="{{request()->is( route('filter'))?'active':''}}"><a href="{{ route('filter') }}">
                    <h5>Фильтр</h5>
                </a>
            </li>

            <li class="{{request()->is(route('movies.index'))?'active':''}}">
                <a href="{{ route('movies.index') }}">
                    <h5>Фильмы</h5>
                </a>
            </li>

            <li class="{{request()->is(route('genres.index'))?'active':''}}">
                <a href="{{ route('genres.index') }}">
                    <h5>Жанры</h5>
                </a>
            </li>

            <li class="{{request()->is(route('admin.movies'))?'active':''}}">
                <a href="{{route('admin.movies')}}">
                    <h5>Управление</h5>
                </a>
            </li>
        </ul>
    </div>

</div>
