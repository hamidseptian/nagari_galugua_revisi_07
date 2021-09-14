<div class="box-header with-border">
  <h3 class="box-title">
    Data Perangkat Nagari
  </h3>
  <div class="pull-right">
  	<a href="?a=tambah_perangkat_nagari" class="btn btn-info btn-sm">Tambah Data Perangkat Nagari</a>
  </div>
  
</div>



<?php
  $perintah="SELECT * From perangkat_nagari";
  $jalan=mysqli_query($conn, $perintah);

  $total = mysqli_num_rows($jalan);
  $no=1;
?>
<table class="table table-striped table-bordered" id="example1">
	<thead>
	<tr>
		<td>No</td>
	    <td>Nama</td>
	    <td>Alamat</td>
	    <td>No HP</td>
	    <td>Jabatan</td>
	    <td>Tugas Pekerjaan</td>
		
		<td>Option</td>
	</tr>
</thead>
	

<?php

while ($data=mysqli_fetch_array($jalan))
{ 


?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['nama'] ?></td>
		<td>
			<?php echo $data['alamat'] ?>
		</td>
		<td><?php echo $data['nohp'] ?></td>
		<td><?php echo $data['jabatan'] ?></td>
		<td><?php echo $data['lokasi_tugas'] ?></td>
	
	<td>
    <a href="?a=edit_perangkat_nagari&id=<?php echo $data['id_pn'] ?>" class="btn btn-info btn-xs">Edit</a> 
    <a href="form/perangkat_nagari/hapus_perangkat_nagari.php?id=<?php echo $data['id_pn'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a> 
    
	</td>
		</tr>

		<?php } ?>
				
	</table>
