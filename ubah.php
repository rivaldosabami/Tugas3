<?php
include_once "init.php";
$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id='$id'";
$result = mysqli_query($koneksi_ke_db, $query);
$getbyid = mysqli_fetch_assoc($result);

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin']; // Added gender field

    $query_update = "UPDATE mahasiswa SET nama='$nama', nim='$nim', alamat='$alamat', jenis_kelamin='$jenis_kelamin' WHERE id='$id'";
    mysqli_query($koneksi_ke_db, $query_update);
    header("Location: index.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            background-color: #2E8B57; /* Dark green background color */
            color: #FFF; /* White text color */
            font-family: Arial, sans-serif;
        }

        /* Add your additional styling here for a more attractive design */
    </style>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="post" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $getbyid['nama']; ?>" required><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="<?php echo $getbyid['nim']; ?>" required><br>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" required><?php echo $getbyid['alamat']; ?></textarea><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select name="jenis_kelamin">
            <option value="Laki-laki" <?php if($getbyid['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
            <option value="Perempuan" <?php if($getbyid['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select><br>

        <input type="submit" name="simpan" value="Simpan">
    </form>
    <footer class="container" style="background-color: #2c3e50; color: #ecf0f1;">
        <p>&copy;MorenoSabami | 2023 | Follow me on Instagram: <a href="https://www.instagram.com/moreno.sabami/" target="red">@moreno.sabami</a></p>
    </footer>
</body>
</html>
