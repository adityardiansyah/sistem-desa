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
        <p style="margin: 0;">Jln.</p>
    </div>
    <div style="text-align: center;">
        <h5 style="margin-bottom:0;"><u>SURAT KETERANGAN KELAHIRAN</u></h5>
        <p style="margin-top:0;">Nomor : .../.../.../.../{{ date('Y') }}</p>
    </div>

    <div>
        <table>
            <tr>
                <td colspan="3" style="padding-bottom:16px;">
                    Yang bertanda tangan dibawah ini Kepala Desa Wadungasih, Kecamatan Buduran, Kabupaten Sidoarjo menerangkan dengan sebenarnya, bahwa :
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Dengan ini yang menerangkan bahwa :
                </td>
            </tr>
            <tr>
                <td width="200px">Nama</td>
                <td width="3px">:</td>
                <td>{{ $data->nama_bayi }}</td>
            </tr>
            <tr>
                <td width="200px">Tempat, Tanggal Lahir</td>
                <td width="3px">:</td>
                <td>{{ $data->tempat_lahir_bayi }}, {{ date('d-m-Y', strtotime($data->tgl_lahir_bayi)) }}</td>
            </tr>
            <tr>
                <td width="200px">Jenis Kelamin</td>
                <td width="3px">:</td>
                <td>{{ $data->jk_bayi }}</td>
            </tr>
            <tr>
                <td width="200px">Hari / Jam</td>
                <td width="3px">:</td>
                <td>{{ $data->hari }} / {{ $data->pukul }}</td>
            </tr>
            <tr>
                <td width="200px">Alamat</td>
                <td width="3px">:</td>
                <td>{{ $data->alamat_bayi }}</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top:16px;">
                    Adalah anak dari :
                </td>
            </tr>
            <tr>
                <td width="200px">Nama Ayah Kandung</td>
                <td width="3px">:</td>
                <td>{{ $data->nama_ayah }}</td>
            </tr>
            <tr>
                <td width="200px">Pekerjaan Ayah Kandung</td>
                <td width="3px">:</td>
                <td>{{ $data->pekerjaan_ayah }}</td>
            </tr>
            <tr>
                <td width="200px">Alamat Ayah Kandung</td>
                <td width="3px">:</td>
                <td>{{ $data->alamat_ayah }}</td>
            </tr>
            <tr>
                <td width="200px">Nama Ibu Kandung</td>
                <td width="3px">:</td>
                <td>{{ $data->nama_ibu }}</td>
            </tr>
            <tr>
                <td width="200px">Pekerjaan Ayah Kandung</td>
                <td width="3px">:</td>
                <td>{{ $data->pekerjaan_ibu }}</td>
            </tr>
            <tr>
                <td width="200px">Alamat Ayah Kandung</td>
                <td width="3px">:</td>
                <td>{{ $data->alamat_ibu }}</td>
            </tr>
            <tr>
                <td width="200px">Anak Ke</td>
                <td width="3px">:</td>
                <td>{{ $data->anak_ke }}</td>
            </tr>
            <tr>
                <td colspan="3">
                    <p>
                        Demikian surat keterangan kelahiran ini dibuat, atas perhatian dan kerjasamanya kami, ucapkan terima kasih.
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div style="text-align: center; width:300px; float:right;">
        <p>
            WADUNGASIH, {{ date('d m Y') }} <br>
            KEPALA DESA WADUNGASIH
        </p>


        <div style="margin-top:80px">
            <b><u>{{ $data->nama_kades }}</u></b>
        </div>
    </div>
</body>
</html>