<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/public/css/app.css') }}">
    <title>{{ $title ?? '' }}</title>
</head>
    <body class="background-color">
        {{ $homepage ?? '' }}
        {{ $news ?? '' }}
    </body>
</html>