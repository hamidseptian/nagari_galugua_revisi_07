
<?php 
include "../../../../assets/koneksi.php";
$id_alternatif=$_GET['id_alternatif'];
$id_penduduk=$_GET['id_penduduk'];
$id_jenis_bantuan=$_GET['id_jenis_bantuan'];

	$q1=mysqli_query($conn, "DELETE from alternatif where id_alternatif='$id_alternatif'") or die(mysqli_error()); 
	$q1=mysqli_query($conn, "DELETE from nilai_alternatif where id_penduduk='$id_penduduk' and id_jenis_bantuan='$id_jenis_bantuan'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data alternatif dihapus');
		window.location.href="../../?a=detail_jenis_bantuan&id=<?php echo $id_jenis_bantuan ?>"

	</script>