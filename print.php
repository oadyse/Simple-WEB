<?php
include_once("connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM tbl_invoice ORDER BY ID ASC");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Data Invoice</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Daftar Data Invoice</h1>
        <br>
        <div class="daftar-data">
            <!-- display tabel daftar invoice -->

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Identitas Customer</th>
                        <th scope="col">Pesanan</th>
                        <th scope="col">Pengiriman</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];

                        $result = mysqli_query($mysqli, "SELECT * FROM tbl_invoice WHERE admin like '%" .
                            $cari . "%' OR nama LIKE '%" . $cari . "%' ");
                    } else {
                        $result = mysqli_query($mysqli, "SELECT * FROM tbl_invoice ORDER BY ID ASC");
                    }

                    while ($res = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . strtoupper($res['admin']) . "</td>";
                        echo "<td>" . date("l, d F Y g:i A") . "</td>";
                        echo "<td>" . ucwords(strtolower($res['nama'])) . "<br>" . ucwords(strtolower($res['alamat'])) . "<br>" . $res['no_hp'] . "</td>";
                        echo "<td>" . $res['nama_brg'] . "<br>" . $res['jumlah'] . "pieces" . "<br><b>Request :</b><br>" . $res['req1'] . " " . $res['req2'] . " " . $res['req3'] . " " . $res['req4'] . "</td>";
                        echo "<td>" . $res['bayar'] . "<br>" . $res['kirim'] . "</td>";
                    }
                    ?>
                </tbody>
            </table>

            <script>
                window.print();
            </script>
        </div>

    </div>
</body>

</html>