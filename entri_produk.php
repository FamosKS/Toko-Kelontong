<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Data Produk</title>
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

        form input {
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
        <h2>Entri Data Produk</h2>
        <form method="post" action="">
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" id="nama_produk" name="nama_produk" required>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" step="0.01" required>

            <button type="submit" name="submit">Simpan</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $nama_produk = $_POST['nama_produk'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];

            // Simpan data ke file produk.txt
            $data = "$nama_produk|$stok|$harga\n";
            file_put_contents("produk.txt", $data, FILE_APPEND);

            echo "<p style='color:green; text-align:center;'>Data produk berhasil disimpan!</p>";
        }
        ?>

        <h2>Daftar Produk</h2>
        <?php
        $file_produk = "produk.txt";
        if (file_exists($file_produk)) {
            $produk_list = file($file_produk, FILE_IGNORE_NEW_LINES);
            if (!empty($produk_list)) {
                echo "<table><tr><th>Nama Produk</th><th>Stok</th><th>Harga</th></tr>";
                foreach ($produk_list as $produk) {
                    list($nama, $stok, $harga) = explode("|", $produk);
                    echo "<tr><td>$nama</td><td>$stok</td><td>Rp " . number_format($harga, 2, ',', '.') . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='color:red;'>Tidak ada produk.</p>";
            }
        } else {
            echo "<p style='color:red;'>Tidak ada produk.</p>";
        }
        ?>
    </div>

</body>

</html>