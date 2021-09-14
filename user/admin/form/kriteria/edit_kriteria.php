<div class="box-header with-border">
  <h3 class="box-title">Edit Data Kriteria</h3>

  <div class="box-tools pull-right">
    <a href="?a=kriteria" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from kriteria where id_kriteria='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/kriteria/simpanedit_kriteria.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_kriteria'] ?>">
               <div class="form-group">
                  <label>Kategori Kriteria</label>
                  <select name="kat" class="form-control" required>
                    <?php $kat = ['Benefit','Cost'];
                    foreach ($kat as $v) { ?>
                      <option value="<?php echo $v ?>" <?php if($v==$d1['kategori']){echo "selected";} ?>><?php echo $v ?></option>
                    <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Nama Kriteria</label>
                  <input type="text" name="nama" class="form-control" required value="<?php echo $d1['nama_kriteria'] ?>">
              </div>
              <div class="form-group">
                  <label>Kode Kriteria</label>
                  <input type="text" name="kode" class="form-control" required value="<?php echo $d1['kode_kriteria'] ?>">
              </div>
                   
              <div class="form-group">
                  <label>Bobot</label>
                  <input type="text" name="bobot" class="form-control" required value="<?php echo $d1['bobot'] ?>">
              </div>       


              <div class="form-group">
                 <input type="submit" class="btn btn-info"  value="Simpan Perubahan Data">
              </div> 

              
          
</form>