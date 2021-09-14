<?php 
include "../../../../assets/koneksi.php";

$nama=$_POST['nama'];
$kat=$_POST['kat'];
$bobot=$_POST['bobot'];
$kode=$_POST['kode'];
$id_jenis_bantuan=$_POST['id_jenis_bantuan'];
	$q1=mysqli_query($conn, "INSERT into kriteria set 
		
		
		 id_jenis_bantuan = '$id_jenis_bantuan',
		 nama_kriteria='$nama',
		 kode_kriteria='$kode',
		 kategori='$kat',
		 bobot='$bobot'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data kriteria berhasil disimpan');
		window.location.href="../../?a=detail_jenis_bantuan&id=<?php echo $id_jenis_bantuan ?>"

	</script>
