<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekapitulasi Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Rekapitulasi Penjualan</h2>
    <?php
    $file_transaksi = "transaksi.txt";
    $rekap_harian = $rekap_bulanan = $rekap_tahunan = [];

    if (file_exists($file_transaksi)) {
        $transaksi_list = file($file_transaksi, FILE_IGNORE_NEW_LINES);
        foreach ($transaksi_list as $transaksi) {
            list($pelanggan, $produk, $jumlah, $total, $tanggal) = explode("|", $transaksi);
            $tanggal_format = date("Y-m-d", strtotime($tanggal));
            $bulan_format = date("Y-m", strtotime($tanggal));
            $tahun_format = date("Y", strtotime($tanggal));

            $rekap_harian[$tanggal_format] = ($rekap_harian[$tanggal_format] ?? 0) + $total;
            $rekap_bulanan[$bulan_format] = ($rekap_bulanan[$bulan_format] ?? 0) + $total;
            $rekap_tahunan[$tahun_format] = ($rekap_tahunan[$tahun_format] ?? 0) + $total;
        }

        function tampilkanRekap($rekap, $judul)
        {
            echo "<h3>$judul</h3><table><tr><th>Periode</th><th>Total Penjualan</th></tr>";
            foreach ($rekap as $periode => $total) {
                echo "<tr><td>$periode</td><td>$total</td></tr>";
            }
            echo "</table>";
        }

        tampilkanRekap($rekap_harian, "Rekapitulasi Harian");
        tampilkanRekap($rekap_bulanan, "Rekapitulasi Bulanan");
        tampilkanRekap($rekap_tahunan, "Rekapitulasi Tahunan");
    } else {
        echo "<p>Tidak ada data transaksi.</p>";
    }
    ?>
</body>

</html>