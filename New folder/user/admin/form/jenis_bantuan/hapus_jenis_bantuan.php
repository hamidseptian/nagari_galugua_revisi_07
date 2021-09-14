
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "DELETE from jenis_bantuan where id_jenis_bantuan='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data jenis bantuan dihapus');
		window.location.href="../../?a=jenis_bantuan"

	</script>