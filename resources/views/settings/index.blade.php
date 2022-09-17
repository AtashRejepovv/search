@extends('layouts.admin')
@section('title', 'Ulanyjylar')
@section('content')

    @include('partitions.success')

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <div class="col-lg-12">
        <h1 class="page-header"> Sazlamalar</h1>
        <hr class="hr-header">
    </div>

    <div class="row my-3 mx-1">
        <div class="col-md-12 text-right">
        </div>
    </div>

@endsection