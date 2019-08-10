<html>
<head>
    <meta charset="utf-8">
    <title>Koperasi Jnana Partha</title>
    <style type="text/css">
        .container {
            position: relative;
        }

        .SMA {
            font-size: 18px;
            font-family: "Calibri", serif;
        }

        .koperasi {
            font-size: 25px;
            font-family: "Britannic Bold";
        }

        .alamat {
            font-size: 12px;
            font-family: "Calibri", serif;
        }

        #table_absen {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .th_ku{
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 12px;
        }

        .td_ku{
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 12px;
        }

        #kalimat {
            letter-spacing: 1px;
        }

        .text_center{
            text-align: center;
        }
    </style>

</head>
<body>
<div class="container" style="text-align: center">
    <table width="100%">
        <tr>
            <td align="center"><img src="assets/production/images/logo-koperasi-baru-png.png" height="100px" style="margin-bottom: -10px;"></td>
            <td style="text-align: center">
                <div id="kalimat" class="koperasi"><strong>KOPERASI JNANA PARTHA</strong></div>
                <div id="kalimat" class="SMA"><strong>SMA NEGERI 1 TEJAKULA</strong></div>
                <div id="kalimat" class="alamat" style="margin-bottom: -100px">Alamat: Jln.Singaraja-Amlapura, Desa Tejakula, Kec. Tejakula, Kab. Buleleng <br>Telp. (0362)3436329 fax: (0362)3436331 Kode Post: (81137)
                </div>
            </td>
        </tr>
    </table>
</div>


<hr>
<h4 style="text-align: center; text-decoration: underline">PERSETUJUAN PEMBERIAN KREDIT</h4><br>

<table id="table_absen" style="width:100%">
    <thead>
    <tr>
        <th class="th_ku" align="center">No</th>
        <th class="th_ku" align="center">Id Pengajuan</th>
        <th class="th_ku" align="center">Nama Anggota</th>
        <th class="th_ku" align="center">Jumlah Kredit</th>
        <th class="th_ku" align="center">Lama Angsuran</th>
        <th class="th_ku" align="center">Utang di tempat lain</th>
        <th class="th_ku" align="center">Status Persetujuan</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($dataRekomendasi->result() as $item) :
        ?>
        <tr>
            <td class="td_ku" align="center"><?= $no++; ?></td>
            <td class="td_ku" align="center"><?= $item->id_pengajuan; ?></td>
            <td class="td_ku"><?= $item->nama_anggota; ?></td>
            <td class="td_ku" align="center"><?= "Rp. " . number_format($item->jml_kredit, 0, ".", "."); ?></td>
            <td class="td_ku" align="center"><?= $item->lama_angsuran; ?></td>
            <td class="td_ku" align="center"><?= "Rp. " . number_format($item->sisa_utang_di_tempat_lain, 0, ".", "."); ?></td>
            <td class="td_ku" align="center"><?= $item->keterangan_persetujuan; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<table>
    <label style="margin-left: 500px;"> <br><br><br><br>( Drs Made Sudarta )<label style="padding-left: 290px;">( Nyoman Suardana, S.Pd )</label></label>
    <label> <br>Ketua,<label style="padding-left: 375px;"> Bendahara,</label></label>
    <label> <br><br><br></br>Menyetujui,<label style="padding-left: 343px;">Tejakula,</label></label>
</table>
</body>
</html>