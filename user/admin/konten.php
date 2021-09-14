<?php 
@$menu = $_GET['a'];
if ($menu=='') {
  if ($level=='Penduduk') {
    include "form/dashboard/dashboard_penduduk.php";
  }
  elseif ($level=='Mitra') {
    include "form/dashboard/dashboard_mitra.php";
  }
  else {
    include "form/dashboard/dashboard.php";
  }
   
  // echo "Segera Aktif";
}

else if ($menu=='produk') {
  include "form/produk/index.php";
}
else if ($menu=='pengumuman_bantuan') {
  include "form/jenis_bantuan/pengumuman.php";
}
else if ($menu=='daftar_penerima_bantuan') {
  include "form/jenis_bantuan/daftar_penerima_bantuan.php";
}
else if ($menu=='edit_produk') {
  include "form/produk/edit_produk.php";
}
else if ($menu=='berita') {
  include "form/berita/data_berita.php";
}
else if ($menu=='new_berita') {
  include "form/berita/add_berita.php";
}
else if ($menu=='baca_berita') {
  include "form/berita/kelola_berita.php";
}
else if ($menu=='edit_berita') {
  include "form/berita/edit_berita.php";
}
else if ($menu=='jenis_bantuan') {
  include "form/jenis_bantuan/index.php";
}
else if ($menu=='edit_jenis_bantuan') {
  include "form/jenis_bantuan/edit_jenis_bantuan.php";
}
else if ($menu=='detail_jenis_bantuan') {
  include "form/jenis_bantuan/detail_jenis_bantuan.php";
}
else if ($menu=='penduduk') {
  include "form/penduduk/data_penduduk.php";
}
else if ($menu=='tambah_penduduk') {
  include "form/penduduk/tambah_penduduk.php";
}
else if ($menu=='edit_penduduk') {
  include "form/penduduk/edit_penduduk.php";
}

else if ($menu=='profile') {
  include "form/profile_nagari/profile.php";
}
else if ($menu=='new_profile') {
  include "form/profile_nagari/new_profile.php";
}
else if ($menu=='edit_profile') {
  include "form/profile_nagari/edit_profile.php";
}
else if ($menu=='struktur') {
  include "form/struktur/struktur_organisasi.php";
}
else if ($menu=='new_struktur') {
  include "form/struktur/new_struktur.php";
}
else if ($menu=='kk') {
  include "form/kk/data_kk.php";
}
else if ($menu=='penjualan') {
  include "form/penjualan/data_penjualan.php";
}
else if ($menu=='edit_penjualan') {
  include "form/penjualan/edit_penjualan.php";
}
else if ($menu=='edit_mitra') {
  include "form/mitra/edit_mitra.php";
}
else if ($menu=='mitra') {
  include "form/mitra/index.php";
}

else if ($menu=='tambah_kk') {
  include "form/kk/tambah_kk.php";
}
else if ($menu=='detail_kk') {
  include "form/kk/detail_kk.php";
}
else if ($menu=='perangkat_nagari') {
  include "form/perangkat_nagari/data_perangkat_nagari.php";
}
else if ($menu=='tambah_perangkat_nagari') {
  include "form/perangkat_nagari/tambah_perangkat_nagari.php";
}
else if ($menu=='edit_perangkat_nagari') {
  include "form/perangkat_nagari/edit_perangkat_nagari.php";
}
else if ($menu=='user') {
  include "form/user/data_user.php";
}
else if ($menu=='tambah_user') {
  include "form/user/tambah_user.php";
}
else if ($menu=='edit_user') {
  include "form/user/edit_user.php";
}
else if ($menu=='kriteria') {
  include "form/kriteria/index.php";
}
else if ($menu=='spk') {
  include "form/spk/index.php";
}
else if ($menu=='detail_spk') {
  include "form/spk/detail_spk.php";
}
else if ($menu=='perhitungan_spk') {
  include "form/spk/perhitungan.php";
}
else if ($menu=='alternatif_dipilih') {
  include "form/spk/alternatif_dipilih.php";
}
else if ($menu=='edit_kriteria') {
  include "form/kriteria/edit_kriteria.php";
}
else if ($menu=='edit_alternatif') {
  include "form/spk/edit_alternatif.php";
}
else if ($menu=='laporan_penduduk') {
  include "form/laporan/penduduk.php";
}
else if ($menu=='laporan_perangkat_nagari') {
  include "form/laporan/perangkat_nagari.php";
}
else if ($menu=='laporan_penerima_bantuan') {
  include "form/laporan/penerima_bantuan.php";
}
else if ($menu=='edit-akun') {
  include "form/dashboard/edit_akun.php";
}

//no fitur
else{
	echo "Fitur ini belum tersedia";
}
 ?>

