<?php
    
    // Load file koneksi.php
    include "koneksi.php";
    
    // Ambil data NIS yang dikirim oleh course.php melalui URL
    $id = $_GET['id'];
    
    // Query untuk menampilkan data mapel berdasarkan ID yang dikirim
    $sql = $koneksi->prepare("SELECT foto FROM mapel WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute(); // Eksekusi query insert
    $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
    
    // Cek apakah file fotonya ada di folder images
    if(is_file("images/".$data['foto'])) // Jika foto ada
    unlink("images/".$data['foto']); // Hapus foto yang telah diupload dari folder images
    
    // Query untuk menghapus data mapel berdasarkan ID yang dikirim
    $sql = $koneksi->prepare("DELETE FROM mapel WHERE id=:id");
    $sql->bindParam(':id', $id);
    $execute = $sql->execute(); // Eksekusi / Jalankan query
    if($execute){ // Cek jika proses simpan ke database sukses atau tidak
    
    // Jika Sukses, Lakukan :
    header("location: course.php"); // Redirect ke halaman course.php
    } else {
    // Jika Gagal, Lakukan :
    echo "Data gagal dihapus. <a href='course.php'>Kembali</a>";
    }
?>