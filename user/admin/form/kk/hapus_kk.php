<?php
include '../../../../assets/koneksi.php';
$no_kk=$_GET['no_kk'];





$sql="DELETE from kk where no_kk='$no_kk'";
$sql2="DELETE from detail_kk where no_kk='$no_kk'";

$result=mysqli_query($conn, $sql) or die ('GAGAL');
$result2=mysqli_query($conn, $sql2) or die ('GAGAL');
?>
<script type="text/javascript">
	alert('Data kk dihapus');
	window.location.href='../../?a=kk'
</script>