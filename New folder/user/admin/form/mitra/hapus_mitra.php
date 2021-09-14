<?php
include '../../../../assets/koneksi.php';
$id=$_GET['id'];

$result=mysqli_query($conn, "DELETE from mitra where id_mitra='$id'") or die ('GAGAL');;
$result=mysqli_query($conn, "DELETE from produk where id_mitra='$id'") or die ('GAGAL');;
$result=mysqli_query($conn, "DELETE from penjualan where id_mitra='$id'") or die ('GAGAL');;
?>
<script type="text/javascript">
	alert('Data mitra dihapus');
	window.location.href='../../?a=mitra'
</script>