<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.customer_layout.head')
</head>

<body>

    @include('auth.customer_layout.nav')
    @if(url()== route('base'))
    @include('auth.customer_layout.banner')
    @endif
    <div style="margin-top: 200px"> @yield('content')</div>


    @stack('script')
</body>

</html>
