<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Cari Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }

        input,
        button {
            padding: 10px;
            margin: 10px;
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
    <h2>Cari Produk</h2>
    <form method="post">
        <input type="text" name="keyword" placeholder="Masukkan nama produk" required>
        <button type="submit">Cari</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $keyword = strtolower($_POST["keyword"]);
        $file_produk = "produk.txt";

        if (file_exists($file_produk)) {
            $produk_list = file($file_produk, FILE_IGNORE_NEW_LINES);
            $found = false;
            echo "<h3>Hasil Pencarian:</h3><table><tr><th>Nama</th><th>Harga</th><th>Stok</th></tr>";

            foreach ($produk_list as $produk) {
                list($nama, $harga, $stok) = explode("|", $produk);
                if (strpos(strtolower($nama), $keyword) !== false) {
                    echo "<tr><td>$nama</td><td>$harga</td><td>$stok</td></tr>";
                    $found = true;
                }
            }

            echo "</table>";
            if (!$found)
                echo "<p>Produk tidak ditemukan.</p>";
        } else {
            echo "<p>Data produk tidak tersedia.</p>";
        }
    }
    ?>
</body>

</html>