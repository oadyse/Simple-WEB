<?php
include_once("connection.php");

$result = mysqli_query($mysqli, "SELECT * FROM tbl_invoice ORDER BY ID");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_sheet.css">
    <link rel="stylesheet" href="style_responsive.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>AyayPouchSouvenir</title>
</head>

<body>
    <?php include("header.php"); ?>
    <div class="top-wrapper">
        <div class="header-container">
            <br>
            <h1>AYAY POUCH SOUVENIR</h1>
            <h1>Aneka Souvenir Pernikahan</h1>
            <p>Jadikan kenangan tak terlupakan bagi orang terdekat :)</p>
            <br>
            <div class="btn-wrapper">
                <a href="https://www.instagram.com/ayaypouchsouvenir" class="btn instagram"><span class="fa fa-instagram"></span>ayaypouchsouvenir</a>
                <br><br>
                <a href="https://shopee.co.id/ayayhansmade" class="btn shopee"><span class="fa fa-shopping-cart"></span>tokonyaAy</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="heading">
            <h2>Katalog Ayay Pouch Souvenir</h2>
        </div>
        <?php include("katalog.php"); ?>
    </div>

    <?php include("footer.php"); ?>

</body>

</html>