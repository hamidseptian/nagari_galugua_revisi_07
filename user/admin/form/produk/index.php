<?php 
$id_mitra = $iduser; ?>
<div class="box-header with-border">
  <h3 class="box-title">Data Produk</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Produk</a>
  </div>
</div>

<form action="form/produk/simpan_produk.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Produk</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Nama Produk</label>
                  <input type="text" name="nama" class="form-control">
              </div> 
              
          
          
              <div class="form-group">
                  <label>Satuan</label>
                  <select name="satuan" required class="form-control">
                    <?php 
                    $satuan = ['Kilo'];
                    foreach ($satuan as $v) { ?>
                      <option value="<?php echo $v ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Harga / Satuan</label>
                  <input type="number" name="harga" required class="form-control" >
              </div> 
              <div class="form-group">
                  <label>Gambar Produk</label>
                  <input type="file" name="file" required>
              </div> 
              
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan Data Produk</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from produk where id_mitra='$id_mitra'");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        
        <td>Gambar</td>
        <td>Nama Produk</td>
        <td>Harga</td>
       
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    <td> <img src="form/produk/gambar/<?php echo $d1['gambar'] ?>" style="width:200px"></td>
    <td><?php echo $d1['nama_produk'] ?></td>
    <td><?php echo number_format($d1['harga']).' / '.$d1['satuan'] ?></td>
    
    <td>
      <a href="form/produk/hapus_produk.php?id=<?php echo $d1['id_produk'] ?>&gambar=<?php echo $d1['gambar'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_produk&id=<?php echo $d1['id_produk'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>