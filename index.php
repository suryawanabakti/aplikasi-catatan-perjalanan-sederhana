<?php
if (isset($_POST["btn_register"])) {
    $nik = (string)$_POST['nik'];
    $nama_lengkap = (string)$_POST['nama_lengkap'];

    $file = fopen("user.csv", "a+");
    fputcsv($file, [$nik, $nama_lengkap]);
    echo "<script>
        alert('Berhasil register , silahkan login');
        location.href = './';
    </script>";
}

if (isset($_POST["btn_login"])) {

    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $file = fopen("user.csv", "r");
    $login = 0;
    while ($row = fgetcsv($file)) {
        if ($row[0] == $nik) {
            $nik = $row[0];
            $namaLengkap = $row[1];
            $login += 1;
        }
    }

    if ($login > 0) {
        session_start();
        $_SESSION['nama_lengkap'] = $namaLengkap;
        $_SESSION['nik'] = $nik;
        fclose($file);
        header("Location: /dashboard.php");
    }


    if ($login === 0) {
        $file = fopen("user.csv", "r");
        echo "Gagal Login";
        while ($row = fgetcsv($file)) {
            var_dump($row);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <style>
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="center">
        <form action="" method="POST">
            <div style="margin-bottom: 3px;">
                <input type="text" placeholder="NIK" name="nik" required>
            </div>
            <div style="margin-bottom: 3px;">
                <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" required>
            </div>
            <div>
                <button type="submit" name="btn_register" value="1">Saya pengguna baru</button>
                <button type="submit" name="btn_login" value="1">Masuk</button>
            </div>
        </form>
    </div>

</body>

</html>