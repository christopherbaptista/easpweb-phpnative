<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nama_invoice = $_POST['nama_invoice'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$invoice_status = $_POST['invoice_status'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)) { // Cek apakah gambar berhasil diupload atau tidak
  
  // Proses simpan ke Database
  $sql = $koneksi->prepare("INSERT INTO invoice(nama_invoice, jumlah, tanggal, invoice_status, foto) VALUES(:nama_invoice,:jumlah,:tanggal,:invoice_status,:foto)");
  $sql->bindParam(':nama_invoice', $nama_invoice);
  $sql->bindParam(':jumlah', $jumlah);
  $sql->bindParam(':tanggal', $tanggal);
  $sql->bindParam(':invoice_status', $invoice_status);
  $sql->bindParam(':foto', $fotobaru);
  $sql->execute(); // Eksekusi query insert

  if($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: invoice.php"); // Redirect ke halaman invoice.php
  } else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='simpan_invoice.php'>Kembali Ke Form</a>";
  }
} else {
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='simpan_invoice.php'>Kembali Ke Form</a>";
}
?>