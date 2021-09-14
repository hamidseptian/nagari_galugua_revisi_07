<?php
include "../../../../assets/koneksi.php";
$id=$_GET['id'];
$sql="delete from berita where id_berita='$id'";
$result=mysqli_query($conn, $sql) or die ('GAGAL');


$foto=$_POST['foto'];
@unlink("gambar/$foto");


 if($result){
		echo "<script type='text/javascript'>
			alert('Berita telah dihapus..!!');
		</script>";
		echo "<meta http-equiv='refresh' content='0;
	url=../../index.php?a=berita'>";
	}else{
	echo "<script type='text/javascript'>
		onload =function(){
		alert('Data Gagal Didelete!');
		}
		</script>";
	}
?>

