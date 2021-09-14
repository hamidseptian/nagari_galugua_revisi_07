
<?php
include "../../../../assets/koneksi.php";


$tgl		= date('Y-m-d');
$judul			= $_POST['judul'];
$isi		= $_POST['isi'];
$id		= $_POST['id'];

$q = mysqli_query($conn, "UPDATE profile set 
	judul='$judul',
	isi = '$isi'
	where id_profile='$id'
	");

?>
<script type="text/javascript">
	alert('Profile diperbaharui');
	window.location.href="../../?a=profile";
</script>