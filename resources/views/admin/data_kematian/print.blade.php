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
        <h5 style="margin-bottom:0;"><u>SURAT KETERANGAN KEMATIAN</u></h5>
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
                <td width="200px">Nama</td>
                <td width="3px">:</td>
                <td>{{ $data->nama }}</td>
            </tr>
            {{-- <tr>
                <td width="200px">Bin / Binti</td>
                <td width="3px">:</td>
                <td>{{ $data->nama_ortua }}</td>
            </tr> --}}
            <tr>
                <td width="200px">NIK</td>
                <td width="3px">:</td>
                <td>{{ $data->nik }}</td>
            </tr>
            <tr>
                <td width="200px">Jenis Kelamin</td>
                <td width="3px">:</td>
                <td>{{ $data->jk }}</td>
            </tr>
            <tr>
                <td width="200px">Tempat, Tanggal Lahir</td>
                <td width="3px">:</td>
                <td>{{ $data->tempat_lahir }}, {{ date('d-m-Y', strtotime($data->tgl_lahir)) }}</td>
            </tr>
            <tr>
                <td width="200px">Warganegara / Agama</td>
                <td width="3px">:</td>
                <td>{{ $data->kewarganegaraan }}</td>
            </tr>
            <tr>
                <td width="200px">Status Pernikahan</td>
                <td width="3px">:</td>
                <td>{{ $data->status_perkawinan }}</td>
            </tr>
            <tr>
                <td width="200px">Pekerjaan</td>
                <td width="3px">:</td>
                <td>{{ $data->pekerjaan }}</td>
            </tr>
            <tr>
                <td width="200px">Alamat</td>
                <td width="3px">:</td>
                <td>{{ $data->alamat }}</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top:16px;">
                    Telah meninggal dunia pada :
                </td>
            </tr>
            <tr>
                <td width="200px">Tanggal</td>
                <td width="3px">:</td>
                <td>{{ date('d-m-Y', strtotime($data->tgl_wafat)) }}</td>
            </tr>
            <tr>
                <td width="200px">Jam</td>
                <td width="3px">:</td>
                <td>{{ $data->pukul }}</td>
            </tr>
            <tr>
                <td width="200px">Tempat Meninggal</td>
                <td width="3px">:</td>
                <td>{{ $data->tempat_wafat }}</td>
            </tr>
            <tr>
                <td width="200px">Sebab Kematian</td>
                <td width="3px">:</td>
                <td>{{ $data->sebab_wafat }}</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top:16px;">
                    Berdasarkan surat pernyataan dari :
                </td>
            </tr>
            <tr>
                <td width="200px">Nama</td>
                <td width="3px">:</td>
                <td>{{ $data->nama_pengurus }}</td>
            </tr>
            <tr>
                <td width="200px">NIK</td>
                <td width="3px">:</td>
                <td>{{ $data->nik_pengurus }}</td>
            </tr>
            <tr>
                <td width="200px">Tempat / Tanggal Lahir</td>
                <td width="3px">:</td>
                <td>{{ $data->tempat_lahir_pengurus }}, {{ date('d-m-Y', strtotime($data->tgl_lahir_pengurus)) }}</td>
            </tr>
            <tr>
                <td width="200px">Pekerjaan</td>
                <td width="3px">:</td>
                <td>{{ $data->pekerjaan_pengurus }}</td>
            </tr>
            <tr>
                <td width="200px">Alamat</td>
                <td width="3px">:</td>
                <td>{{ $data->alamat_pengurus }}</td>
            </tr>
            <tr>
                <td colspan="3">
                    <p>
                        Surat keterangan ini dibuat untuk Keamanan. <br>
                        Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami, ucapkan terima kasih.
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