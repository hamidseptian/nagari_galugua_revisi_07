<?php 
include "../../../../assets/koneksi.php";

$id=$_POST['id'];
$nama=$_POST['nama'];

$kat=$_POST['kat'];
$kuota=$_POST['kuota'];
$penerimaan=nl2br($_POST['penerimaan']);

	$q1=mysqli_query($conn, "UPDATE jenis_bantuan set 
		
		
 		 nama_jenis_bantuan='$nama',
		 kategori='$kat',
		 penerimaan='$penerimaan',
		 kuota='$kuota'
		 where id_jenis_bantuan = '$id'
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data bantuan  berhasil diperbaharui');
		window.location.href="../../?a=detail_jenis_bantuan&id=<?php echo $id ?>"

	</script>
