
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$id_jenis_bantuan=$_GET['id_jenis_bantuan'];

	$q1=mysqli_query($conn, "DELETE from pilihan_nilai_alternatif where id_pilihan='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data pilihan alternatif dihapus');
		window.location.href="../../?a=detail_jenis_bantuan&id=<?php echo $id_jenis_bantuan ?>"

	</script>