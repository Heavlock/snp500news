@include('parts.head')

<body>

<div class="container-fluid">
    @include('parts.header')

    @include('parts.nav')
    <main role="main" class="container">
            @yield('content')
    </main>
@include('parts.footer')

<!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
@include('parts.scripts')
</body>
</html>
