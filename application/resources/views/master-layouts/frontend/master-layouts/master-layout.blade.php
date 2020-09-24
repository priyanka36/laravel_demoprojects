<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('master-layouts.frontend.master-layouts.partials.css')
    <title> Sunny Distillery | Welcome </title>
</head>
<body>
<div class="loader">
    <div class="loader-dot">
    </div>
</div>;
@include('master-layouts.frontend.master-layouts.partials.header')

@yield('main-content')

@include('master-layouts.frontend.master-layouts.partials.footer')

@include('master-layouts.frontend.master-layouts.partials.scripts')
</body>
</html>
