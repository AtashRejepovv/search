@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

    @include('partitions.success')



    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <div class="col-lg-12">
        <h1 class="page-header" align="center" >Baş sahypa</h1>
        <hr class="hr-header">
    </div>
<h1 id="waw" align="center">Hoş geldiňiz!</h1>
<body>
<div class="rp_pp">
    <img src="{{asset('Fon.jpg')}}" alt="Fon" height="700px" width="100%">
</div>
</body>
    <div class="row my-3 mx-1">
        <div class="col-md-12 text-right">
        </div>
    </div>
@endsection
