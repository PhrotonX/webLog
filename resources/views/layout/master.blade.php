<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{$pageTitle ?? 'Web Blog'}} - Web Blog</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
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
                    <a href="{{ route('user.login', 'RegisteredUserController') }}">Login</a>
                    <a href="{{ route('post.create', 'PostController') }}">Create</a>
                    <a href="/">Home</a>
                    <div class="dropdown">
                        <a href="#">Blogs</a>
                        <div class="acrylic shadow parent dropdown-content ">
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
                    <a href="#">News</a>
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