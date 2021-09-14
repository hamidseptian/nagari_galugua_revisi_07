<div class="box-header with-border">
  <h3 class="box-title">Data Jenis Bantuan</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Jenis Bantuan</a>
  </div>
</div>

<form action="form/jenis_bantuan/simpan_jenis_bantuan.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Jenis Bantuan</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Nama Bantuan</label>
                  <input type="text" name="nama" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Kategori Bantuan</label>
                  <select name="kat" class="form-control" required>
                    <?php $kat = ['Uang Tunai','Sembako'];
                    foreach ($kat as $v) { ?>
                      <option value="<?php echo $v ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Penerimaan</label>
                  <textarea name="penerimaan" class="form-control" required rows="5"></textarea>
              </div> 
                <div class="form-group">
                  <label>Banyak Penerima</label>
                  <input type="text" name="kuota" class="form-control" required>
              </div> 
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Jenis Bantuan</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from jenis_bantuan
    ");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Bantuan</td>
        <td>Kategori Bantuan</td>
        <td>Penerimaan</td>
        <td>Banyak Penerima</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['nama_jenis_bantuan'] ?></td>
    <td><?php echo $d1['kategori'] ?></td>
    <td><?php echo $d1['penerimaan'] ?></td>
    <td><?php echo $d1['kuota'] ?></td>

    <td>
         
      <a href="?a=detail_jenis_bantuan&id=<?php echo $d1['id_jenis_bantuan'] ?>" class="btn btn-info btn-xs">Detail</a>    
    </td>
  </tr>
  <?php } ?>
</table>