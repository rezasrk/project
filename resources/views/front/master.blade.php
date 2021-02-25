<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.layouts.header')
</head>

@yield('front-content')

<body>

@include('front.layouts.footer')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('front-script')
</body>

</html>
