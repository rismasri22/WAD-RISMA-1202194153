<!DOCTYPE html>
<html lang="en">
@include('templates.partials.head')
<body>
    @include('templates.partials.navbar')
    @yield('content')
    @include('templates.partials.footer')
</body>
</html>