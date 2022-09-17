@extends('layouts.admin')
@section('title', 'Number')
@section('content')

    <div class="col-lg-12">
        <h1 class="page-header"> Täze belgi goşmak</h1>
        <hr class="hr-header">
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-5 offset-md-3">
            <form autocomplete="off" role="form" action="{{route('number.store')}}" method="POST">
                {{ csrf_field() }}
                {{--<hr class="colorgraph">--}}
                <div class="form-group">
                    <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Familiýasy" tabindex="1">
                </div>
                <div class="form-group">
                    <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Ady" tabindex="1">
                </div>
                <div class="form-group">
                    <input type="text" name="father_name" id="father_name" class="form-control input-lg" placeholder="Atasynyň ady" tabindex="1">
                </div>
                <div class="form-group">
                    <input type="text" name="phone" id="phone" class="form-control input-lg" placeholder="Telefon" tabindex="1">
                </div>

                <div class="form-group ">
                    <label for="phone_type">
                        Görnüşi:&nbsp;&nbsp;
                        <select  class="js-example-theme-single form-control" name="phone_type">
                            @foreach($phone_types as $phone_type)
                                <option value="{{$phone_type->id}}">{{$phone_type->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="form-group ">
                    <label for="kathedra">
                        Kafedrasy:&nbsp;&nbsp;
                        <select  class="js-example-theme-single form-control" name="kathedra">
                            <option value="{{NULL}}">Ýok</option>
                            @foreach($kathedras as $kathedra)
                                <option value="{{$kathedra->id}}">{{$kathedra->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="form-group ">
                    <label for="batalion">
                        Batalion:&nbsp;&nbsp;
                        <select  class="js-example-theme-single form-control" name="batalion">
                            <option value="{{NULL}}">Ýok</option>
                            @foreach($batalions as $batalion)
                                <option value="{{$batalion->id}}">{{$batalion->number}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="form-group ">
                    <label for="rota">
                        Rota:&nbsp;&nbsp;
                        <select  class="js-example-theme-single form-control" name="rota">
                            <option value="{{NULL}}">Ýok</option>
                            @foreach($rotas as $rota)
                                <option value="{{$rota->id}}">{{$rota->number}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="form-group ">
                    <label for="platoon_id">
                        Wzwod:&nbsp;&nbsp;
                        <select  class="js-example-theme-single form-control" name="platoon_id">
                            <option value="{{NULL}}">Ýok</option>
                            @foreach($platoons as $platoon)
                                <option value="{{$platoon->id}}">{{$platoon->number}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="form-group ">
                    <label for="service">
                        Gulluk:&nbsp;&nbsp;
                        <select  class="js-example-theme-single form-control" name="service">
                            <option value="{{NULL}}">Ýok</option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="form-group ">
                    <label for="position">
                        Wezipesi:&nbsp;&nbsp;
                        <select  class="js-example-theme-single form-control" name="position">
                            <option value="{{NULL}}">Ýok</option>
                            @foreach($positions as $position)
                                <option value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="form-group ">
                    <label for="rank">
                        Harby çini:&nbsp;&nbsp;
                        <select  class="js-example-theme-single form-control" name="rank">
                            <option value="{{NULL}}">Ýok</option>
                            @foreach($ranks as $rank)
                                <option value="{{$rank->id}}">{{$rank->name}}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <br>
                <hr class="colorgraph">
                <input type="submit"  class="btn btn-success float-lg-right" value="Goş"/>
            </form>
        </div>
    </div>
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
    <script src="{{ asset('js/jquery.min.js')}}"> </script>
@endsection