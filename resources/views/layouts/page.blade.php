<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>

    <body>
        @include('includes.navbar')

        <div class="container">
            <main>
                @yield('content')
            </main>
        </div>

        @include('includes.scripts')
    </body>
</html>
