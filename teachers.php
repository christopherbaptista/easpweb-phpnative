<?php
include("header.php");
if (!in_array("guru", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    exit();
}
?>
