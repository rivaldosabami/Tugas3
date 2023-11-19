<?php
include_once "init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $query_insert = "INSERT INTO mahasiswa (nama, nim, alamat, jenis_kelamin) VALUES ('$nama', '$nim', '$alamat', '$jenis_kelamin')";
    mysqli_query($koneksi_ke_db, $query_insert);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body {
            background-color: #81c784; /* Dark Green Color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #004d40;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .body {
            background-color: #81c784; /* Dark Green Color */
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #555;
            border-radius: 5px;
        }

        .tombol {
            background-color: #555;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header class="container">
        <h1>Tambah Data Mahasiswa</h1>
    </header>

    <div class="body container">
        <form action="" method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="nim">NIM:</label>
            <input type="text" name="nim" required>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <input type="submit" value="Tambah" class="tombol">
        </form>
    </div>
    <footer class="container" style="background-color: #2c3e50; color: #ecf0f1;">
        <p>&copy;MorenoSabami | 2023 | Follow me on Instagram: <a href="https://www.instagram.com/moreno.sabami/" target="red">@moreno.sabami</a></p>
    </footer>
</body>
</html>
