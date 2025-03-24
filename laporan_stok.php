<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok</title>
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
            width: 60%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        <h2>Laporan Stok Produk</h2>
        <table>
            <tr>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
            <?php
            $file_produk = "produk.txt";

            if (file_exists($file_produk)) {
                $produk_list = file($file_produk, FILE_IGNORE_NEW_LINES);
                if (!empty($produk_list)) {
                    foreach ($produk_list as $produk) {
                        list($nama, $harga, $stok) = explode("|", $produk);
                        echo "<tr>
                                <td>$nama</td>
                                <td>$stok</td>
                                <td>Rp$harga</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' style='color:red;'>Tidak ada data produk.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='color:red;'>File produk.txt tidak ditemukan.</td></tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>