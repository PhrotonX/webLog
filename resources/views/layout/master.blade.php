<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        {{-- <title>{{$pageTitle ?? 'Web Blog'}} - Web Blog</title> --}}
        <title>
            @yield('title') - {{ config('app.name', 'WebLog') }}
        </title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    </head>
    <body>
        <span class="acrylic shadow parent" id="toolbar">
            <header>
                <h1><a href="/">WebLog</a></h1>
            </header>
            <nav>
                <form method="get" id="site-search">
                    <input type="search" id="site-search-bar">
                    <input type="submit" id="site-search-submit">
                </form>
                <span>
                    <a href="{{ route('pages.navigate', ['type'=>'login']) }}">Login</a>
                    <a href="{{ route('pages.navigate', ['type'=>'create']) }}">Create</a>
                    <a href="/">Home</a>
                    <a href="#">Blogs</a>
                    <a href="{{ route('pages.navigate', ['type'=>'article']) }}">News</a>
                </span>
            </nav>
        </span>

        <section class="parent" id="content">
            @yield('content')
        </section>

        <footer class="acrylic shadow parent">
            <p>For testing purposes only.</p>
            <a href="{{ route('pages.navigate', ['type'=>'about']) }}"><p>About</p></a>
        </footer>
    </body>
</html>