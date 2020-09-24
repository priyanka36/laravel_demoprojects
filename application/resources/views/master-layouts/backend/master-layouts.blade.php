<!DOCTYPE html>
<html lang="en">

<head>


    <title>Capital Admin</title>

    @include('master-layouts.backend.partials.top')
    @yield('additional-css')

</head>

<body>

@include('master-layouts.backend.partials.left-side-bar')
@include('master-layouts.backend.partials.top-nav')

        <!-- ########## START: MAIN PANEL ########## -->
@yield('main-content')

        <!-- ########## END: MAIN PANEL ########## -->

@include('master-layouts.backend.partials.script')
@yield('additional-js')

</body>

</html>
