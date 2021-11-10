<!DOCTYPE html>
<html lang="en">


<body>



<!-- Navigation -->
@if(Request::route()->getName()!='home' && Request::route()->getName()!='login' && Request::route()->getName()!='register')

@include('fixed.navigationforuser')



@else
    @include('fixed.navigation')

@endif



<!-- Page Content -->
@yield('content')

<!-- Footer -->
@include('fixed.footer')

<!-- Bootstrap core JavaScript -->
@include('fixed.scripts')

</body>

</html>
