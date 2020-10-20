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
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#transaction-modal">Add Transaction</button>
                                </div>
                            </div>
                            <br>
                            <table class="table table-bordered dt-responsive nowrap" id="table-product">
                                <thead>
                                <tr>
                                    <th> Tanggal Transaksi </th>
                                    <th> Mitra Tani / Supplier </th>
                                    <th> Nomor Polisi </th>
                                    <th> Nama Pengemudi </th>
                                    <th> Stage </th>

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

    <div class="modal fade" id="timbangan-masuk-modal">
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
                    <form id="transaction-form" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Janjang</label>
                                <input type="text" class="form-control" name="total_long" placeholder="">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sortasi</label>
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
        $(document).ready(function(){
            var table = $('#table-product').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                //dom: '<"html5buttons">Blfrtip',
                /*language: {
                    buttons: {
                        colvis : 'show / hide', // label button show / hide
                        colvisRestore: "Reset Kolom" //lael untuk reset kolom ke default
                    }
                },*/

                /*buttons : [
                    {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    {extend:'csv'},
                    {extend: 'pdf', title:'Contoh File PDF Datatables'},
                    {extend: 'excel', title: 'Contoh File Excel Datatables'},
                    {extend:'print',title: 'Contoh Print Datatables'},
                ],*/
                ajax: {
                    "url"  : "{{url('fetch-transaction')}}",
                    /*"data" : function (d) {
                        d.filter_periode = $('#filter_periode').val();
                    }*/
                },
                columns: [
                    {"data":"created_at"},
                    {"data":"mitra_tani_name"},
                    {"data":"vehicle_number"},
                    {"data":"driver_name"},

                    {
                        "render": function (data, type, row) {
                            if (row.transaction_stage == 3) {
                                return '<button type="button" class="btn btn-block btn-default btn-xs" onclick="window.open(\'{{url('print-scale-card/')}}\' '+ row.vehicle_type +')">Loading Dock</button>';
                            } else if(row.transaction_stage == 4) {
                                return '<button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#timbangan-masuk-modal">Timbangan Masuk</button>';
                            } else if(row.transaction_stage == 5) {
                                return '<button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal" data-target="#proses-sortir-modal">Proses Sortir</button>';
                            } else if(row.transaction_stage == 6) {
                                return '<button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#timbangan-keluar-modal">Timbangan Keluar</button>';
                            } else if(row.transaction_stage == 7) {
                                return '<button type="button" class="btn btn-block btn-success btn-xs" onclick="window.open(\'{{url('print-scale-card')}}\', \'_blank\')" >Cetak Kartu</button>';
                            }
                            else {
                                return 'Proses';
                            }
                        },
                    }
                ],
                /*columnDefs : [{
                    "defaultContent": "<button>Click!</button>"
                    /!*render : function (data,type,row){
                        return data + ' - ( ' + row['satuan'] + ')';
                    },
                    "targets" : 0*!/
                },

                    /!*{"visible": false, "targets" : 1}*!/
                ],*/

                rowCallback: function(row, data, index) {
                    if (data.transaction_stage == 7) {
                        //$("td:eq(4)", row).css("background-color", "yellow");
                        $(row).css('background-color','#F8EAD8');
                    }
                }

            });

            $.fn.dataTableExt.afnFiltering.push(
                function( oSettings, aData, iDataIndex ) {
                    return aData[filterIndex].indexOf(filterStr)>-1;
                }
            );

            /*
            //filter berdasarkan Nama Product
            $('.filter-name').keyup(function () {
                table.column( $(this).data('column'))
                    .search( $(this).val() )
                    .draw();
            });

            //filter Berdasarkan satuan product
            $('.filter-satuan').change(function () {
                table.column( $(this).data('column'))
                    .search( $(this).val() )
                    .draw();
            });

            //filter Berdasarkan periode
            $('#filter_periode').change(function () {
                table.draw();
            });
*/

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
    </script>
@stop
