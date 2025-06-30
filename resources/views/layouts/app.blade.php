<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.header')
</head>
<body>
@include('layouts.partials.navbar')
    @yield('content')
    @include('layouts.partials.footer')
</body>
</html>
