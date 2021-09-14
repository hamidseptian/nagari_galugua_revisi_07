<?php
include '../../../../assets/koneksi.php';
$no_kk=$_GET['no_kk'];
$id=$_GET['id'];

$q = mysqli_query($conn, "DELETE from detail_kk where id_detail_kk='$id'");


?>
<script type="text/javascript">
	alert('Anggota KK ditambahkan');
	window.location.href='../../?a=detail_kk&no_kk=<?php echo $no_kk ?>'
</script>