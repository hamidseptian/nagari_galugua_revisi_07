<?php $id_mitra = $iduser; ?>
<div class="box-header with-border">
  <h3 class="box-title">Data penjualan</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Penjualan</a>
  </div>
</div>

<form action="form/penjualan/simpan_penjualan.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah penjualan</h4>
              </div>
              <div class="modal-body">
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
                  <input type="number" name="qty" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Tanggal Transaksi</label>
                  <input type="date" name="tgl" class="form-control" required>
              </div> 
              
              
          
          
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Penjualan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 

  $q1=mysqli_query($conn, "SELECT * from penjualan where id_mitra='$id_mitra'");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Tanggal Transaksi</td>
        <td>Produk</td>
        <td>Qty</td>
        <td>Harga</td>
        <td>Total</td>
       
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    <td><?php echo $d1['tanggal_transaksi'] ?></td>
    <td><?php echo $d1['produk'] ?></td>
    <td><?php echo number_format($d1['qty']).'  '.$d1['satuan'] ?></td>
    <td><?php echo number_format($d1['harga_satuan'])?></td>
    <td><?php echo number_format($d1['qty'] * $d1['harga_satuan'])?></td>
    
    <td>
      <a href="form/penjualan/hapus_penjualan.php?id=<?php echo $d1['id_penjualan'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_penjualan&id=<?php echo $d1['id_penjualan'] ?>" class="btn btn-default btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>