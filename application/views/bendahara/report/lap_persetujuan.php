<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Persetujuan</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<center><h2>LAPORAN PERSETUJUAN PENGAJUAN KREDIT <br> KOPERASI JNANA PARTHA</h2></center>
<center><h2></h2></center>
<br><br>
<table style="width:100%">
    <thead>
    <tr>
        <th align="center">No</th>
        <th align="center">Id Pengajuan</th>
        <th align="center">Nama Anggota</th>
        <th align="center">Jumlah Kredit</th>
        <th align="center">Lama Angsuran</th>
        <th align="center">Utang di tempat lain</th>
        <th align="center">Status Persetujuan</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($dataRekomendasi->result() as $item) :
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td align="center"><?= $item->id_pengajuan; ?></td>
            <td><?= $item->nama_anggota; ?></td>
            <td align="center"><?= "Rp. " . number_format($item->jml_kredit, 0, ".", "."); ?></td>
            <td align="center"><?= $item->lama_angsuran; ?></td>
            <td align="center"><?= "Rp. " . number_format($item->sisa_utang_di_tempat_lain, 0, ".", "."); ?></td>
            <td align="center"><?= $item->keterangan_persetujuan; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<table>
    <label class="align-right"> <br><br><br>Drs Made Sudarta</label>
    <label> <br>Ketua,</label>
    <label> <br><br><br>Tejakula,</label>
</table>
</body>
</html>