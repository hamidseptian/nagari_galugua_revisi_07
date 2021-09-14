<?php
session_start();

include "../../../../assets/koneksi.php";
$nik		= $_POST['nik'];
$no_kk		= $_POST['no_kk'];

$sql = "INSERT into kk set 
kepala_keluarga='$nik',
no_kk = '$no_kk'
";
mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type='text/javascript'>
	alert('Data kk berhasil disimpan');
	window.location.href="../../index.php?a=kk"
</script>