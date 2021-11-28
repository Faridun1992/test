<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>{{$title}}</title>
    <link rel="icon" href="{{asset('style')}}/favicon.png" type="image/png">
    <link href="{{asset('style')}}/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{asset('style')}}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{asset('style')}}/css/flexslider.css" rel="stylesheet" type="text/css">


</head>
<body>


<header id="header_wrapper">
    @yield('header')


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</header>
@yield('content')
</body>
</html>
