<?php
include("connection.php");

$id = $_GET['ID'];
$result = mysqli_query($mysqli, "DELETE FROM tbl_invoice WHERE ID=$id");

header("Location:daftar_data.php");
