<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entri Data Pelanggan</title>
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
        <h2>Entri Data Pelanggan</h2>
        <form method="post" action="">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="telepon">Telepon:</label>
            <input type="text" id="telepon" name="telepon" required>

            <button type="submit" name="submit">Simpan</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];

            // Simpan data ke file pelanggan.txt
            $data = "$nama_pelanggan|$alamat|$telepon\n";
            file_put_contents("pelanggan.txt", $data, FILE_APPEND);

            echo "<p style='color:green; text-align:center;'>Data pelanggan berhasil disimpan!</p>";
        }
        ?>

        <h2>Daftar Pelanggan</h2>
        <?php
        $file_pelanggan = "pelanggan.txt";
        if (file_exists($file_pelanggan)) {
            $pelanggan_list = file($file_pelanggan, FILE_IGNORE_NEW_LINES);
            if (!empty($pelanggan_list)) {
                echo "<table><tr><th>Nama</th><th>Alamat</th><th>Telepon</th></tr>";
                foreach ($pelanggan_list as $pelanggan) {
                    list($nama, $alamat, $telepon) = explode("|", $pelanggan);
                    echo "<tr><td>$nama</td><td>$alamat</td><td>$telepon</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='color:red;'>Tidak ada pelanggan.</p>";
            }
        } else {
            echo "<p style='color:red;'>Tidak ada pelanggan.</p>";
        }
        ?>
    </div>

</body>

</html>