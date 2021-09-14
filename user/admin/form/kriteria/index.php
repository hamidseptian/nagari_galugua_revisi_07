<div class="box-header with-border">
  <h3 class="box-title">Data Kriteria</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addballroom">Tambah Kriteria</a>
  </div>
</div>

<form action="form/kriteria/simpan_kriteria.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addballroom">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kriteria</h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Kategori</label>
                  <select name="kat" class="form-control" required>
                    <?php $kat = ['Benefit','Cost'];
                    foreach ($kat as $v) { ?>
                      <option value="<?php echo $v ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Kode Kriteria</label>
                  <input type="text" name="kode" class="form-control" required>
              </div> 
              <div class="form-group">
                  <label>Nama Kriteria</label>
                  <input type="text" name="nama" class="form-control" required>
              </div> 
                <div class="form-group">
                  <label>Bobot</label>
                  <input type="text" name="bobot" class="form-control" required>
              </div> 
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Kriteria</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from kriteria
    ");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Kode Kriteria</td>
        <td>Nama Kriteria</td>
        <td>Kategori</td>
        <td>Bobot</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['kode_kriteria'] ?></td>
    <td><?php echo $d1['nama_kriteria'] ?></td>
    <td><?php echo $d1['kategori'] ?></td>
    <td><?php echo $d1['bobot'] ?></td>

    <td>
      <a href="form/kriteria/hapus_kriteria.php?id=<?php echo $d1['id_kriteria'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_kriteria&id=<?php echo $d1['id_kriteria'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>