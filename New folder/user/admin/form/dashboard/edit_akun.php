<div class="box-header with-border">
  <h3 class="box-title">Edit Akun</h3>

  <div class="box-tools pull-right">
    <a href="?a=produk" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$iduser = $_SESSION['id_user'];
$level = $_SESSION['level'];




if ($level=='Penduduk') {
  $quser = mysqli_query($conn, "SELECT * from penduduk where id_penduduk='$iduser'")or die(mysqli_error());
  $duser = mysqli_fetch_array($quser);
  $username=$duser['nik'];
  $password=$duser['password'];
  $gambar = $duser['foto'];
}
elseif ($level=='Mitra') {
  $quser = mysqli_query($conn, "SELECT * from mitra where id_mitra='$iduser'")or die(mysqli_error());
  $duser = mysqli_fetch_array($quser);
  $username=$duser['username'];
  $password=$duser['password'];
  $gambar = $duser['foto'];
}
else{
  $quser = mysqli_query($conn, "SELECT * from user where id_user='$iduser'")or die(mysqli_error());
  $duser = mysqli_fetch_array($quser);
  $username=$duser['username'];
  $password=$duser['password'];
  $gambar = $duser['foto'];
}


if ($gambar=='') {
  $img = "../../assets/user.jpg";
  # code...
}else{
  $img = "form/dashboard/gambar/".$gambar;
}
 ?>

<br>

<form action="form/dashboard/simpanedit_akun.php" method="post" enctype="multipart/form-data">
  <div class="col-md-5">
     <img src="<?php echo $img ?>" style="width:100%">

  </div>
  <div class="col-md-7">
    
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
                  <input type="hidden" name="fotolama" class="form-control" value="<?php echo $gambar ?>">
              </div> 
              
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" required class="form-control" value="<?php echo $password ?>">
              </div> 
              
              <div class="form-group">
                  <label>Foto Profile</label>
                  <input type="file" name="file">
              </div> 

             
              <div class="form-group">
                 <input type="submit" class="btn btn-info" onclick="return confirm('apakah data yang anda masukan sudah benar.?')" value="Simpan Perubahan Data">
              </div> 

  </div>
             


              
          
</form>