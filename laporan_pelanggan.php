<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
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
    <h2>Laporan Pelanggan</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </tr>
        <?php
        $file_pelanggan = "pelanggan.txt";
        if (file_exists($file_pelanggan)) {
            $pelanggan_list = file($file_pelanggan, FILE_IGNORE_NEW_LINES);
            foreach ($pelanggan_list as $pelanggan) {
                list($nama, $alamat, $telepon) = explode("|", $pelanggan);
                echo "<tr><td>$nama</td><td>$alamat</td><td>$telepon</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data pelanggan</td></tr>";
        }
        ?>
    </table>
</body>

</html>