<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Pengelolaan Toko Kelontong</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .menu a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Selamat Datang di Aplikasi Pengelolaan Toko Kelontong</h1>
    <p>
        <center>Silahkan pilih menu yang ingin Anda akses</center>
    </p>
    <div class="menu">
        <a href="entri_produk.php">Entri Data Produk</a>
        <a href="entri_pelanggan.php">Entri Data Pelanggan</a>
        <a href="entri_transaksi.php">Entri Transaksi Penjualan</a>
        <a href="laporan_stok.php">Laporan Stok</a>
        <a href="laporan_pelanggan.php">Laporan Pelanggan</a>
        <a href="cari_produk.php">Cari Produk</a>
        <a href="laporan_faktur.php">Laporan Faktur</a>
        <a href="rekapitulasi_penjualan.php">Rekapitulasi Penjualan</a>
    </div>
</body>

</html>