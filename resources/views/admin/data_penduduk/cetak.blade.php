<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Surat Kematian</title>
</head>
<body onload="window.print()" style="padding:32px">
    <div style="text-align: center; border-bottom:2px solid #000;">
        <H4 style="margin:0;"><b>PEMERINTAH KABUPATEN SIDOARJO</b></H4>
        <H4 style="margin:0;">KECAMATAN BUDURAN</H4>
        <H3 style="margin:0;">DESA WADUNGASIH</H3>
        {{-- <p style="margin: 0;">Jln.</p> --}}
    </div>
    <div style="text-align: center;">
        <h5 style="margin-bottom:0;"><u>DATA PENDUDUK</u></h5>
        {{-- <p style="margin-top:0;">Nomor : .../.../.../.../{{ date('Y') }}</p> --}}
    </div>

    <table class="">
        <thead>
            <tr style="text-align:left;">
                <th width="30px">No</th>
                <th width="150px">NIK</th>
                <th width="150px">Nama</th>
                <th width="60px">Agama</th>
                <th width="100px">Pekerjaan</th>
                <th>TTL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->agama }}</td>
                <td>{{ $item->pekerjaan }}</td>
                <td>{{ $item->tempat_lahir }}, {{ date('d-m-Y', strtotime($item->tgl_lahir)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>