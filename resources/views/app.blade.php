<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            background: url('eye.jpg');
            background-size: 1440px 800px;
        }

        .top-space {
            margin-top:     15px;
        }

        tr.rowhighlight {
            background-color: #f0f8ff;
        }

    </style>
</head>
<body>

<div class="container">

    @include('partials.nav')

    @include('partials.message')

    @include('partials.errors')

    @yield('content')

</div>

</body>
</html>