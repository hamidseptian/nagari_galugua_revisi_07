<div class="box-header with-border">
  <h3 class="box-title">Sistem Penunjang Keputusan <br>Berdasarkan Jenis Bantuan</h3>

  <div class="box-tools pull-right">
    
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
  $q1=mysqli_query($conn, "SELECT * from jenis_bantuan
    ");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Jenis Bantuan</td>
        <td>Kategori Bantuan</td>
        <td>Keterangan</td>
        <td>Banyak Penerima</td>
        <td>Banyak Alternatif</td>
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    $id_jb = $d1['id_jenis_bantuan'];
    $q_alt = mysqli_query($conn,"SELECT * from alternatif where id_jenis_bantuan='$id_jb'");
    $j_alt = mysqli_num_rows($q_alt);
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
  
    
    <td><?php echo $d1['nama_jenis_bantuan'] ?></td>
    <td><?php echo $d1['kategori'] ?></td>
    <td><?php echo $d1['penerimaan'] ?></td>
    <td><?php echo $d1['kuota'] ?></td>
    <td><?php echo $j_alt ?></td>

    <td>
      <a href="?a=detail_spk&id=<?php echo $d1['id_jenis_bantuan'] ?>" class="btn btn-info btn-xs">Detail</a>    
    </td>
  </tr>
  <?php } ?>
</table>