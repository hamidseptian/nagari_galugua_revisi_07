<?php 
include "../../../../assets/koneksi.php";

$nama=$_POST['nama'];
$id_kriteria=$_POST['id_kriteria'];
$nilai=$_POST['nilai'];
$id_jenis_bantuan=$_POST['id_jenis_bantuan'];
	$q1=mysqli_query($conn, "INSERT into pilihan_nilai_alternatif set 
		
		
		  id_kriteria = '$id_kriteria',
		 nama_pilihan = '$nama',
		 nilai  = '$nilai'
		 
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data pilihan alternatif berhasil disimpan');
		window.location.href="../../?a=detail_jenis_bantuan&id=<?php echo $id_jenis_bantuan ?>"

	</script>
