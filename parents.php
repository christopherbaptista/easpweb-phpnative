<?php
include("header.php");
if (!in_array("parent", $_SESSION['admin_akses'])) {
    echo "Kamu tidak punya akses";
    exit();
}
?>
