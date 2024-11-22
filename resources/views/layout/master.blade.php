<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @if (isset($routeType))
            <meta name="route_type" content="{{$routeType}}">
        @endif
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$pageTitle ?? 'Web Blog'}} - Web Blog</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
        <script type="text/javascript" src="{{asset('js/src/script.js')}}"></script>
    </head>
    <body>
        <span class="acrylic shadow parent" id="navbar">
            <header>
                <h1 id="navbar-title"><a href="/">WebLog</a></h1>
            </header>
            <nav>
                <form method="get" id="site-search">
                    <input type="search" id="site-search-bar">
                    <input type="submit" id="site-search-submit">
                </form>
                <span class="toolbar">
                    @if (Auth::check())
                        <a href="{{ route('user.index')}}">Profile</a>
                    @else
                        <a href="{{ route('user.login') }}">Login</a>
                    @endif
                    
                    <a href="{{ route('post.create', 'PostController') }}">Create</a>
                    <a href="/">Home</a>
                    <div class="dropdown">
                        <a>Blogs</a>
                        <div class="dropdown-content acrylic shadow parent">
                            <a href="#">Blog type 1</a>
                            <a href="#">Blog type 2</a>
                            <a href="#">Blog type 3</a>
                            <a href="#">Blog type 4</a>
                            <a href="#">Blog type 5</a>
                            <a href="#">Blog type 6</a>
                            <a href="#">Blog type 7</a>
                            <a href="#">Blog type 8</a>
                            <a href="#">Blog type 9</a>
                            <a href="#">Blog type 10</a>
                            <a href="#">Blog type 11</a>
                            <a href="#">Blog type 12</a>
                        </div>
                    </div>
                    {{-- <a href="{{ route('pages.navigate', ['type'=>'article']) }}">News</a> --}}
                    {{-- <a href="#">News</a> --}}
                </span>
            </nav>
        </span>
        {{-- <section id="content"> --}}

        <section class="parent" id="content">
            @yield('content')
        <footer class="acrylic shadow parent">
            <p>For testing purposes only.</p>
            {{-- <a href="{{ route('pages.navigate', ['type'=>'about']) }}"><p>About</p></a> --}}
            <a href="#"><p>About</p></a>
        </footer>
    </body>
</html>