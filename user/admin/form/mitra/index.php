
<div class="box-header with-border">
  <h3 class="box-title">Data Mitra</h3>

  <div class="box-tools pull-right">
    <!-- <a href="" class="btn btn-default btn-sm"  target="_blank">Print Data Paket</a> -->
  </div>
</div>

<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from mitra");
  $no=1;
 ?>

 <table class="table table-striped table-bordered" id="example1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Mitra</td>
        <td>Pemilik</td>
        <td>Alamat</td>
        <td>No HP</td>
        <!-- <td>No </td> -->
       
        <td>Option</td>
      </tr>
    </thead>
  <?php 
  while ($d1=mysqli_fetch_array($q1)) { 
    ?>
  <tr>
    <td><?php echo $no++ ?></td>
   
    <td><?php echo $d1['nama_toko'] ?></td>
    <td><?php echo $d1['pemilik_toko'] ?></td>
    <td><?php echo $d1['alamat_toko'] ?></td>
    <td><?php echo $d1['nohp_toko'] ?></td>
    <td>
      <a href="form/mitra/hapus_mitra.php?id=<?php echo $d1['id_mitra'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="?a=edit_mitra&id=<?php echo $d1['id_mitra'] ?>" class="btn btn-warning btn-xs">Edit</a>    
    </td>
  </tr>
  <?php } ?>
</table>