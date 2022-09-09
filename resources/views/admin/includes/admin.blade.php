<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config('app.name'))</title>
    <meta name="robots" content="noindex,nofollow" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ url('/images/favicon.png') }}" />

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ url('admin/vendors/bundle.css') }}" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/app.css') }}" type="text/css">

</head>

<body class="form-membership" style="background: url({{ url('admin/assets/media/image/image1.jpg')}})">


@yield('content')

<!-- Plugin scripts -->
<script src="{{ url('admin/vendors/bundle.js') }}"></script>

<!-- App scripts -->
<script src="{{ url('admin/assets/js/app.js') }}"></script>

@yield('scripts')

</body>
</html>
