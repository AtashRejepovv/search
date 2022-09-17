@extends('layouts.admin')
@section('title', 'Ulanyjylar')
@section('content')

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}"/>

    <div class="col-lg-12">
        <a class="float-left mt-2 mr-1" href="{{route('users')}}"><i class="fa fa-arrow-alt-circle-left fa-2x text-info"></i></a>
        <h1 class="page-header"> Ulanyjy üýtgetmek</h1>
        <hr class="hr-header">
    </div>

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-5 offset-md-3">
                <form autocomplete="off" role="form" action="{{route('user.update',['user_id' => $user->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{--<hr class="colorgraph">--}}
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}" class="form-control input-lg" placeholder="Familiýasy" tabindex="1">
                    </div>
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}" class="form-control input-lg" placeholder="Ady" tabindex="1">
                    </div>
                    <div class="form-group">
                        <input type="text" name="login" id="login" value="{{$user->login}}" class="form-control input-lg" placeholder="Ulanyjy ady" tabindex="1">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Açar sözi" tabindex="1">
                    </div>
                    <div class="form-group ">
                        <label for="role_id">
                            Role:&nbsp;&nbsp;
                            <select  class="js-example-theme-single form-control" name="role_id">
                                @foreach($roles as $role)
                                    <option {{$role->id==$user->role->id?'selected':''}} value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="custom-control form-control-lg custom-checkbox">
                        <input type="checkbox" class="custom-control-input"  id="customCheck1" name="status">
                        <label class="custom-control-label" for="customCheck1"> &nbsp;Status</label>
                    </div>
                    <br>
                    <hr class="colorgraph">
                    <input type="submit"  class="btn btn-success float-lg-right" value="Goş"/>
                </form>
                </div>
            </div>
        </div>


    <script src="{{ asset('js/jquery.min.js')}}"> </script>
    <script src="{{ asset('js/bootstrap-select.min.js')}}"> </script>

    <script>
        $(document).ready(function() {
            $(".js-example-theme-single").select2({
                theme: "classic",
                "language": {
                    "noResults": function(){
                        return "Gözlege görä hiç zat tapylmady";
                    }
                }
            });
        });
    </script>
@endsection