<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nama_mapel = $_POST['nama_mapel'];
$tanggal = $_POST['tanggal'];
$nama_guru = $_POST['nama_guru'];
$mapel_status = $_POST['mapel_status'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)) { // Cek apakah gambar berhasil diupload atau tidak
  
  // Proses simpan ke Database
  $sql = $koneksi->prepare("INSERT INTO mapel(nama_mapel, tanggal, nama_guru, mapel_status, foto) VALUES(:nama_mapel,:tanggal,:nama_guru,:mapel_status,:foto)");
  $sql->bindParam(':nama_mapel', $nama_mapel);
  $sql->bindParam(':tanggal', $tanggal);
  $sql->bindParam(':nama_guru', $nama_guru);
  $sql->bindParam(':mapel_status', $mapel_status);
  $sql->bindParam(':foto', $fotobaru);
  $sql->execute(); // Eksekusi query insert

  if($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: course.php"); // Redirect ke halaman course.php
  } else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }
} else {
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>