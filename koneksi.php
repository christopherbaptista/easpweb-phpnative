<?php
$db_host    = "localhost";
$db_user    = "root";
$db_pass    = "";
$db_name    = "multiuser";

$koneksi_login    = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$koneksi = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $db_pass);
if (!$koneksi) {
    die("Koneksi Gagal");
}

?>
