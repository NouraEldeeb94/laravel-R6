<!doctype html>
<html lang="en">
@include('includes.head')

    <body>
    @include('includes.preload')
        <main>

        @include('includes.nav')



          @yield('content')



        @include('includes.footer')

    @include('includes.footerjs')



</body>
</html>
