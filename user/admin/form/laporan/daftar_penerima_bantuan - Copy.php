<?php
$id = $_GET['id'];
$qjb = mysqli_query($conn, "SELECT * from jenis_bantuan where id_jenis_bantuan='$id'");
$djb = mysqli_fetch_array($qjb);
$kuota = $djb['kuota'];

$q_alternatif = mysqli_query($conn, "SELECT * from alternatif a
	left join penduduk p on a.id_penduduk=p.id_penduduk where a.id_jenis_bantuan = '$id'");

$id_penduduk_aktif = $_SESSION['id_user'];

// $q_identitas_penduduk = mysqli_query($conn, "SELECT * from penduduk where id_penduduk='$id_penduduk_aktif'");
// $d_identitas_penduduk = mysqli_fetch_array($q_identitas_penduduk);

$tampung_alternatif = [];
while ($d_alt=mysqli_fetch_array($q_alternatif))
{ 
	$data = [
		'nik' =>$d_alt['nik'],
		'id_penduduk' =>$d_alt['id_penduduk'],
		'nama' =>$d_alt['nama'],
		'tmpl' =>$d_alt['tmpl'],
		'jk' =>$d_alt['jk'],
		'tgll' =>$d_alt['tgll'],
		'alamat' =>$d_alt['alamat'],
		'pekerjaan' =>$d_alt['pekerjaan'],
		'id_alternatif' =>$d_alt['id_alternatif'],
	];
	array_push($tampung_alternatif, $data);
}


$jkk = mysqli_num_rows($q_alternatif);
  $no=1;
  $no2=1;


$q_kriteria = mysqli_query($conn, "SELECT * from kriteria where id_jenis_bantuan='$id'");
$j_kriteria = mysqli_num_rows($q_kriteria);
$tampung_kriteria = [];
 ?>




	<div class="box-header with-border">
	  <h3 class="box-title">
	    Detail Penerima Bantuan
	  </h3>

	  <div class="pull-right">
                    
	  	  <!-- <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#pilih_alternatif">Pilih Kepala Keluarga</a> -->
       
      <a href="?a=pengumuman_bantuan" class="btn btn-info btn-xs">Kembali</a> 
                    
	  </div>
	 
	  
	</div>

	<div class="box-body">
		<div class="col-md-6">
				<label>Identitas Bantuan</label>
			 <table class="table">
			 	<tr>
			 		<td>Jenis Bantuan</td>
			 		<td>:</td>
			 		<td><?php echo $djb['nama_jenis_bantuan'] ?></td>
			 	</tr>
			 	<tr>
			 		<td>Kategori Bantuan</td>
			 		<td>:</td>
			 		<td><?php echo $djb['kategori'] ?></td>
			 	</tr>
			 	<tr>
			 		<td>Keterangan</td>
			 		<td>:</td>
			 		<td><?php echo $djb['penerimaan'] ?></td>
			 	</tr>
			 	<tr>
			 		<td>Bantak Kuota Penerima</td>
			 		<td>:</td>
			 		<td><?php echo $djb['kuota'];?></td>
			 	</tr>
			 	<tr>
			 		<td>Banyak Alternatif</td>
			 		<td>:</td>
			 		<td><?php echo $jkk ?></td>
			 	</tr>
			 </table>
			</div>
			<div class="clearfix"></div>
	</div>

		

			 	
<?php 
while ($d_kriteria = mysqli_fetch_array($q_kriteria)) { 
	$d['id_kriteria'] = $d_kriteria['id_kriteria'];
	$d['kode'] = $d_kriteria['kode_kriteria'];
	$d['nama'] = $d_kriteria['nama_kriteria'];
	$d['bobot'] = $d_kriteria['bobot'];
	$d['kategori'] = $d_kriteria['kategori'];
	array_push($tampung_kriteria, $d);
}
foreach ($tampung_alternatif as $key => $d_alternatif) {
$id_penduduk = $d_alternatif['id_penduduk'];


	    $data['nilai'] = [];
	    $ke = 0;
	    foreach ($tampung_kriteria as $key => $value) {
		$ke++;
		$id_kriteria = $value['id_kriteria'];
		// qnka =  query nilai kriteria alternatif di database 
		$qnka = mysqli_query($conn, "SELECT nilai from nilai_alternatif where id_jenis_bantuan='$id' and id_kriteria='$id_kriteria' and id_penduduk='$id_penduduk'")or die(mysqli_error());
		$dnka = mysqli_fetch_array($qnka);
		$nilai_dasar = $dnka['nilai'];
		$x = [
			'id_kriteria' => $id_kriteria,
			'kode' => $value['kode'],
			'nilai' => $nilai_dasar
		];
		array_push($data['nilai'], $x);
		 } 
	}


		$kumpul_pembagi= [];
		foreach ($tampung_kriteria as $key => $value) {
		$ke++;
		$id_kriteria = $value['id_kriteria'];
		$kategori = $value['kategori'];

			$x = [
				
			];
			
			$kumpul_pembagi[$key]['id_kriteria']=$id_kriteria;
			$kumpul_pembagi[$key]['kode']=$value['kode'];
			$kumpul_pembagi[$key]['alternatif']=[];
			foreach ($tampung_alternatif as $k_a => $d_alternatif) {
			$id_penduduk = $d_alternatif['id_penduduk'];
			// qnka =  query nilai kriteria alternatif di database 
			$qnka = mysqli_query($conn, "SELECT nilai from nilai_alternatif where id_jenis_bantuan='$id' and id_kriteria='$id_kriteria' and id_penduduk='$id_penduduk'")or die(mysqli_error());
			$dnka = mysqli_fetch_array($qnka);
			$nilai_dasar = $dnka['nilai'];
			array_push($kumpul_pembagi[$key]['alternatif'], $nilai_dasar);
			} // ekhir foreach ($tampung_alternatif as $k_a => $d_alternatif)

			if ($kategori=='Cost') {
				$pembagi = min($kumpul_pembagi[$key]['alternatif']);
			}else{
				$pembagi = max($kumpul_pembagi[$key]['alternatif']);
			}
			$kumpul_pembagi[$key]['pembagi']=$pembagi;	

		} 






foreach ($tampung_alternatif as $key => $d_alternatif) {
$id_penduduk = $d_alternatif['id_penduduk'];


	    $data['normalisasi'] = [];
	    $ke = 0;
	    foreach ($tampung_kriteria as $key_a => $value) {
		$ke++;
		$id_kriteria = $value['id_kriteria'];
		$kategori = $value['kategori'];
		// qnka =  query nilai kriteria alternatif di database 
		$qnka = mysqli_query($conn, "SELECT nilai from nilai_alternatif where id_jenis_bantuan='$id' and id_kriteria='$id_kriteria' and id_penduduk='$id_penduduk'")or die(mysqli_error());
		$dnka = mysqli_fetch_array($qnka);

	    $pembagi_normalisasi = $kumpul_pembagi[$key_a]['pembagi'];
		$nilai_dasar = $dnka['nilai'];
		if ($kategori=='Cost') {
			$normalisasi = $pembagi_normalisasi	/ $nilai_dasar;
		}else{
			$normalisasi = $nilai_dasar /  $pembagi_normalisasi;

		}

		$val_normalisasi = [
			'id_kriteria' => $id_kriteria,
			'kode' => $value['kode'],
			'normalisasi' => $normalisasi
		];

		array_push($data['normalisasi'], $val_normalisasi);

  
  }

}

$kumpul_preferensi = [];
$hasil_akhir = [];
foreach ($tampung_alternatif as $key => $d_alternatif) {
$id_penduduk = $d_alternatif['id_penduduk'];
$kumpul_preferensi_alternatif = [];



	    $kumpul_preferensi['alternatif'] = $d_alternatif['nama'];
	    $kumpul_preferensi['preferensi'] = [];
	    $kumpul_preferensi['nilai_preferensi'] = [];
	    $ke = 0;
	    foreach ($tampung_kriteria as $key_k => $value) {
		$ke++;
		$id_kriteria = $value['id_kriteria'];
		$kategori = $value['kategori'];
		// qnka =  query nilai kriteria alternatif di kumpul_preferensibase 
		$qnka = mysqli_query($conn, "SELECT nilai from nilai_alternatif where id_jenis_bantuan='$id' and id_kriteria='$id_kriteria' and id_penduduk='$id_penduduk'")or die(mysqli_error());
		$dnka = mysqli_fetch_array($qnka);

	    $pembagi_normalisasi = $kumpul_pembagi[$key_k]['pembagi'];
		$nilai_dasar = $dnka['nilai'];
		if ($kategori=='Cost') {
			$normalisasi = $pembagi_normalisasi	/ $nilai_dasar;
		}else{
			$normalisasi = $nilai_dasar /  $pembagi_normalisasi;

		}

		$perkalian = $value['bobot'] * $normalisasi;
		$val_normalisasi = [
			'normalisasi' => $normalisasi,
			'perkalian'=>$perkalian
		];

		array_push($kumpul_preferensi['preferensi'], $val_normalisasi);

   
			$perkalian = $kumpul_preferensi['preferensi'][$key_k]['perkalian'];
		array_push($kumpul_preferensi['nilai_preferensi'], $perkalian);
		$nilai_preferensi = $kumpul_preferensi['nilai_preferensi'][$key_k];
		array_push($kumpul_preferensi_alternatif, $nilai_preferensi);


} 
		$hasil_preferensi = array_sum($kumpul_preferensi_alternatif);
		$hasil = [
			'preferensi'=>$hasil_preferensi,
			'alternatif'=>$d_alternatif['nama'],
			'id_alternatif'=>$d_alternatif['id_alternatif'],
			'id_penduduk'=>$d_alternatif['id_penduduk']
		];

		array_push($hasil_akhir, $hasil);


 } 



		arsort($hasil_akhir);



		$urutan = 1;
		$penerima_bantuan = [];
		foreach ($hasil_akhir as $key => $value) {
		$data_penerima = [
			'urutan'=>$urutan++,
			'key'=>$key,
			'alternatif'=>$value['alternatif'],
			'id_penduduk'=>$value['id_penduduk'],
			'id_alternatif'=>$value['id_alternatif'],
			'preferensi'=>$value['preferensi'],
		]; 
		array_push($penerima_bantuan, $data_penerima);
			 } 

?>

<hr>



<div class="box-header">
	<h3 class="box-title">Data Penerima Bantuan penerima bantuan</h3>
</div>
<div class="box-body">
	<table class="table">
		<tr>
			<th>No</th>
			<th>NIK </th>
			<th>Nama</th>
			<th>Tempat / Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
		</tr>
		<?php 
		for ($i=0; $i < $kuota ; $i++) { 
			$key_alternatif = $penerima_bantuan[$i]['key'];
			if ($tampung_alternatif[$key_alternatif]['id_penduduk']==$id_penduduk_aktif) {
				$css= 'background:#f3f7da';
			}else{
				$css= '';
			}
		
			?>
		<tr style="<?php echo $css ?>">
			<td><?php echo $i+1 ?></td>
			<td><?php echo $tampung_alternatif[$key_alternatif]['nik'] ?></td>
			<td><?php echo $tampung_alternatif[$key_alternatif]['nama'] ?></td>
			<td><?php echo $tampung_alternatif[$key_alternatif]['tmpl'].' / '.$tampung_alternatif[$key_alternatif]['tgll'] ?></td>
			<td><?php echo $tampung_alternatif[$key_alternatif]['jk'] ?></td>
			<td><?php echo $tampung_alternatif[$key_alternatif]['alamat'] ?></td>
			<td><?php echo $tampung_alternatif[$key_alternatif]['pekerjaan'] ?></td>

		</tr>
		<?php } ?>
	</table>
</div>