<div class="box-header with-border">
  <h3 class="box-title">Data Jenis Bantuan</h3>


</div>

<hr>
<?php 
  $q1=mysqli_query($conn, "SELECT * from jenis_bantuan where status='Di Publikasi'
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
         
      <a href="?a=daftar_penerima_bantuan&id=<?php echo $d1['id_jenis_bantuan'] ?>" class="btn btn-info btn-xs">Lihat Laporan</a>    
    </td>
  </tr>
  <?php } ?>
</table>