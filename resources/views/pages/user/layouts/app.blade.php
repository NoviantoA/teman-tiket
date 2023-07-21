<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages.user.layouts.head')
</head>

<body>
    @includeIf('pages.user.layouts.navbar')
    @stack('breadcrumb')
    @yield('content')
    @includeIf('pages.user.layouts.footer')
    @includeIf('pages.user.layouts.script')
</body>

</html>
