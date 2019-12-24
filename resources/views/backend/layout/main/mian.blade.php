<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('/photo/logoimage.jpg')}}" rel="icon" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=myanmar3' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/css/admin/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('/css/admin/nav.css')}}">
    <link rel="stylesheet" href="{{asset('/css/admin/admin.css')}}">

    @yield('link')
</head>
{!! Zawuni::includeFiles('config/zawuni.php') !!}
<body>
 @include('backend.layout.nav')
@yield('content')



<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@yield('script')
</body>
</html>



