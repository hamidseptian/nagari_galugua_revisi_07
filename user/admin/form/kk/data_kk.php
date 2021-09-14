<div class="box-header with-border">
  <h3 class="box-title">
    Data KK
  </h3>
  <div class="pull-right">
  	<a href="?a=tambah_kk" class="btn btn-info btn-sm">Tambah Data KK</a>
  </div>
  
</div>



<?php



  
  $perintah="SELECT kk.no_kk, kk.id_kk, kk.no_kk, p.nama From kk kk left join penduduk p on kk.kepala_keluarga=p.nik";
  $jalan=mysqli_query($conn, $perintah);

  $total = mysqli_num_rows($jalan);
  $no=1;
?>
<table class="table table-striped table-bordered" id="example1">
	<thead>
	<tr>
		<td>No</td>
	    <td>No KK</td>
	    <td>Kepala Keluarga</td>
	    <td>Jumlah Anggota</td>
		<td>Option</td>
	</tr>
</thead>
	

<?php

while ($data=mysqli_fetch_array($jalan))
{ 
$no_kk = $data['no_kk'];
$q2 = mysqli_query($conn, "SELECT * from detail_kk where no_kk='$no_kk'");
$j2 = mysqli_num_rows($q2);

?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['no_kk'] ?></td>
		<td><?php echo $data['nama'] ?></td>
		<td><?php echo $j2 +1 ?></td>
	
	
	<td>
    <a href="?a=detail_kk&no_kk=<?php echo $data['no_kk'] ?>" class="btn btn-default btn-xs">Detail KK</a> 
    <a href="form/kk/hapus_kk.php?no_kk=<?php echo $data['no_kk'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a> 
    
	</td>
		</tr>

		<?php } ?>
				
	</table>
