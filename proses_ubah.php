<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];

// Ambil Data yang Dikirim dari Form
$nama_mapel = $_POST['nama_mapel'];
$tanggal = $_POST['tanggal'];
$nama_guru = $_POST['nama_guru'];
$mapel_status = $_POST['mapel_status'];

// Ambil data foto yang dipilih dari form
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(empty($foto)) { // Jika user tidak memilih file foto pada form
  // Lakukan proses update tanpa mengubah fotonya
  // Proses ubah data ke Database
  $sql = $koneksi->prepare("UPDATE mapel SET nama_mapel=:nama_mapel, tanggal=:tanggal, nama_guru=:nama_guru, mapel_status=:mapel_status WHERE id=:id");
  $sql->bindParam(':nama_mapel', $nama_mapel);
  $sql->bindParam(':tanggal', $tanggal);
  $sql->bindParam(':nama_guru', $nama_guru);
  $sql->bindParam(':mapel_status', $mapel_status);
  $sql->bindParam(':id', $id);
  $execute = $sql->execute(); // Eksekusi / Jalankan query
  
  if($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: course.php"); // Redirect ke halaman course.php
  } else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
} else { // Jika user memilih foto / mengisi input file foto pada form
  // Lakukan proses update termasuk mengganti foto sebelumnya
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "images/".$fotobaru;
  
  // Proses upload
  if(move_uploaded_file($tmp, $path)) { // Cek apakah gambar berhasil diupload atau tidak
    
    // Query untuk menampilkan data mapel berdasarkan ID yang dikirim
    $sql = $koneksi->prepare("SELECT foto FROM mapel WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute(); // Eksekusi query insert
    $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
    
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("images/".$data['foto'])) // Jika foto ada
      unlink("images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $sql = $koneksi->prepare("UPDATE mapel SET nama_mapel=:nama_mapel, tanggal=:tanggal, nama_guru=:nama_guru, mapel_status=:mapel_status, foto=:foto WHERE id=:id");
    $sql->bindParam(':nama_mapel', $nama_mapel);
    $sql->bindParam(':tanggal', $tanggal);
    $sql->bindParam(':nama_guru', $nama_guru);
    $sql->bindParam(':mapel_status', $mapel_status);
    $sql->bindParam(':foto', $fotobaru);
    $sql->bindParam(':id', $id);
    $execute = $sql->execute(); // Eksekusi / Jalankan query
    
    if($sql) { // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: course.php"); // Redirect ke halaman course.php
    } else {
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
    }
  } else {
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
}
?>