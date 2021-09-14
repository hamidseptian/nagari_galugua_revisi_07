<?php 
include "../../../../assets/koneksi.php";

$id=$_POST['id'];
$nama=$_POST['nama'];
$nilai=$_POST['nilai'];
$id_jenis_bantuan=$_POST['id_jenis_bantuan'];
	$q1=mysqli_query($conn, "UPDATE pilihan_nilai_alternatif set 
		
		
		 nama_pilihan = '$nama',
		 nilai  = '$nilai'
		 where id_pilihan='$id'
		 
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data pilihan alternatif berhasil disimpan');
		window.location.href="../../?a=detail_jenis_bantuan&id=<?php echo $id_jenis_bantuan ?>"

	</script>
