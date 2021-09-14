<div class="box-header with-border">
  <h3 class="box-title">Edit Data Penjualan</h3>

  <div class="box-tools pull-right">
    <a href="?a=produk" class="btn btn-info" >Kembali</a>
  </div>
</div>


<?php 
$id=$_GET['id'];
$id_mitra = $iduser;
  $q1=mysqli_query($conn, "SELECT * from penjualan where id_penjualan='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>

<br>

<form action="form/penjualan/simpanedit_penjualan.php" method="post" enctype="multipart/form-data">
  <div class="col-md-12">
    
              
                  <input type="hidden" name="id" class="form-control" value="<?php echo $d1['id_penjualan'] ?>">
              <div class="form-group">
                  <label>Produk</label>
                  <select name="produk" class="form-control">
                    <?php $q_produk = mysqli_query($conn, "SELECT * from produk where id_mitra='$id_mitra'");
                    while ($d_produk = mysqli_fetch_array($q_produk)) { ?>
                      <option value="<?php echo $d_produk['id_produk'] ?>"><?php echo $d_produk['nama_produk'] ?></option>
                     <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" name="qty" class="form-control" required value="<?php echo $d1['qty'] ?>">
              </div> 
              <div class="form-group">
                  <label>Tanggal Transaksi</label>
                  <input type="date" name="tgl" class="form-control" required value="<?php echo $d1['tanggal_transaksi'] ?>">
              </div> 

             
              <div class="form-group">
                 <input type="submit" class="btn btn-info" onclick="return confirm('apakah data yang anda masukan sudah benar.?')" value="Simpan Perubahan Data">
              </div> 

  </div>
             


              
          
</form>