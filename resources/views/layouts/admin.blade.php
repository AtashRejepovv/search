<html>
<head>
    <!-- CSRF Token -->
    <title>Phonebook - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('3.png')}}" />

    <!-- Custom Fonts -->
    <link href="{{ asset('bootstrap/fontawesome5/css/all.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('bootstrap/css/responsive.dataTables.min.css')}}" rel="stylesheet">

    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- myStyle CSS -->
    <link href="{{asset('css/datatables.css')}}" rel="stylesheet">
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}"/>
    <!-- ????? CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <!-- ????? CSS -->

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">

    <link href="{{asset('bootstrap/css/responsive.dataTables.min.css')}}" rel="stylesheet">

    <!-- date js -->
    <link href="{{ asset('css/flatpickr.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('js/flatpickr.js')}}"></script>
    <!-- date js -->

    <script src="{{asset('js/core.js')}}"></script>
    <script src="{{asset('js/amcharts.js')}}"></script>
    <script src="{{asset('js/animated.js')}}"></script>

    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>


</head>
<body>

<div class="d-flex toggled" id="wrapper">

    <!-- Sidebar -->
@include('partitions.sidebar')
<!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <!-- navbar -->
    @include('partitions.navbar')
    <!-- navbar -->
        <br>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

<!-- Bootstrap Core JavaScript
<script>
    addEventListener("keydown", function(event) {
        if (event.keyCode == 17 && event.keyCode == 16){
            $("#wrapper").toggleClass("toggled");
        }

    });

</script>

-->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('js/select2.min.js')}}"></script>
<script src="{{ asset('js/datatables.js')}}"></script>
<script src="{{ asset('js/chart.min.js')}}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js')}}"></script>


<!-- Magnific Popup core JS file -->
<script src="{{ asset('js/jquery.magnific-popup.js')}}"></script>
<!-- Morris Charts JavaScript -->
</body>
</html>