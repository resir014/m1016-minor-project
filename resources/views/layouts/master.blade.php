<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>

    <body>
        @include('includes.navbar')

        <main>
            @yield('content')
        </main>

        @include('includes.scripts')
    </body>
</html>
