<?php 
include "../../../../assets/koneksi.php";

$nama=$_POST['nama'];
$kat=$_POST['kat'];
$kuota=$_POST['kuota'];
$penerimaan=nl2br($_POST['penerimaan']);
	$q1=mysqli_query($conn, "INSERT into jenis_bantuan set 
		
		
		  
		 nama_jenis_bantuan='$nama',
		 kategori='$kat',
		 penerimaan='$penerimaan',
		 kuota = '$kuota',
		 status='Penetapan'

		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data bantuan berhasil disimpan');
		window.location.href="../../?a=jenis_bantuan"

	</script>
