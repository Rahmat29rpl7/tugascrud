<?php 
    include "koneksi.php";
    
    $id_buku = $_GET['id_buku'];
    $folder = "foto/";

    //mendapatkan data buku yang diubah
    $sql = "select * from buku where id_buku='$id_buku'";
    //eksekusi perintah sql
    $query = mysqli_query($koneksi, $sql);
    //konversi ke array
    $buku = mysqli_fetch_array($query);

    //proses hapus file yang lama
    $path = $folder.$buku["foto"];

    //cek eksistensi file yang akan dihapus
    if (file_exists($path)){
    //jika file yang lama ada, maka kita hapus
        unlink($path);
    }

    $sql = "delete from buku where id_buku = '$id_buku'";

    //eksekusi perintah update
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script>alert('Berhasil');location.href='tampil_buku.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');location.href='tampil_buku.php';</script>";
    }

?>