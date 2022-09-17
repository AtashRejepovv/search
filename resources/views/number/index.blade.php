@extends('layouts.admin')
@section('title', 'Telefon belgiler')
@section('content')

    @include('partitions.success')

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <div class="col-lg-12">
        <h1 class="page-header"> Telefon belgiler</h1>
        <hr class="hr-header">
    </div>
    @can('admin')
        <div class="row text-right ml-0 mb-3">
            <div id="numbers_filter" class="col-md-11">
                <input type="text" id="search" class="form-control" placeholder="Search..." name="role_id"/>
            </div>

            <div class="col-md-1">
                <a href="{{route('number.create')}}" class="btn bg-navbar btn-dark float-right"><i class="fa fa-plus-circle fa-lg"></i></a>
            </div>
        </div>
    @else
        <div class="row text-right mr-1 ml-1 mb-3">
            <div id="numbers_filter" class="col-md-12">
                <input type="text" id="search" class="form-control" placeholder="Search..." name="role_id"/>
            </div>
        </div>
    @endcan

    <table id="numbers" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead class="text-center">
        <tr>
            <th scope="col">№</th>
            <th scope="col">F.A.A</th>
            <th scope="col">Tel. görnüşi</th>
            <th scope="col">Telefon</th>
            <th scope="col">Wezipesi</th>
            <th scope="col">Harby ady</th>
            <th scope="col">Kafedra</th>
            <th scope="col" style="width:5%;">Batalýon</th>
            <th scope="col">Rota</th>
            <th scope="col">Gulluk</th>
            @can('admin')
                <th scope="col">Sazlamalar</th>
            @endcan

        </tr>
        </thead>
        <tbody class="text-center">

        </tbody>
        <tfoot class="text-center">
        <tr>
            <td>

            </td>

            <td>
                <div class="input-group">
                    <input type="text" style="width: 45%" class="form-control"   id="last_name"/>
                    <input type="text" style="width: 45%" class="form-control"  id="first_name"/>
                </div>
            </td>
            <td style="width:10%;">
                <select name="phone_type" class="form-control" id="phone_type" type="text">
                    <option value=""></option>
                    @foreach($phone_types as $phone_type)
                        <option value="{{$phone_type->name}}">{{$phone_type->name}} </option>
                    @endforeach
                </select>
            </td>
            <th scope="col">
                <div class="input-group">
                    <input type="text" style="width: 45%" class="form-control" id="phone"/>
                </div>
            </th>
            <th scope="col">
                <input type="text" style="width: 100%" class="form-control" id="position"/>
            </th>
            <th scope="col">
                <input type="text" style="width: 100%" class="form-control" id="rank"/>
            </th>
            <td style="width:10%;">
                <select name="kathedra" class="form-control" id="kathedra" type="text">
                    <option value=""></option>
                    @foreach($kathedras as $kathedra)
                        <option value="{{$kathedra->name}}">{{$kathedra->name}} </option>
                    @endforeach
                </select>
            </td>
            <td style="width:5%;" >
                <input type="text" style="width:80%;" class="form-control ml-2" id="batalion"/>
            </td>
            <th scope="col" style="width:5%;">
                <input type="text" style="width: 80%" class="form-control" id="rota"/>
            </th>
            <th scope="col">
                <input type="text" style="width: 100%" class="form-control" id="service"/>
            </th>
            @can('admin')
                <th scope="col">Sazlamalar</th>
            @endcan
        </tr>
        </tfoot>
    </table>
 <script>

        $(document).ready(function() {
            var dataTable = $('#numbers').DataTable({
                "processing":true,
                "serverSide":true,
                "pageLength": 10,
                "info": 10,
                "bFilter": false,
                "ajax":{
                    "url":"<?= route('number.api') ?>",
                    "dataType":"json",
                    "type":"POST",
                    "data":function (d) {
                        d._token = "<?= csrf_token() ?>";
                        d.first_name = $('#first_name').val();
                        d.last_name = $('#last_name').val();
                        d.phone = $('#phone').val();
                        d.phone_type = $('#phone_type').val();
                        d.rank = $('#rank').val();
                        d.position = $('#position').val();
                        d.kathedra = $('#kathedra').val();
                        d.service = $('#service').val();
                        d.batalion = $('#batalion').val();
                        d.rota = $('#rota').val();
                        d.search = $('#search').val();
                    },
                },
                columnDefs: [{
                    targets: "_all",
                    orderable: true
                }],
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    var info = $(this).DataTable().page.info();
                    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1 + ".");
                    return nRow;
                },
                "columns":[
                    {"data":"full_name" },
                    {"data":"full_name" },
                    {"data":"phone_type"},
                    {"data":"phone"},
                    {"data":"position"},
                    {"data":"rank"},
                    {"data":"kathedra"},
                    {"data":"batalion","align":"center"},
                    {"data":"rota"},
                    {"data":"service"},
                        @can('admin')
                            {"data":"operations","orderable": false},
                        @endcan
                ],
                order: [[1, 'asc']],
                mark: false,
                filter: true,
                fixedColumns: false,
                show: false,
                language: {
                    emptyTable:       "Telefon belgi tapylmady",
                    info:             "_START_ - _END_ aralygy görkezilýär | Jemi _TOTAL_",
                    infoEmpty:        "0 belgi görkezilýär",
                    infoFiltered:     "(_MAX_ maglumatdan gözleg esasynda)",
                    infoPostFix:      "",
                    lengthMenu:       "Görkez _MENU_ ",
                    loadingRecords:   "Ýüklenýär...",
                    processing:       "Dowam edýär...",
                         search:           "Gözleg",
                    zeroRecords:      "Gözlegiňize göra belgi tapylmady :(",
                    paginate: {
                        first:        "Ilkinji",
                        previous:     "Öňki",
                        next:         "Indiki",
                        last:         "Soňky"
                    }
                },
            });
            //send search filed value
            $('#first_name,#last_name,#search,#batalion,#rota,#service,#phone_type,#phone,#rank,#position,#kathedra').on(
                'keyup change', function () {
                    setTimeout(function() {
                        //draw('page') redraws your DataTable and preserves the page where it was
                        dataTable.draw();
                    },400);
                });
            $('#numbers_length').hide();
            //send search filed value
        });
    </script>
@endsection