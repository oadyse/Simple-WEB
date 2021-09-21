<?php
$id;
$admin;
$nama;
$alamat;
$no_hp;
$jenis = [
    'Boxy Pouch', 'Fortuna Pouch', 'Kissy Pouch', 'Tempat Tisu', 'Panda Pouch',
    'Kanvas Pouch', 'Zebra Pouch', 'Handbag', 'Aurora Pouch', 'Bomet Pouch',
    'Card Holder', 'Gantungan Kunci',  'Dompet', 'Kotak Pensil', 'Vega Pouch'
];
$jumlah;
$request;
$req1 = ['Kemasan Mika', 'Kemasan BOX', 'Kemasan Paper Bag'];
$req2 = [
    'Pita Merah', 'Pita Biru', 'Pita Kuning', 'Pita Oranye', 'Pita Hijau',
    'Pita Ungu', 'Pita Hitam', 'Pita Coklat', 'Pita Putih', 'Pita Gold',
    'Pita Silver', 'Pita Navy', 'Pita Maroon', 'Pita Pink Muda', 'Pita Pink Fanta'
];
$req3;
$req4;
$bayar = ['CASH', 'DP'];
$kirim = ['Diambil sendiri', 'JNE TRUCK', 'JNE OKE', 'JNE REGULER'];
?>

<form method="POST" action="edit.php">

    <div class="form-group">
        <label for="admin">Admin Marketing :</label>
        <input class="form-control" name="admin" value="<?php echo $admin; ?>">
    </div>
    <div class="form-group">
        <label for="nama">Nama Customer :</label>
        <input class="form-control" name="nama" value="<?php echo $nama; ?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat Customer :</label>
        <input class="form-control" name="alamat" value="<?php echo $alamat; ?>">
    </div>
    <div class="form-group">
        <label for="no_hp">No.Handphone Customer :</label>
        <input class="form-control" name="no_hp" value="<?php echo $no_hp; ?>">
    </div>

    <label for="request">Jenis Souvenir :</label>
    <div class="form-row">
        <div class="col">
            <select name="jenis" class="custom-select" value="<?php echo $jenis; ?>">
                <?php echo $jenis; ?>
                <?php for ($x = 0; $x < 15; $x++) : ?>
                    <option><?= $jenis[$x] ?> </option>
                <?php endfor ?>
            </select>
        </div>
        <div class=" col">
            <input name="jumlah" class="form-control" placeholder="Jumlah Souvenir" value="<?php echo $jumlah; ?>">
        </div>
    </div><br>

    <label for="request">Request :</label>
    <div class="form-group col" name="request">
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">Tidak Ada
            </label>
        </div><br><br>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio">Ada
            </label>&emsp;

            <!-- Tambahan Request -->
            <div class="col">
                <select name="req1" class="custom-select">
                    <option selected></option>
                    <?php for ($x = 0; $x < 3; $x++) : ?>
                        <option><?= $req1[$x] ?> </option>
                    <?php endfor ?>
                </select>
            </div>
            <div class="col">
                <select name="req2" class="custom-select">
                    <option selected> </option>
                    <?php for ($x = 0; $x < 15; $x++) : ?>
                        <option><?= $req2[$x] ?> </option>
                    <?php endfor ?>
                </select>
            </div>
            &nbsp;
            <div class="col">
                <input class="form-control" placeholder="Tulisan" name="req3" size="25">
            </div>
            <div class="col">
                <input type="date" class="form-control" name="req4">
            </div>
            <div class="row">

            </div>
        </div>
    </div>

    <label for="jenis">Pembayaran :</label>
    <div class="form-group">
        <select name="bayar" class="custom-select" value="<?php echo $nama; ?>">
            <option selected>Pilih Metode Pembayaran</option>
            <?php for ($x = 0; $x < 2; $x++) : ?>
                <option><?= $bayar[$x] ?> </option>
            <?php endfor ?>
        </select>
    </div>

    <label for="jenis">Pengiriman :</label>
    <div class="form-group">
        <select name="kirim" class="custom-select">
            <?php
            $sql_kirim = mysqli_query($mysqli, "SELECT * FROM kirim");
            while ($res_kirim = mysqli_fetch_array($sql_kirim)) {
                if ($res['kirim'] == $res_kirim['id_kirim']) {
                    $select = "selected";
                } else {
                    $select = "";
                }
                echo "<option $select>" . $res_kirim['kirim'] . "</option>";
            }
            ?>
            <option selected>Pilih Service yang Digunakan</option>
            <?php for ($x = 0; $x < 4; $x++) : ?>
                <option><?= $kirim[$x] ?> </option>
            <?php endfor ?>
        </select>
    </div>

    <br><br>

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="daftar_data.php">
        <button type="button" class="btn btn-success">Cancel</button>
    </a>
    <br>
</form>