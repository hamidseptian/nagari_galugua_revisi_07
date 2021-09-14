
<?php
include "../../../../assets/koneksi.php";


$tgl		= date('Y-m-d');
$judul			= $_POST['judul'];
$isi		= $_POST['isi'];
//$judul		= $_POST[''];



$ekstensi_diperbolehkan	= array('png','jpg','jpeg');



$lokasifile=$_FILES['foto']['tmp_name'];
$foto=$_FILES['foto']['name'];
$x = explode('.', $foto);
$ekstensi = strtolower(end($x));
$ukuran=$_FILES['foto']['size'];
$namafoto=date('Ymdhis').$foto;
$folder="gambar/$namafoto";

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		if ($ukuran>1500000 or $ukuran==0) {
			
			echo "<script type='text/javascript'>
					onload =function(){
					alert('Artikel Gagal Di Publikasikan. Ukuran Gambar Terlalu Besar');
					}
					</script>";

	   echo "<meta http-equiv='refresh' content='0; url=http:../../index.php?a=berita'>";

		}
		else
		{
		$upload=move_uploaded_file($lokasifile, $folder);
		$sql = "insert into berita (judul_berita, tanggal, isi_berita,  gambar)
		 values('$judul','$tgl', '$isi', '$namafoto')";
		$result	= mysqli_query($conn, $sql);
			if($result){
			    echo "<script type='text/javascript'>
			   		alert('Berita Telah Di Publikasikan');
				    </script>";

			    echo "<meta http-equiv='refresh' content='0; url=http:../../index.php?a=berita'>";
				}
			else{
				echo "<script type='text/javascript'>
					onload =function(){
					alert('Berita Gagal Dipublikasikan!');
					}
					</script>";
				}
		}
	}
else {
	echo "<script type='text/javascript'>
	onload =function(){	alert('Berita Gagal Di Publikasikan. Extensi File Tidak Di Perbolehkan');
	}
	</script>";
	echo "<meta http-equiv='refresh' content='0; url=http:../../index.php?a=berita'>";
}




// ?>