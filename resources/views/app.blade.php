<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning laravel 5</title>
    <!-- Latest compiled and minified CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/css/select2.min.css">
</head>
<body style="padding-top:60px">


    @include('partials.nav')


    <div class="container">
        @include('partials.flash')

        @yield('content')
    </div>


<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-beta.3/js/select2.min.js"></script>
    @yield('footer')

</body>
</html>

