<?php
session_start();

include "../../../../assets/koneksi.php";
$nik		= $_POST['nik'];
// 	echo $nik;
$sql = mysqli_query($conn, "SELECT * from penduduk where nik='$nik'");

$j = mysqli_num_rows($sql);
$d = mysqli_fetch_array($sql);
?>
<table class="table">
	<tr>
		<td>NIK</td>
		<td><?php echo $d['nik'] ?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><?php echo $d['nama'] ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>
			<?php echo $d['alamat'] ?><br>
			RT : <?php echo $d['rt'] ?><br>
			RW : <?php echo $d['rw'] ?><br>
			Kelurahan : <?php echo $d['kelurahan'] ?><br>
			Kecamatan : <?php echo $d['kecamatan'] ?><br>
			
		</td>
	</tr>
	<tr>
		<td>Agama</td>
		<td><?php echo $d['agama'] ?></td>
	</tr>
	<tr>
		<td>Pekerjaan</td>
		<td><?php echo $d['pekerjaan'] ?></td>
	</tr>
	
</table>