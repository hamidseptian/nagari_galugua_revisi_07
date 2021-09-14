<div class="box-header with-border">
  <h3 class="box-title">Edit Data Bantuan</h3>

  <div class="box-tools pull-right">
    <a href="?a=jenis_bantuan" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from jenis_bantuan where id_jenis_bantuan='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/jenis_bantuan/simpanedit_jenis_bantuan.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_jenis_bantuan'] ?>">
                
              <div class="form-group">
                  <label>Nama Bantuan</label>
                  <input type="text" name="nama" class="form-control" required value="<?php echo $d1['nama_jenis_bantuan'] ?>">
              </div>
                <div class="form-group">
                  <label>Kategori Bantuan</label>
                  <select name="kat" class="form-control" required>
                    <?php $kat = ['Uang Tunai','Sembako'];
                    foreach ($kat as $v) { ?>
                      <option value="<?php echo $v ?>" <?php if($v==$d1['kategori']){echo "selected";} ?>><?php echo $v ?></option>
                    <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Penerimaan</label>
                  <textarea name="penerimaan" class="form-control" required rows="5"><?php echo str_replace('<br />', '', $d1['penerimaan']) ?></textarea>
              </div>        
              <div class="form-group">
                  <label>Banyak Penerima</label>
                  <input type="text" name="kuota" class="form-control" required value="<?php echo $d1['kuota'] ?>">
              </div>       


              <div class="form-group">
                 <input type="submit" class="btn btn-info"  value="Simpan Perubahan Data">
              </div> 

              
          
</form>