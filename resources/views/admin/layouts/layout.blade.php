<!DOCTYPE html>
<html lang="en">

    <head>
        @include('admin.partials.header')
    </head>

    <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
        <div class="app-wrapper">

            @include('admin.partials.navbar')

            <!-- Main Sidebar Container -->
            @include('admin.partials.sidebar')
            @yield('content')
            @include('admin.partials.footer')

    </body>

</html>
