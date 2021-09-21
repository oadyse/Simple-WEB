<?php include("connection.php"); ?>

<?php
if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $admin = mysqli_real_escape_string($mysqli, $_POST['admin']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($mysqli, $_POST['no_hp']);
    $bayar = mysqli_real_escape_string($mysqli, $_POST['bayar']);
    $kirim = mysqli_real_escape_string($mysqli, $_POST['kirim']);

    // checking empty fields
    if (
        empty($nama) || empty($nim) || empty($jurusan) ||
        empty($email)
    ) {
        if (empty($admin)) {
            echo "<font color='red'>Nama Admin masih belum diisi</font><br />";
        }

        if (empty($nama)) {
            echo "<font color='red'>Nama Customer masih belum diisi</font><br />";
        }

        if (empty($alamat)) {
            echo "<font color='red'>Alamat Customer masih belum diisi</font><br />";
        }

        if (empty($no_hp)) {
            echo "<font color='red'>No.Handphone Custome masih belum diisi</font><br />";
        }
        if (empty($bayar)) {
            echo "<font color='red'>Pembayaran masih belum diisi</font><br />";
        }
        if (empty($kirim)) {
            echo "<font color='red'>Pengiriman masih belum diisi</font><br />";
        }
    } else {
        //updating the table
        $results = mysqli_query(
            $mysqli,
            "UPDATE tbl_mahasiswa SET admin='$admin',nama='$nama',alamat='$alamat',no_hp='$no_hp',
            bayar='$bayar',kirim='$kirim' WHERE ID=$id"
        );

        //redirectig to the display page. In our case, it is index.php
        header("Location: daftar_data.php");
    }
}
?>

<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$results = mysqli_query($mysqli, "SELECT * FROM tbl_invoice WHERE id=$id");
while ($res = mysqli_fetch_array($results)) {
    $admin = $res['admin'];
    $nama = $res['nama'];
    $alamat = $res['alamat'];
    $no_hp = $res['no_hp'];
    $jenis = $res['nama_brg'];
    $jumlah = $res['jumlah'];
    $bayar = $res['bayar'];
    $kirim = $res['kirim'];
}
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
    <div class="form">
        <br>
        <div class="judul">
            Form Edit Invoice
        </div>
        <br>
        <?php include("form_edit.php"); ?>
    </div>

    <?php include("footer.php"); ?>

    </div>

</body>

</html>