<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('pagetitle') Trends-up</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-flaty.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/custome.css') }}">

    <script type="text/javascript" src="{{ url('vendor/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/angular-route.v1.2.9.js') }}"></script>
    <script src="{{ url('vendor/angular-paginate-anything/dist/paginate-anything-tpls.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/angular-sanitize.min.js') }}"></script>
    <script src="{{ url('vendor/ng-csv/build/ng-csv.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendor/ui-bootstrap-tpls-1.1.0.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('js/angular/tataApp.js') }}"></script>


</head>
<body>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/shop-homepage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/custom.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
@include('partials.header')
<div class="container">
    @yield('content')
</div>
<script> var base_url = "{{url('/')}}/";</script>
<script type="text/javascript" src="{{ url('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>
