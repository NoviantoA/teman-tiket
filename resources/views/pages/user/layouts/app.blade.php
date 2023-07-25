<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages.user.layouts.head')
</head>

<body>
    @yield('navbar')
    @yield('content')
    @includeIf('pages.user.layouts.footer')
    @includeIf('pages.user.layouts.script')
</body>

</html>
