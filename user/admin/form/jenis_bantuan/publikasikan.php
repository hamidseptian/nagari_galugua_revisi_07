
<?php 
include "../../../../assets/koneksi.php";
$id=$_GET['id'];

	$q1=mysqli_query($conn, "UPDATE jenis_bantuan set status='Di Publikasi' where id_jenis_bantuan='$id'") or die(mysqli_error()); 
	
?>

	<script type="text/javascript">
		alert('Data bantuan di publikasikan');
		window.location.href="../../?a=perhitungan_spk&id=<?php echo $id ?>"

	</script>