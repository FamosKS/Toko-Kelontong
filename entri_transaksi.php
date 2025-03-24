<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Transaksi Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            text-align: left;
        }

        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        form input,
        form select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 15px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: white;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Entri Transaksi Penjualan</h2>
        <form method="post" action="">
            <label for="id_pelanggan">Pelanggan:</label>
            <select id="id_pelanggan" name="id_pelanggan" required>
                <?php
                if (file_exists("pelanggan.txt")) {
                    $pelanggan_list = file("pelanggan.txt", FILE_IGNORE_NEW_LINES);
                    foreach ($pelanggan_list as $index => $pelanggan) {
                        list($nama, $alamat, $telepon) = explode("|", $pelanggan);
                        echo "<option value='$index'>$nama</option>";
                    }
                }
                ?>
            </select>

            <label for="id_produk">Produk:</label>
            <select id="id_produk" name="id_produk" required>
                <?php
                if (file_exists("produk.txt")) {
                    $produk_list = file("produk.txt", FILE_IGNORE_NEW_LINES);
                    foreach ($produk_list as $index => $produk) {
                        list($nama, $harga, $stok) = explode("|", $produk);
                        echo "<option value='$index' data-harga='$harga'>$nama - Rp$harga</option>";
                    }
                }
                ?>
            </select>

            <label for="jumlah">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" required>

            <button type="submit" name="submit">Simpan</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $id_pelanggan = $_POST['id_pelanggan'];
            $id_produk = $_POST['id_produk'];
            $jumlah = $_POST['jumlah'];

            // Ambil harga dari produk yang dipilih
            $produk_list = file("produk.txt", FILE_IGNORE_NEW_LINES);
            list($nama_produk, $harga_produk, $stok_produk) = explode("|", $produk_list[$id_produk]);
            $total_harga = $jumlah * $harga_produk;

            // Simpan transaksi ke file transaksi.txt
            $data = "$id_pelanggan|$id_produk|$jumlah|$total_harga|" . date("Y-m-d H:i:s") . "\n";
            file_put_contents("transaksi.txt", $data, FILE_APPEND);

            echo "<p style='color:green; text-align:center;'>Transaksi berhasil disimpan!</p>";
        }
        ?>

        <h2>Daftar Transaksi</h2>
        <?php
        $file_transaksi = "transaksi.txt";
        if (file_exists($file_transaksi)) {
            $transaksi_list = file($file_transaksi, FILE_IGNORE_NEW_LINES);
            if (!empty($transaksi_list)) {
                echo "<table><tr><th>Pelanggan</th><th>Produk</th><th>Jumlah</th><th>Total Harga</th><th>Tanggal</th></tr>";
                foreach ($transaksi_list as $transaksi) {
                    list($id_pelanggan, $id_produk, $jumlah, $total_harga, $tanggal) = explode("|", $transaksi);

                    // Ambil nama pelanggan
                    $pelanggan_list = file("pelanggan.txt", FILE_IGNORE_NEW_LINES);
                    list($nama_pelanggan) = explode("|", $pelanggan_list[$id_pelanggan]);

                    // Ambil nama produk
                    $produk_list = file("produk.txt", FILE_IGNORE_NEW_LINES);
                    list($nama_produk) = explode("|", $produk_list[$id_produk]);

                    echo "<tr><td>$nama_pelanggan</td><td>$nama_produk</td><td>$jumlah</td><td>Rp$total_harga</td><td>$tanggal</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='color:red;'>Tidak ada transaksi.</p>";
            }
        } else {
            echo "<p style='color:red;'>Tidak ada transaksi.</p>";
        }
        ?>
    </div>

</body>

</html>