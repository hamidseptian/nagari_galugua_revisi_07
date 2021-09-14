<?php 
include "../../../../assets/koneksi.php";

session_start();


$id = $_SESSION['id_user'];
$level = $_SESSION['level'];


$username = $_POST['username'];
$password = $_POST['password'];
$fotolama = $_POST['fotolama'];



			$ekstensi_diperbolehkan	= array('png','jpg','PNG','JPG','JPEG');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$namabaru = $level.'-'.date('ymdhis').$nama;




if ($level=='Penduduk') {
	$tabel = 'penduduk';
  $target_username = 'nik';
  $where = 'id_penduduk';
}
elseif ($level=='Mitra') {
	$tabel = 'mitra';
  $target_username = 'username';
  $where = 'id_mitra';
 
}
else{
	$tabel = 'user';
  $target_username = 'username';
  $where = 'id_user';
}




 if ($nama=='') {
 		$q1=mysqli_query($conn, "UPDATE $tabel set 
		
		$target_username='$username',
		password='$password'
		where $where='$id'
		
		
		")or die(mysqli_error()); ?>
			<script type="text/javascript">
		alert('Akun anda berhasil diperbaharui');
		window.location.href="../../";

	</script>
	<?php 
 }else{
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					move_uploaded_file($file_tmp, '../../form/dashboard/gambar/'.$namabaru);

 		$q1=mysqli_query($conn, "UPDATE $tabel set 
		
	$target_username='$username',
		password='$password',
		foto='$namabaru'
		where $where='$id'
		
		
		")or die(mysqli_error()); 
			
 		@unlink('gambar/'.$fotolama);
?>

	<script type="text/javascript">
		alert('Akun anda berhasil disimpan');
		window.location.href="../../";

	</script>
<?php }else{ ?>
	<script type="text/javascript">
		alert('Data akun gagal diperbaharui\nharap pilih file gambar dengan benar');
		window.location.href="../../?a=ukm"

	</script>
<?php } 
}?>