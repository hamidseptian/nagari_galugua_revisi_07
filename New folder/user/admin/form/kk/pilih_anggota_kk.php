<?php
include '../../../../assets/koneksi.php';
$no_kk=$_GET['no_kk'];
$nik=$_GET['nik'];

$q = mysqli_query($conn, "INSERT into detail_kk set 
	no_kk='$no_kk',
	nik = '$nik'
	");


?>
<script type="text/javascript">
	alert('Anggota KK ditambahkan');
	window.location.href='../../?a=detail_kk&no_kk=<?php echo $no_kk ?>'
</script>