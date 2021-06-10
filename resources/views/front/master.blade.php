<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.layouts.header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

@yield('front-content')

<body>

@include('front.layouts.footer')


@yield('front-script')
</body>

</html>
