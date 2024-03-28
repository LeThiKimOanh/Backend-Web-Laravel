<!DOCTYPE html>
<html lang="en">
<head>
    @include('users.head')
    @yield('css')
</head>
<body id="main-homepage">
    
    @include('users.nav')

    @include('users.banner')
            
    @yield('content')

    @include('users.banner2')

    @include('users.foot')

    @yield('js')

</body>
</html>