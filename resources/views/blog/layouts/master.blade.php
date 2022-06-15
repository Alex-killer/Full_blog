<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/all.min.css') }}">
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <title>My Blog</title>
</head>
<body>

    <div class="container">

        @include('blog.includes.navbar')
    <div class="py-3">
        @yield('content')
    </div>


    </div>

{{--        @include('blog.includes.footer')--}}

</body>
</html>
