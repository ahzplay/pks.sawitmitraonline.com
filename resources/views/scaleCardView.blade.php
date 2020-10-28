<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #2B2B2B;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 5px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3{
            color: #323232;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #323232;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {
            text-align: left;
        }

        table .total {
            background: #323232;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #323232;
            font-size: 1.4em;
            border-top: 1px solid #323232;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks{
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{url('/img/qrcode.png')}}">&nbsp;<img src="{{url('/img/samo-logo.png')}}"><BR>
        Supported by Sawit Mitra Online (SAMO)
    </div>
    <div id="company">
        <h2 class="name">{{$data['pks']['company_name']}}</h2>
        <div>{{$data['pks']['address']}}, {{$data['pks']['district']['name']}}, {{$data['pks']['city']['name']}}</div>
        <div>{{$data['pks']['telephone']}}</div>
    </div>
    </div>
</header>
<main>
    <div id="details" class="clearfix">
        <div id="client">
            <div class="to">Sumber / Mitra Tani : {{$data['mitra_tani_name']}}</div>
            <div class="to">Komoditi : {{$data['commodity']}}</div>
            <div class="to">Kendaraan Pengangkut : Truk</div>
            <div class="to">Nama Supir : {{$data['driver_name']}}</div>
            <div class="to">Nomor SIM : N/A</div>
            <div class="to">Nomor Polisi : {{$data['vehicle_number']}}</div>
        </div>
        <div id="invoice">
            <h1>KARTU TIMBANGAN</h1>
            <div class="to">Nomor Kartu : samo-pks-{{$data['id']}}</div>
            <div class="date">Tanggal : {{date('d M Y', strtotime($data['created_at']))}}</div>
        </div>
    </div>


{{--
    <h2>Kriteria Sortasi</h2>
    <table border="0" cellspacing="0" cellpadding="0" style="width: 100%">
        <tr>
            <td class="desc"><h3>Buah Mentah</h3></td>
            <td class="total">0 KG</td>
            <td class="desc"><h3>Buah Busuk</h3></td>
            <td class="total">0 KG</td>
            <td class="desc"><h3>Buah Kecil</h3></td>
            <td class="total">0 KG</td>
            <td class="desc"><strong><h3>TOTAL</h3></strong></td>
            <td class="total"><strong>0 KG</strong></td>
        </tr>
        <tr>
            <td class="desc"><h3>Buah Basah</h3></td>
            <td class="total">0 KG</td>
            <td class="desc"><h3>Sampah</h3></td>
            <td class="total">0 KG</td>
            <td class="desc"><h3>Tangkai Panjang</h3></td>
            <td class="total">0 KG</td>
        </tr>
    </table>
    --}}


    <hr>
    <h2>Spesifikasi</h2>
    <h3>Jumlah Janjang : - | KOMIDEL : - | SORTASI : {{$data['sorting_percentage']}} %</h3>
    <hr>
    <h2>Berat Timbangan dan <Potongan></Potongan></h2>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th class="desc" colspan="2"><strong>DESKRIPSI</strong></th>
            <th class="qty"></th>
            <th class="qty"></th>
            <th class="total" style="text-align: right;"><center><strong>TOTAL</strong></center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="desc" colspan="4"><h3>Timbangan Masuk</h3>Dilakukan tanggal <strong>{{date('Y-m-d H:i:s', $data['weight_in_timestamp'])??'-'}}</strong> oleh petugas <strong>{{$data['weight_in_by']['email']??'-'}}</strong></td>
            <td class="total">Berat : <strong>{{$data['weight_in']??'-'}} KG</strong></td>
        </tr>
        <tr>
            <td class="desc" colspan="4"><h3>Timbangan Keluar</h3>Dilakukan tanggal <strong>{{date('Y-m-d H:i:s', $data['weight_out_timestamp'])??'-'}}</strong> oleh petugas <strong>{{$data['weight_out_by']['email']??'-'}}</strong></td>
            <td class="total">Berat : <strong>{{$data['weight_out']??'-'}} KG</strong></td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">BRUTO</td>
            <td>{{$data['netto_pre_sorting']}} KG</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">POTONGAN</td>
            <td>{{$data['sorting_weight']}} KG</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">NETTO</td>
            <td>{{$data['final_netto']}} KG</td>
        </tr>
        </tfoot>
    </table>
    <hr>
    <table border="0" cellspacing="0" cellpadding="0" style="width: 30%">
        Telah diserah terimakan dengan baik kepada :
        <br><br><br><br><br><br> Petugas PKS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Pengangkut
    </table>

</main>
</body>
</html>
