<?php 
include "../../../../assets/koneksi.php";
$id_penduduk=$_POST['id_penduduk'];
$id_jenis_bantuan=$_POST['id_jenis_bantuan'];


$q_kriteria = mysqli_query($conn, "SELECT * from kriteria where id_jenis_bantuan='$id_jenis_bantuan'");
				$j_kriteria = mysqli_num_rows($q_kriteria);
				$tampung_kriteria = [];
					while ($d_kriteria = mysqli_fetch_array($q_kriteria)) {
						$dt['id_kriteria'] = $d_kriteria['id_kriteria'];
						$dt['kode'] = $d_kriteria['kode_kriteria'];
						$dt['nama'] = $d_kriteria['nama_kriteria'];
						array_push($tampung_kriteria, $dt);

					}



$q = mysqli_query($conn, "INSERT into alternatif set 
	id_jenis_bantuan = '$id_jenis_bantuan',
	id_penduduk='$id_penduduk'
	");

foreach ($tampung_kriteria as $key => $value) {
	$id_kriteria = $value['id_kriteria'];
	$nilai = $_POST[$id_kriteria];
	$id_pilihan = $nilai;
	$q_pilihan = mysqli_query($conn, "SELECT * from pilihan_nilai_alternatif where id_pilihan='$id_pilihan'");
	$d_pilihan = mysqli_fetch_array($q_pilihan);
	$nilai = $d_pilihan['nilai'];
	$nama_pilihan = $d_pilihan['nama_pilihan'];


	$q1=mysqli_query($conn, "INSERT into nilai_alternatif set 
		
		
		  
		 id_penduduk='$id_penduduk',
		 id_jenis_bantuan='$id_jenis_bantuan',
		 id_kriteria='$id_kriteria',
		 nilai='$nilai',
		 id_pilihan='$id_pilihan',
		 keterangan='$nama_pilihan'
		")or die(mysqli_error()); 
}
?>

	<script type="text/javascript">
		alert('Data kriteria berhasil disimpan');
		window.location.href="../../?a=detail_jenis_bantuan&id=<?php echo $id_jenis_bantuan ?>"

	</script>
