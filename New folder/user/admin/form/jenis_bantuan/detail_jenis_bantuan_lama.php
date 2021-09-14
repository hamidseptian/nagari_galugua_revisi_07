

<?php 
$id=$_GET['id'];
  $q1=mysqli_query($conn, "SELECT * from jenis_bantuan where id_jenis_bantuan='$id'") or die(mysqli_error());
  $d1=mysqli_fetch_array($q1);
  $j1=mysqli_num_rows($q1);
 ?>




<div class="col-md-6">
   <div class="box-header with-border">
      <h3 class="box-title">
        Detail Bantuan 

      </h3>
    </div>
    <div class="box-body">
        <table class="table">
          <tr>
            <td>Kategori</td>
            <td>:</td>
            <td><?php echo $d1['kategori'] ?></td>
          </tr>
          <tr>
            <td>Bantuan</td>
            <td>:</td>
            <td><?php echo $d1['nama_jenis_bantuan'] ?></td>
          </tr>
          <tr>
            <td>Keterangan Bantuan</td>
            <td>:</td>
            <td><?php echo $d1['penerimaan'] ?></td>
          </tr>
          <tr>
            <td>Banyak Penerima</td>
            <td>:</td>
            <td><?php echo $d1['kuota'] ?></td>
          </tr>
        </table>
    </div>
    <hr>
   <div class="box-header with-border">
      <h3 class="box-title">
        Kriteria Penerima Bantuan 
      </h3>
      <div class="pull-right">
        <a href="" class=" btn btn-info btn-xs"  data-toggle="modal" data-target="#addkriteria">Tambah Kriteria</a>






<form action="form/kriteria/simpan_kriteria.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addkriteria">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kriteria Penerima Bantuan <?php echo $d1['nama_jenis_bantuan'] ?></h4>
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
                  <input type="hidden" name="id_jenis_bantuan" class="form-control" required value="<?php echo $id ?>">
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





      </div>
    </div>
    <div class="box-body">
        <table class="table">
          <tr>
            <td>Kode</td>
            <td>Ktiteria</td>
            <td>Type</td>
            <td>Bobot</td>
          </tr>
          <?php $q_kriteria = mysqli_query($conn, "SELECT * from kriteria where id_jenis_bantuan='$id'");
          while ($d_kriteria = mysqli_fetch_array($q_kriteria)) { ?>
          <tr>
            <td><?php echo $d_kriteria['kode_kriteria'] ?></td>
            <td><?php echo $d_kriteria['nama_kriteria'] ?></td>
            <td><?php echo $d_kriteria['kategori'] ?></td>
            <td><?php echo $d_kriteria['bobot'] ?></td>
          </tr>
           <?php } ?>
         
        </table>
    </div>



</div>
<div class="col-md-8">
  <div class="box-header with-border">
    <h3 class="box-title">
      Data Siswa 

    </h3>
    <div class="pull-right">
      <a href="form/kelas/print_siswa_perkelas.php?id_kelas=<?php echo  $id ?>&id_ta=<?php echo $id_ta ?>" class=" btn btn-default btn-xs" target="_blank">Print Siswa Kelas <?php echo $d1['nama_kelas'] ?></a>
      <a href="" class=" btn btn-info btn-xs"  data-toggle="modal" data-target="#addsiswa">Pilih Siswa Untuk Kelas <?php echo $d1['nama_kelas'] ?></a>
    </div>
    
  </div>

  <table class="table table-striped table-bordered" id="example1">
    <thead>
    <tr>
      <td>No</td>
      <td>NIS</td>
      <td>NISN</td>
      <td>Nama</td>
      <td>Option</td>
    </tr>
  </thead>
    

  <?php
$mapel = mysqli_query($conn, "SELECT ks.*, s.nama_siswa, s.nis, s.nisn from kelas_siswa ks
left join siswa s on ks.id_siswa = s.id_siswa where ks.id_kelas='$id' and ks.status_ks='Aktif' and ks.id_ta='$id_ta' order by s.nama_siswa asc");
  while ($data=mysqli_fetch_array($mapel))
  { 

  ?>
    <tr>
      <td><?php echo $no++; ?></td>
    

      
    
    <td><?php echo $data['nis']; ?></td>
    <td><?php echo $data['nisn']; ?></td>
    <td><?php echo $data['nama_siswa']; ?></td>
   
    
    <td>
      
      <a href="form/kelas/hapus_siswa.php?id=<?php echo $data['id_ks'] ?>&id_kelas=<?php echo $id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus <?php echo $data['nama_siswa'] ?> dari kelas <?php echo $d1['nama_kelas'] ?>..?')">Hapus</a> 
    </td>
      </tr>

      <?php } ?>
          
    </table>
</div>