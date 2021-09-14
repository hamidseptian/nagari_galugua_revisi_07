<?php 
include "../../../../assets/koneksi.php";

session_start();
$id = $_POST['id'];
$filelama = $_POST['filelama'];
			$ekstensi_diperbolehkan	= array('png','jpg','PNG','JPG','JPEG');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$namabaru = date('ymdhis').$nama;
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, '../../form/struktur/gambar/'.$namabaru);


	 		unlink('gambar/'.$filelama);
	$q1=mysqli_query($conn, "UPDATE struktur_organisasi set 

		file='$namabaru'
		where id_struktur = '$id'
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data struktur berhasil diperbaharui');
		window.location.href="../../?a=struktur"

	</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert('Data struktur gagal disimpan\nharap pilih file gambar dengan benar');
		window.location.href="../../?a=produk"

	</script>
<?php } ?>