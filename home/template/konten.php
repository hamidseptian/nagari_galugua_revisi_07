<?php 
$menu = $_GET['h'];

if ($menu=='daftar_penduduk'){ 
	include "form/penduduk/tambah_penduduk.php";
}
elseif ($menu=='daftar_mitra'){ 
	include "form/mitra/tambah_mitra.php";
}
elseif ($menu=='profile'){ 
	include "form/profile/profile.php";
}
elseif ($menu=='struktur_organisasi'){ 
	include "form/profile/struktur_organisasi.php";
}
elseif ($menu=='visi_misi'){ 
	include "form/profile/visi_misi.php";
}
elseif ($menu=='berita'){ 
	include "form/berita/berita.php";
}
elseif ($menu=='baca_berita'){ 
	include "form/berita/baca_berita.php";
}
elseif ($menu=='pengumuman'){ 
	include "form/pengumuman/pengumuman.php";
}
elseif ($menu=='produk'){ 
	include "form/produk/produk.php";
}
elseif ($menu=='login'){ 
	//include "form/produk/produk.php";
}
else 
{
	echo "Fitur belum tersedia";
}

 ?>