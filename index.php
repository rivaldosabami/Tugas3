<?php
include_once "init.php";

if (isset($_GET['cari'])) {
    $pencarian = $_GET['data'];
    if (empty($pencarian)) {
        $query_select = "SELECT * FROM mahasiswa ORDER BY id DESC";
    } else {
        $query_select = "SELECT * FROM mahasiswa WHERE nama='$pencarian'";
    }
} else {
    $query_select = "SELECT * FROM mahasiswa ORDER BY id DESC";
}

$result = mysqli_query($koneksi_ke_db, $query_select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f3f3;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        header,
        footer {
            padding: 20px 0;
            background-color: #4caf50;
            /* Green header/footer background color */
            color: white;
            text-align: center;
        }

        h1 {
            margin-bottom: 10px;
        }

        .body {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }

        .body-atas {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .tombol {
            background-color: #4caf50;
            /* Green button color */
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s;
            display: inline-block;
            cursor: pointer;
        }

        .tombol:hover {
            background-color: #388e3c;
            /* Darker green button color on hover */
        }

        form {
            display: flex;
            align-items: center;
        }

        .input {
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
            width: 250px;
            margin-right: 10px;
        }

        .body-isi .daftar {
            background-color: #f0f0f0;
            /* Light gray list background color */
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .daftar:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .data {
            flex-grow: 1;
        }

        .aksi {
            margin-left: 20px;
        }

        .aksi a {
            margin-right: 10px;
        }

        footer {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header class="container" style="background-color: #2c3e50; color: #ecf0f1;">
        <h1>Data Mahasiswa</h1>
        <h2>HIMAKOM CUP S1</h2>
        <h3>BATMAN</h3>
    </header>

    <div class="body container">
        <div class="body-atas">
            <a href="tamba.php" class="tombol" style="background-color: #3498db;">Tambah Data Mahasiswa</a>
            <form action="" method="get">
                <input type="text" name="data" placeholder="Ketik Sesuatu.." class="input">
                <input type="submit" name="cari" value="Cari" class="tombol" style="background-color: #3498db;">
            </form>
        </div>
        <hr>
        <?php while ($mhs = mysqli_fetch_assoc($result)) : ?>
            <div class="body-isi">
                <div class="daftar" style="background-color: #ecf0f1;">
                    <div class="data">
                        <p>Nama: <b><?= $mhs['nama'] ?></b></p>
                        <p>NIM: <?= $mhs['nim'] ?></p>
                        <p>Jenis Kelamin: <?= $mhs['jenis_kelamin'] ?></p>
                        <p>Alamat: <?= $mhs['alamat'] ?></p>
                    </div>
                    <div class="aksi">
                        <a href="ubah.php?id=<?= $mhs['id'] ?>" class="tombol" style="background-color: #2ecc71;">Ubah</a>
                        <a href="hapus.php?id=<?= $mhs['id'] ?>" class="tombol" style="background-color: #e74c3c;">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <footer class="container" style="background-color: #2c3e50; color: #ecf0f1;">
        <p>&copy;MorenoSabami | 2023 | Follow me on Instagram: <a href="https://www.instagram.com/moreno.sabami/" target="red">@moreno.sabami</a></p>
    </footer>
</body>

</html>
