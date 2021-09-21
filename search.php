<div class="row">
    <div class="col">
        <a href="create.html">
            <button type="button" class="btn btn-primary mt-4">Tambah data</button>
        </a>
    </div>
    <div class="col-xs">
        <form class="form-inline my-2 my-lg-0 " action="index.php" method="get">
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
</div>