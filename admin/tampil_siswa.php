<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title></title>
</head>
<body>
<?php
    include "navbar.php";
    ?>
    <br><br>
    <div class="container">
        <div class="card">
            <div class="card-header">
    <h1 class= "text-center">Data Siswa</h1>
        <form action="tampil_siswa.php" method="POST" class="d-flex">
        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
            </div>
            <div class="card-body">
        <table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">ID Siswa</th>
            <th scope="col">Nama Siswa</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Gender</th>
            <th scope="col">Alamat</th>
            <th scope="col">Username</th>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Aksi</th>
        </tr>
  </thead>
  <tbody>
      <?php
      include "koneksi.php";
      if (isset($_POST["cari"])) {
          //jika ada keyword pencarian
          $cari = $_POST['cari'];
          $qry_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas where siswa.id_siswa='$cari' or siswa.nama_siswa like'%$cari%'");
      }
      else {
          //jika tidak ada keyword pencarian
      $qry_siswa=mysqli_query($koneksi,"select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
      }

      while($data_siswa=mysqli_fetch_array($qry_siswa)){
      ?>
        <tr>
            <td><?php echo $data_siswa["id_siswa"]; ?></td>
            <td><?php echo $data_siswa["nama_siswa"]; ?></td>
            <td><?php echo $data_siswa["tanggal_lahir"]; ?></td>
            <td><?php echo $data_siswa["gender"]; ?></td>
            <td><?php echo $data_siswa["alamat"]; ?></td>
            <td><?php echo $data_siswa["username"]; ?></td>
            <td><?php echo $data_siswa["nama_kelas"]; ?></td>
            <td><a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-success">Ubah</a>
            <a href="hapus_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>"
            onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
        </tr>
    <?php
    }
    ?>
  </tbody>
</table>
    <td><a href="tambah_siswa.php" class="btn btn-secondary">Tambah Siswa</a></td>
    </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>