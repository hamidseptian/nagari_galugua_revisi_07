
<?php
include "../../../../assets/koneksi.php";


$tgl		= date('Y-m-d');
$judul			= $_POST['judul'];
$isi		= $_POST['isi'];

$q = mysqli_query($conn, "INSERT into profile set 
	judul='$judul',
	isi = '$isi'
	");

?>
<script type="text/javascript">
	alert('Profile Disimpan');
	window.location.href="../../?a=profile";
</script>