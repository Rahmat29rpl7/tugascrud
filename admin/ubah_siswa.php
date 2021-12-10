<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <?php
    include "koneksi.php";
    $qry_get_siswa = mysqli_query($koneksi, "select * from siswa where id_siswa = '".$_GET['id_siswa']."'");
    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
    ?>
    <div class="p-3 mb-2 bg-dark text-white">
    <div class = "container">
    <h3  class = "text-center"> Tambah Siswa</h3> 
    <form action="proses_ubah_siswa.php" method="post">
        <input type = "hidden" name="id_siswa" value ="<?=$dt_siswa['id_siswa']?>">
        Nama Siswa :
        <br><input type ="text" name ="nama_siswa" value ="<?=$dt_siswa['nama_siswa']?>" class = "form-control"></br>
        
        Tanggal Lahir:
        <br><input type ="date" name ="tanggal_lahir" value ="<?=$dt_siswa['tanggal_lahir']?>" class = "form-control"></br>
        
        Gender :
        <br><?php 
        $arr_gender=array('L'=>'Laki-laki', 'P'=>'Perempuan');
        ?>
        <select name="gender" class="form-control">
            <option></option>
            <?php foreach ($arr_gender as $key_gender => $val_gender):
                if($key_gender==$dt_siswa['gender']){
                    $select="selected";
                } else {
                    $select="";
                }
             ?>
            <option value="<?=$key_gender?>"<?=$select?>><?=$val_gender?></option>
            <?php endforeach ?>
        </select></br>
        Alamat :
        <br><textarea name="alamat" class="form-control" rows="4"><?=$dt_siswa['alamat']?></textarea></br>
        Kelas :
        <br><select name="id_kelas" class="form-control"> 
            <option></option>
            <?php
            include "koneksi.php";
            $qry_kelas=mysqli_query($koneksi, "select * from kelas");
            while ($data_kelas=mysqli_fetch_array($qry_kelas)){
                if($data_kelas['id_kelas']==$dt_siswa['id_kelas']){
                    $select="selected";
                } else {
                    $select="";
                }
                echo '<option value="'.$data_kelas['id_kelas'].'" '.$select.'>'.$data_kelas['nama_kelas'].'</option>';  
            }
            ?>
        </select></br>
        Username : 
        <br><input type="text" name="username" value="<?=$dt_siswa['username']?>" class="form-control"></br>
        Password : 
        <br><input type="password" name="password" value="" class="form-control"></br>
        <br>
        <input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-secondary">
        </br>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </div>
</body>
</html>