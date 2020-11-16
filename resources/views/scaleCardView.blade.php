<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <style>

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.5cm;
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
            height: 50px;
        }

        #company {
            float: right;
            text-align: right;
        }

        #right-div {
            float: right;
            text-align: left;
        }

        .general-font {
            font-family: "Times New Roman", Times, serif;
            font-size: 10px;
            letter-spacing: 2px;
            word-spacing: 2px;
            color: #000000;
            font-weight: normal;
            text-decoration: none;
            font-style: normal;
            font-variant: normal;
            text-transform: none;
        }
    </style>
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{url('/img/qrcode.png')}}">&nbsp;<img src="{{url('/img/samo-logo.png')}}"><BR>
        {{--Supported by Sawit Mitra Online (SAMO)--}}
    </div>
    <div id="company">
        {{$data['pks']['company_name']}}
        <br><br>
        <div class="general-font">{{$data['pks']['address']}}, {{$data['pks']['district']['name']}}, {{$data['pks']['city']['name']}}</div>
        <div class="general-font">{{$data['pks']['telephone']}}</div>
    </div>
</header>

<div class="clearfix">
    <div id="logo">
        <table class="general-font">
            <tr>
                <td>Supplier / Mitra Tani</td>
                <td> : </td>
                <td> {{$data['mitra_tani_name']}} </td>
            </tr>
            <tr>
                <td>Komoditi</td>
                <td> : </td>
                <td> {{$data['commodity']}} </td>
            </tr>
            <tr>
                <td>Kendaraan pengangkut</td>
                <td> : </td>
                <td> Truk </td>
            </tr>
            <tr>
                <td>Nama Supir</td>
                <td> : </td>
                <td> {{$data['driver_name']}} </td>
            </tr>
            <tr>
                <td>No SIM</td>
                <td> : </td>
                <td> N/A </td>
            </tr>
            <tr>
                <td>No Polisi Kendaraan</td>
                <td> : </td>
                <td> {{$data['vehicle_number']}} </td>
            </tr>
        </table>
    </div>
    <div id="right-div">
        <table class="general-font">
            <tr>
                <td>Jumlah Janjang</td>
                <td> : </td>
                <td> N/A </td>
            </tr>
            <tr>
                <td>Komidel</td>
                <td> : </td>
                <td> N/A </td>
            </tr>
            <tr>
                <td>Sortasi</td>
                <td> : </td>
                <td> {{$data['sorting_percentage']}} % </td>
            </tr>

        </table>
    </div>
</div>
<hr>
<br>
<center>
<table class="general-font" border="1" style="border-collapse: collapse;">
    <tr style="padding: 7px;">
        <td style="padding: 7px;" >KETERANGAN</td>
        <td style="padding: 7px;" >BERAT TIMBANGAN</td>
    </tr>
    <tr style="padding: 7px;">
        <td style="padding: 7px;">Timbangan Masuk tanggal {{date('Y-m-d H:i:s', $data['weight_in_timestamp'])??'-'}} oleh petugas {{$data['weight_in_by']['email']??'-'}}</td>
        <td style="padding: 7px; text-align: right" > {{$data['weight_in']}} KG</td>
    </tr>
    <tr style="padding: 7px;">
        <td style="padding: 7px; ">Timbangan Keluar tanggal {{date('Y-m-d H:i:s', $data['weight_out_timestamp'])??'-'}} oleh petugas {{$data['weight_out_by']['email']??'-'}}</td>
        <td style="padding: 7px; text-align: right"> {{$data['weight_out']}} KG</td>
    </tr>
    <tr style="padding: 7px;">
        <td style="padding: 7px; text-align: right">BRUTO</td>
        <td style="padding: 7px; text-align: right"> {{$data['netto_pre_sorting']}} KG</td>
    </tr>
    <tr style="padding: 7px;">
        <td style="padding: 7px; text-align: right">POTONGAN</td>
        <td style="padding: 7px; text-align: right"> {{$data['sorting_weight']}} KG</td>
    </tr>
    <tr style="padding: 7px;">
        <td border="0" style="padding: 7px; text-align: right">NETTO</td>
        <td style="padding: 7px; text-align: right"> {{$data['final_netto']}} KG</td>
    </tr>

</table>
</center>
<br>
<div style="float: right; text-align: center;">
    <table>
        <tr>
            <td colspan="2">Telah diserah terimakan dengan baik oleh </td>
        </tr>
        <tr><td colspan="2"><br><br></td></tr>
        <tr>
            <td>Petugas PKS</td>
            <td>Pengangkut</td>
        </tr>
    </table>
</div>

</body>
</html>
