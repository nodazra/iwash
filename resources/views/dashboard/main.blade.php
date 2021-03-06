<!DOCTYPE html>
<html>
<head>
    @include('dashboard.components.header.head')
</head>
<body>
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <!-- header.html -->
    @include('dashboard.components.header.header')
    <!-- main.html -->
    <main>
        @yield('content')
    </main>
    <!-- footer.html -->
    @include('dashboard.components.footer.footer')
</body>
</html>