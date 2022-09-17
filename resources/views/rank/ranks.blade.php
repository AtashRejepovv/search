
    <div class="row my-3 mx-1">
        <div class="col-md-12 text-right">
            <a href="{{route('rank.create')}}" class="btn bg-navbar btn-dark float-right"><i class="fa fa-plus-circle"></i> </a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">Ady</th>
            <th scope="col">Operasiýalar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ranks as $rank)
            <tr>
                <td>{{$rank->name}}</td>
                <td><a href="{{route('rank.edit',['rank_id' => $rank->id])}}" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i></a>
                    <a href="{{route('rank.delete',['rank_id' => $rank->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
