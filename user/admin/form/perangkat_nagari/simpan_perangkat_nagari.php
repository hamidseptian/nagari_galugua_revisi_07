<?php
session_start();

include "../../../../assets/koneksi.php";

$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$hp		= $_POST['hp'];
$tp		= $_POST['tp'];
$jab		= $_POST['jab'];

$sql = "INSERT into perangkat_nagari set 
nama='$nama',
alamat='$alamat',
nohp='$hp',
lokasi_tugas='$tp',
jabatan ='$jab'
";
mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type='text/javascript'>
	alert('Data perangkat nagari berhasil disimpan');
	window.location.href="../../index.php?a=perangkat_nagari"
</script>