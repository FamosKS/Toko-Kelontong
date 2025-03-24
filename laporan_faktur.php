<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Faktur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }

        table {
            width: 90%;
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
    <h2>Laporan Faktur Penjualan</h2>
    <table>
        <tr>
            <th>Pelanggan</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal</th>
        </tr>
        <?php
        $file_transaksi = "transaksi.txt";
        if (file_exists($file_transaksi)) {
            $transaksi_list = file($file_transaksi, FILE_IGNORE_NEW_LINES);
            foreach ($transaksi_list as $transaksi) {
                list($pelanggan, $produk, $jumlah, $total, $tanggal) = explode("|", $transaksi);
                echo "<tr><td>$pelanggan</td><td>$produk</td><td>$jumlah</td><td>$total</td><td>$tanggal</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada transaksi</td></tr>";
        }
        ?>
    </table>
</body>

</html>