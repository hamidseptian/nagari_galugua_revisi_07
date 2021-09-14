<?php
include '../../../../assets/koneksi.php';
$id=$_GET['id'];





$sql="DELETE from perangkat_nagari where id_pn='$id'";
$result=mysqli_query($conn, $sql) or die ('GAGAL');
?>
<script type="text/javascript">
	alert('Data perangkat nagari dihapus');
	window.location.href='../../?a=perangkat_nagari'
</script>