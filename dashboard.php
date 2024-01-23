<?php
session_start();
if (!isset($_SESSION['nik'])) {
    header("Location: /index.php");
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

                <a href="/dashboard.php">Home</a> | <a href="/catatan.php">Catatan Perjalanan</a> | <a href="/tambah-catatan.php">Isi Data</a>| <a href="logout.php">Log out</a>

                <p>Hi <?= $_SESSION['nama_lengkap'] ?> 👋, Selamat datang </p>
            </div>
        </div>

    </div>

</body>

</html>