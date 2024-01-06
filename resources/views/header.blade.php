<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{$pageTitle ?? 'Web Blog'}} - Web Blog</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    </head>
    <body>
        <span class="acrylic shadow parent" id="toolbar">
            <header>
                <h1><a href="index.php">WebLog</a></h1>
            </header>
            <nav>
                <form method="get" id="site-search">
                    <input type="search" id="site-search-bar">
                    <input type="submit" id="site-search-submit">
                </form>
                <span>
                    <a href="login.php">Login</a>
                    <a href="create.php">Create</a>
                    <a href="/">Home</a>
                    <a href="#">Blogs</a>
                    <a href="#">News</a>
                </span>
            </nav>
        </span>