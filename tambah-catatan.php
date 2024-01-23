<?php
session_start();
if (!isset($_SESSION['nik'])) {
    header("Location: /index.php");
}
$file = fopen("catatan.csv", "r");
if (isset($_POST['simpan'])) {
    echo $nik = $_SESSION['nik'];
    echo  $tanggal = $_POST['tanggal'];
    echo  $jam = $_POST['jam'];
    echo  $lokasi = $_POST['lokasi'];
    echo $suhu = $_POST['suhu'];
    $file = fopen("catatan.csv", "a+");
    $catatan = fputcsv($file, [$nik, $tanggal, $jam, $lokasi, $suhu]);
    header("Location: catatan.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="/style.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-1">
                <img src="https://backpanel.kemlu.go.id/PublishingImages/unnamed.png" alt="" class="img img-fluid">
            </div>
            <div class="col">

                <h1>Peduli Diri</h1>
                <p>Catatan Perjalanan</p>

                <a href="/dashboard.php">Home</a> | <a href="/catatan.php">Catatan Perjalanan</a> | <a href="tambah-catatan.php">Isi Data</a>| <a href="logout.php">Log out</a>

                <p>Hi <?= $_SESSION['nama_lengkap'] ?> 👋, Selamat datang </p>

                <form action="" method="POST">
                    <table class="" cellpadding="5">
                        <tr>
                            <th style="width: 20%;">
                                Tanggal
                            </th>
                            <td style="width: 80%;">
                                <input type="date" required class="form-control" name="tanggal">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Jam
                            </th>
                            <td>
                                <input type="time" required class="form-control" name="jam">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Lokasi yang dikunjungi
                            </th>
                            <td>
                                <input type="text" required class="form-control" name="lokasi">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Suhu Tubuh
                            </th>
                            <td>
                                <input type="number" required class="form-control" name="suhu">
                            </td>
                        </tr>
                    </table>

                    <button class="mt-4 float-end" type="submit" value="1" name="simpan">Simpan</button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>