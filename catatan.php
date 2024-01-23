<?php
session_start();
if (!isset($_SESSION['nik'])) {
    header("Location: /index.php");
}

$file = fopen("catatan.csv", "r");

while ($row = fgetcsv($file)) {
    $catatan[] = [
        "nik" => $row[0],
        "tanggal" => $row[1],
        "waktu" => $row[2],
        "lokasi" => $row[3],
        "suhu" => $row[4],
    ];
}

function date_compare($element1, $element2)
{
    $datetime1 = strtotime($element1['datetime']);
    $datetime2 = strtotime($element2['datetime']);
    return $datetime1 - $datetime2;
}


if ($_GET['filter'] === 'tanggal') {
    usort($catatan, function ($element1, $element2) {
        $datetime1 = strtotime($element1['tanggal']);
        $datetime2 = strtotime($element2['tanggal']);
        return $datetime1 - $datetime2;
    });
}

if ($_GET['filter'] === 'waktu') {
    usort($catatan, function ($element1, $element2) {
        $datetime1 = strtotime($element1['waktu']);
        $datetime2 = strtotime($element2['waktu']);
        return $datetime1 - $datetime2;
    });
}

if ($_GET['filter'] === 'suhu') {
    usort($catatan, function ($element1, $element2) {
        $datetime1 = strtotime($element1['suhu']);
        $datetime2 = strtotime($element2['suhu']);
        return $datetime1 - $datetime2;
    });
}

if ($_GET['filter'] === 'lokasi') {
    usort($catatan, function ($element1, $element2) {
        $datetime1 = strtotime($element1['lokasi']);
        $datetime2 = strtotime($element2['lokasi']);
        return $datetime1 - $datetime2;
    });
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
                <div class="border p-3">
                    <form action="">
                        <div style="display: flex;">
                            <span class="me-2">Urutkan Berdasarkan :</span>
                            <select name="filter" id="filter" class="w-50 me-2">
                                <option <?= $_GET['filter'] === 'tanggal' ? 'selected' : ''  ?> value="tanggal">Tanggal</option>
                                <option <?= $_GET['filter'] === 'waktu' ? 'selected' : ''  ?> value="waktu">waktu</option>
                                <option <?= $_GET['filter'] === 'lokasi' ? 'selected' : ''  ?> value="lokasi">lokasi</option>
                                <option <?= $_GET['filter'] === 'suhu' ? 'selected' : ''  ?> value="suhu">suhu</option>
                            </select>
                            <button type="submit">Urutkan</button>
                        </div>
                    </form>

                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Suhu Tubuh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($catatan as $row) : ?>
                            <tr>
                                <td><?= $row["tanggal"] ?></td>
                                <td><?= $row["waktu"] ?></td>
                                <td><?= $row["lokasi"] ?></td>
                                <td><?= $row["suhu"] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <div class=" text-end">
                    <a href="tambah-catatan.php">Isi Catatan Perjalanan</a>
                </div>
            </div>
        </div>

    </div>

</body>

</html>