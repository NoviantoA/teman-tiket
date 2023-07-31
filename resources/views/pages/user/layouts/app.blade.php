<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages.user.layouts.head')
</head>

<body>
    @yield('navbar')

    @yield('content')

    @include('pages.user.layouts.footer')
    @include('pages.user.layouts.script')
</body>

</html>
