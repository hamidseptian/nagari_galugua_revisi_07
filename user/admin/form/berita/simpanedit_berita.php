
<?php
include "../../../../assets/koneksi.php";



$id		= $_POST['id'];
$judul		= $_POST['judul'];
$isi		= $_POST['isi'];
$tgls = date('Y-m-d');

	$ekstensi_diperbolehkan	= array('png','jpg','PNG','JPG','JPEG');
			$namafile = $_FILES['file']['name'];
			$x = explode('.', $namafile);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$namafilebaru = date('ymdhis').$namafile;
 if ($namafile) {
 	







 		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, 'gambar/'.$namafilebaru);

$sql = "UPDATE berita set
judul_berita='$judul',
tanggal='$tgls',
isi_berita='$isi',
gambar='$namafilebaru'
where id_berita='$id'
";


mysqli_query($conn, $sql)or die(mysqli_error());
@unlink('gambar/'.$fotolama);
?>
<script type='text/javascript'>
	alert('Data berita berhasil diperbaharui');
	window.location.href="../../index.php?a=berita"
</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert('berita gagal diperbaharui\nharap pilih file gambar dengan benar');
		window.location.href="../../?a=edit_berita&id=<?php echo $id ?>"

	</script>
<?php } ?>




<?php }else{
 $sql = "UPDATE berita set
judul_berita='$judul',
tanggal='$tgls',
isi_berita='$isi'
where id_berita='$id'
";

mysqli_query($conn, $sql)or die(mysqli_error());
?>
<script type='text/javascript'>
	alert('Data berita berhasil diperbaharui');
	window.location.href="../../index.php?a=berita"
</script>
<?php 
 } ?>
