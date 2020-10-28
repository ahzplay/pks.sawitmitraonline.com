@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>TBS ONGOING</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> TRANSACTION </h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            @if(in_array('4',Session::get('role')))
                                <div class="row">
                                    <div class="col-md-6 pull-right">
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#transaction-modal">Add Transaction</button>
                                    </div>
                                </div>
                            @endif

                            <br>
                            <table class="table table-bordered dt-responsive nowrap" id="table">
                                <thead>
                                <tr>
                                    <th>  </th>
                                    <th> ID </th>
                                    <th> Tanggal Transaksi </th>
                                    <th> Mitra Tani / Supplier </th>
                                    <th> Nomor Polisi </th>
                                    <th> Nama Pengemudi </th>
                                    <th> Stage </th>
                                    <th> Weight In </th>
                                    <th> Weight Out </th>
                                    <th> sorting_percentage </th>
                                    <th> sorting_weight </th>
                                    <th> netto_pre_sorting </th>
                                    <th> Action </th>

                                </tr>
                                </thead>
                                <div class="panel-body">
                                    {{--<label for="name"> Filter Berdasarkan Nama Product: </label>
                                    <input type="text" name="name" class="form-control col-sm-4 filter-name" placeholder="Filter Berdasarkan Nama Product">

                                    <label for="filter-satuan"> Filter Berdasarkan Satuan : </label>

                                    <select data-column="1" class="form-control col-sm-4 filter-satuan" placeholder="Filter Berdasarkan Satuan Product">
                                        <option value=""> Pilih Satuan Product </option>
                                        <option value="kg"> KG </option>
                                        <option value="ton"> TON </option>
                                    </select>

                                    <label for="filter-periode"> Filter Berdasarkan Periode : </label>

                                    <select name="filter_periode" id="filter_periode" class="form-control">
                                        <option value=""> Pilih Periode </option>
                                        <option value="7"> 7 Hari Terakhir </option>
                                        <option value="14"> 14 Hari Terakhir </option>
                                        <option value="21"> 21 Hari Terakhir </option>
                                        <option value="31"> 31 Hari Terakhir </option>
                                        <option value="365"> 365 Hari Terakhir </option>
                                    </select>--}}
                                    <tbody>
                                    </tbody>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="transaction-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="transaction-form" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mitra Tani / Supplier</label>
                                <input type="text" class="form-control" name="mitra_tani_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Polisi Kendaraan</label>
                                <input type="text" class="form-control" name="vehicle_number" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Supir</label>
                                <input type="text" class="form-control" name="driver_name" placeholder="">
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="save-transaction-btn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{--<div class="modal fade" id="timbangan-masuk-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="transaction-form" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Berat Timbangan Masuk</label>
                                <input type="text" class="form-control" name="weight_in" placeholder="">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="save-timbangan-masuk-btn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="proses-sortir-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Mitra Tani/Supplier : </label> <label id="mitra-tani-label"></label>
                        </div>
                        <input type="text" class="form-control" id="sortir-transaction-id-textfield" placeholder="">
                    </div>
                    <hr>
                    <form id="transaction-form" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Janjang</label>
                                <input type="text" class="form-control" name="total_long" placeholder="">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1" id="">Sortasi</label>
                                <input type="text" class="form-control" name="sorting_percentage" placeholder="">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">KOMIDEL</label>
                                <input type="text" class="form-control" name="komidel" placeholder="">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="save-proses-sortir-btn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="timbangan-keluar-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="transaction-form" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Berat Timbangan Keluar</label>
                                <input type="text" class="form-control" name="weight_out" placeholder="">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" id="save-timbangan-keluar-btn" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>--}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
        $(document).ready(function(){
            var table = $('#table').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                ajax: {
                    "url"  : "{{url('fetch-transaction')}}",
                    "data" : {
                        //"stageRequest" : 9,
                    }
                },
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": '<strong style="cursor: pointer;">+</strong>'
                    },
                    {"data":"id"},
                    {"data":"created_at"},
                    {"data":"mitra_tani_name"},
                    {"data":"vehicle_number"},
                    {"data":"driver_name"},
                    {"data":"weight_in"},
                    {"data":"weight_out"},
                    {"data":"sorting_percentage"},
                    {"data":"sorting_weight"},
                    {"data":"netto_pre_sorting"},
                    {"data":"final_netto"},

                    {
                        "render": function (data, type, row) {
                            if (row.transaction_stage == 3) {
                                return '<button type="button" class="btn btn-block btn-default btn-xs" onclick="window.open(\'{{url('print-scale-card/')}}\' '+ row.vehicle_type +')">Loading Dock</button>';
                            } else if(row.transaction_stage == 4) {
                                return '<button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#timbangan-masuk-modal">Timbangan Masuk</button>';
                            } else if(row.transaction_stage == 5) {
                                return '<button type="button" class="btn btn-block btn-danger btn-xs" onclick="addSortir('+row.id+',\''+row.mitra_tani_name+'\')">Proses Sortir</button>';
                            } else if(row.transaction_stage == 6) {
                                return '<button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#timbangan-keluar-modal">Timbangan Keluar</button>';
                            } else if(row.transaction_stage == 7) {
                                return '<button type="button" class="btn btn-block btn-success btn-xs" onclick="window.open(\'{{url('print-scale-card')}}/'+row.id+' \', \'_blank\')" >Cetak Kartu</button>';
                            }
                            else {
                                return 'Proses';
                            }
                        },
                    }
                ],

                "columnDefs": [
                    {
                        "targets": 5,
                        "visible": false,
                        "orderable": false
                    },
                    {
                        "targets": 6,
                        "visible": false,
                        "orderable": false
                    },
                    {
                        "targets": 7,
                        "visible": false,
                        "orderable": false
                    },
                    {
                        "targets": 8,
                        "visible": false,
                        "orderable": false
                    },
                    {
                        "targets": 9,
                        "visible": false,
                        "orderable": false
                    },
                    {
                        "targets": 10,
                        "visible": false,
                        "orderable": false
                    },
                    {
                        "targets": 11,
                        "visible": false,
                        "orderable": false
                    },
                ],

                rowCallback: function(row, data, index) {
                    if (data.transaction_stage == 7) {
                        //$("td:eq(4)", row).css("background-color", "yellow");
                        $(row).css('background-color','#F8EAD8');
                    }
                }

            });

            $('#table tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );

            function format ( d ) {
                return '<h5></h5>' +
                    '<div class="row">' +
                    '<div class="col-md-4">' +
                    '<table style="border: 0px;">' +
                    '<tbody>' +

                    '<tr style="border: 0px;">' +
                    '<td style="border: 0px;"> <strong>Timbangan masuk</strong> </td>' +
                    '<td style="border: 0px;"> : </td> ' +
                    '<td style="border: 0px;">' + d.weight_in +'</td>' +

                    '<td style="border: 0px;"> <strong>Timbangan Keluar</strong> </td>' +
                    '<td style="border: 0px;"> : </td> ' +
                    '<td style="border: 0px;">' + d.weight_out +'</td>' +
                    '<td style="border: 0px;"> <strong>Sortasi</strong> </td>' +
                    '<td style="border: 0px;"> : </td> ' +
                    '<td style="border: 0px;">' + d.sorting_percentage +' %</td>' +
                    '</tr>' +


                    '<tr style="border: 0px;">' +
                    '<td style="border: 0px;"> <strong>Bruto</strong> </td>' +
                    '<td style="border: 0px;"> : </td> ' +
                    '<td style="border: 0px;">' + d.netto_pre_sorting +'</td>' +
                    '<td style="border: 0px;"> <strong>Potongan</strong> </td>' +
                    '<td style="border: 0px;"> : </td> ' +
                    '<td style="border: 0px;">' + d.sorting_weight +'</td>' +
                    '<td style="border: 0px;"> <strong>Netto</strong> </td>' +
                    '<td style="border: 0px;"> : </td> ' +
                    '<td style="border: 0px;"><strong>' + d.final_netto +'</strong></td>' +
                    '</tr>' +


                    '</tbody>' +
                    '</table>' +
                    '</div>' +
                    '</div>'
            }

            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#save-transaction-btn').click(function (e) {
                    e.preventDefault();
                    $(this).html('Sending..');

                    $.ajax({
                        data: $('#transaction-form').serialize(),
                        url: "{{url('create-transaction')}}",
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $('#ransaction-form').trigger("reset");
                            //$("#Table_id").ajax.reload();
                            table.draw();
                            $('#transaction-modal').modal('hide');

                        },
                        error: function (data) {
                            console.log('Error:', data);
                            $('#save-transaction-btn').html('Save Changes');
                        }
                    });
                });

            });
        });

        /*setInterval(function () {
            table.draw();
        },10000);*/

    </script>
@stop
