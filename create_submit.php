<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_sheet.css">
    <link rel="stylesheet" href="style_responsive.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>AyayPouchSouvenir</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="header-left">
                <a href="index.php">
                    <img class="logo" src="gambar/logo.png">
                </a>
            </div>
        </div>
    </header>
    <?php

    $admin = mysqli_real_escape_string($mysqli, $_POST['admin']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($mysqli, $_POST['no_hp']);
    $jenis = mysqli_real_escape_string($mysqli, $_POST['jenis']);
    $jumlah = mysqli_real_escape_string($mysqli, $_POST['jumlah']);
    $req1 = mysqli_real_escape_string($mysqli, $_POST['req1']);
    $req2 = mysqli_real_escape_string($mysqli, $_POST['req2']);
    $req3 = mysqli_real_escape_string($mysqli, $_POST['req3']);
    $req4 = mysqli_real_escape_string($mysqli, $_POST['req4']);
    $bayar = mysqli_real_escape_string($mysqli, $_POST['bayar']);
    $kirim = mysqli_real_escape_string($mysqli, $_POST['kirim']);
    $est_jadi = mktime(0, 0, 0, date('m'), date('d') + 14, date('y'));

    //insert data to database
    $result = mysqli_query($mysqli, "INSERT INTO tbl_invoice (admin, nama, alamat, no_hp, nama_brg,
        jumlah, req1, req2, req3, req4, bayar, kirim, est_jadi)
        VALUES('$admin', '$nama', '$alamat', '$no_hp', '$jenis', '$jumlah', '$req1', '$req2' , '$req3',
        '$req4', '$bayar', '$kirim', '$est_jadi')");
    ?>

    <div class="form">
        <!-- display hasil form -->
        <br>
        <div class="judul">
            Invoice Baru
        </div>
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Tanggal pesanan dibuat</td>
                            <td>:</td>
                            <td><?= date("l, d F Y g:i A") ?></td>
                        </tr>
                        <tr>
                            <td>Admin Marketing</td>
                            <td>:</td>
                            <td><?= "<b>" . strtoupper($admin) . "</b>"; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>:</td>
                            <td><?= ucwords(strtolower($nama)); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Customer</td>
                            <td>:</td>
                            <td><?= ucwords(strtolower($alamat)); ?></td>
                        </tr>
                        <tr>
                            <td>No.Handphone Customer</td>
                            <td>:</td>
                            <td><?= ($no_hp); ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Souvenir</td>
                            <td>:</td>
                            <td><?= ($jenis); ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td><?= ($jumlah); ?></td>
                        </tr>
                        <tr>
                            <td>Request</td>
                            <td>:</td>
                            <td><?= ($req1) . "_" . ($req2) . "_" . ($req3) . "_" . ($req4); ?></td>
                        </tr>
                        <tr>
                            <td>Pembayaran</td>
                            <td>:</td>
                            <td><?= ($bayar); ?></td>
                        </tr>
                        <tr>
                            <td>Pengiriman</td>
                            <td>:</td>
                            <td><?= ($kirim); ?>
                            </td>
                        </tr>
                        <tr style="color: red;">
                            <td><b>Estimasi Barang Dikirim</b></td>
                            <td>:</td>
                            <td><b><?= date("d F Y", $est_jadi); ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </li>
        </ul>
        <!-- display success message -->
        <br>
        <div style="text-align: center;">
            <h5 style="color: green;">
                Data berhasil ditambahkan!
            </h5><br><br>
            <a href="daftar_data.php">
                <button type="submit" name="submit" class="btn btn-primary">View Result</button>
            </a><br>
        </div>
    </div>

    <?php include("footer.php"); ?>

</body>

</html>