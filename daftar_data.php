<?php
include_once("connection.php");

$result = mysqli_query($mysqli, "SELECT * FROM tbl_invoice ORDER BY ID ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="style_sheet.css">
  <link rel="stylesheet" href="style_responsive.css">
  <link rel="stylesheet" href="bootstrap.min.css">
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

  <div class="daftar-data">
    <!-- display tabel daftar invoice -->
    <br>
    <div class="judul">
      Daftar Invoice
    </div>
    <br>
    <a href="create_new.php" class="row justify-content-center">
      <br><button type="button" name="button" class="btn btn-info">Tambah data</button>
    </a>
    <div class="col-xs">

      <form class="form-inline my-2 my-lg-0 " action="daftar_data.php" method="get">
        <input class="form-control mr-sm-2 mt-4" type="search" placeholder="Search by name" aria-label="Search" name="cari">
        <button class="btn btn-outline-success mt-4" type="submit">Search</button>
      </form>
      <br>
      <?php
      if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        echo "Hasil pencarian : " . $cari . "";
      }
      ?>
    </div>

    <table class="table table-bordered table-hover">
      <tr class="table-info">
        <th scope="col">ID</th>
        <th scope="col">Tanggal Pesan</th>
        <th scope="col">Admin</th>
        <th scope="col">Identitas Customer</th>
        <th scope="col">Pesanan</th>
        <th scope="col">Pengiriman</th>
        <th scope="col">Aksi</th>
      </tr>
      <tbody>
        <?php
        if (isset($_GET['cari'])) {
          $cari = $_GET['cari'];

          $result = mysqli_query($mysqli, "SELECT * FROM tbl_invoice WHERE admin like '%" . $cari . "%' 
          OR nama LIKE '%" . $cari . "%' ");
        } else {
          $result = mysqli_query($mysqli, "SELECT * FROM tbl_invoice ORDER BY ID ASC");
        }

        while ($res = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $res['ID'] . "</td>";
          echo "<td>" . strtoupper($res['admin']) . "</td>";
          echo "<td>" . date("l, d F Y g:i A") . "</td>";
          echo "<td>" . ucwords(strtolower($res['nama'])) . "<br>" . ucwords(strtolower($res['alamat'])) . "<br>" . $res['no_hp'] . "</td>";
          echo "<td>" . $res['nama_brg'] . "<br>" . $res['jumlah'] . "pieces" . "<br><b>Request :</b><br>" . $res['req1'] . " " . $res['req2'] . " " . $res['req3'] . " " . $res['req4'] . "</td>";
          echo "<td>" . $res['bayar'] . "<br>" . $res['kirim'] . "</td>";
          echo "<td><a href=\"edit.php?id=$res[ID]\">Edit</a> | <a
          href=\"delete.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure
          you want to delete?')\">Delete</a></td>";
        }
        ?>
      </tbody>
    </table>

    <form class="form-inline my-2 my-lg-0" action="print.php" target="_blank" method="get">
      <input class="form-control mr-sm-2 mt-4" type="hidden" name="cari" value="<?php echo $cari; ?>">
      <button class="btn btn-warning mt-4" type="submit">Export to PDF</button>
    </form>


    <ul class="list-group list-group-flush">
      <li class="list-group-item">
      </li>
    </ul>
    <!-- display success message -->
    <br>
  </div>

  <?php include("footer.php"); ?>
</body>

</html>