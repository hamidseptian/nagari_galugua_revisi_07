<?php
$id = $_GET['id'];
$qjb = mysqli_query($conn, "SELECT * from jenis_bantuan where id_jenis_bantuan='$id'");
$djb = mysqli_fetch_array($qjb);
$kuota = $djb['kuota'];

$q_alternatif = mysqli_query($conn, "SELECT * from alternatif a
	left join penduduk p on a.id_penduduk=p.id_penduduk where a.id_jenis_bantuan = '$id'");
$j_alternatif = mysqli_num_rows($q_alternatif);


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
	    Perhitungan Sistem Penunjang Keputusan Dengan Metode SAW
	  </h3>

	  <div class="pull-right">
                    
	  	  <!-- <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#pilih_alternatif">Pilih Kepala Keluarga</a> -->
       
      <a href="?a=detail_jenis_bantuan&id=<?php echo $djb['id_jenis_bantuan'] ?>" class="btn btn-info btn-xs">Kembali</a> 
                    
	  </div>
	 
	  
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
?>


	<hr>
	<div class="box-header with-border">
	  <h3 class="box-title">
	    Alternatif
	  </h3>
	 
	  
	</div>


<table class="table table-striped table-bordered" id="">
	<thead>
	<tr>
		<th rowspan="2">No</th>
      <th rowspan="2">Alternatif</th>
      <?php if ($j_kriteria>0) { ?>
	    <th colspan="<?php echo $j_kriteria ?>"><center>Kriteria</center></th>
    <?php } ?>
	</tr>
   <?php if ($j_kriteria>0) { ?>
	<tr>
		<?php 
		foreach ($tampung_kriteria as $key => $value) {
    ?>
			
		<th><?php echo $value['nama'] ?></th>
		<?php } ?>
	</tr>
    <?php } ?>
</thead>

		

<?php



foreach ($tampung_alternatif as $key => $d_alternatif) {
$id_penduduk = $d_alternatif['id_penduduk'];
?>
	<tr>
		
	
		<td><?php echo $no2++ ?></td>
	    <td><?php echo $d_alternatif['nama'] ?></td>
	    <?php 
	    $data['nilai'] = [];
	    $ke = 0;
	    foreach ($tampung_kriteria as $key => $value) {
		$ke++;
		$id_kriteria = $value['id_kriteria'];
		// qnka =  query nilai kriteria alternatif di database 
		$qnka = mysqli_query($conn, "SELECT nilai, keterangan from nilai_alternatif where id_jenis_bantuan='$id' and id_kriteria='$id_kriteria' and id_penduduk='$id_penduduk'")or die(mysqli_error());
		$dnka = mysqli_fetch_array($qnka);
		$nilai_dasar = $dnka['nilai'];
		$x = [
			'id_kriteria' => $id_kriteria,
			'kode' => $value['kode'],
			'nilai' => $nilai_dasar,
			
		];
		array_push($data['nilai'], $x);

    ?>
			
		<td><?php echo $dnka['keterangan'].' <br>Nilai : '.number_format($nilai_dasar) ?></td>
		<?php } ?>
		<!-- <td><pre><?php echo print_r($data['nilai']) ?></pre></td> -->
	
		</tr>

		<?php } ?>
				
	</table>


<hr>

	<div class="box-header with-border">
	  <h3 class="box-title">
	    Pembagi
	  </h3>
	</div>
	<div class="box-body">
		<?php 	
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

		} ?>

		

	<table class="table">
		<tr>
			<?php foreach ($tampung_kriteria as $key => $value) { ?>
			<td><?php echo $value['kode'].' ('.$value['kategori'].')' ?></td>
			<?php } ?>
		</tr>
		<tr>
			<?php foreach ($tampung_kriteria as $key => $value) { ?>
			<td><?php echo number_format($kumpul_pembagi[$key]['pembagi']) ?></td>
			<?php } ?>
		</tr>
	</table>
	</div>
<!-- <a href="?a=perhitungan_spk&id=<?php echo $id ?>" class="btn btn-default btn-sm">Print</a> -->







	<hr>
	<div class="box-header with-border">
	  <h3 class="box-title">
	    Normalisasi
	  </h3>
	 
	  
	</div>


<table class="table table-striped table-bordered" id="">
	<thead>
	<tr>
		<th rowspan="2">No</th>
      <th rowspan="2">Alternatif</th>
      <?php if ($j_kriteria>0) { ?>
	    <th colspan="<?php echo $j_kriteria ?>"><center>Kriteria</center></th>
    <?php } ?>
	</tr>
   <?php if ($j_kriteria>0) { ?>
	<tr>
		<?php 
		foreach ($tampung_kriteria as $key => $value) {
    ?>
			
		<th><?php echo $value['nama'] ?></th>
		<?php } ?>
	</tr>
    <?php } ?>
</thead>

		

<?php



foreach ($tampung_alternatif as $key => $d_alternatif) {
$id_penduduk = $d_alternatif['id_penduduk'];
?>
	<tr>
		
	
		<td><?php echo $no2++ ?></td>
	    <td><?php echo $d_alternatif['nama'] ?></td>
	    <?php 
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

    ?>
			
		<td><?php echo $normalisasi ?></td>
		<?php } ?>
		
	
		</tr>

		<?php } ?>
				
	</table>


<hr>
	<div class="box-header with-border">
	  <h3 class="box-title">
	    Preferensi
	  </h3>
	 
	  
	</div>


<table class="table table-striped table-bordered" id="">
	<thead>
	<tr>
		<th rowspan="2">No</th>
      <th rowspan="2">Alternatif</th>
      <th rowspan="2">Preferensi</th>
     
	</tr>

</thead>

		

<?php


$kumpul_preferensi = [];
$hasil_akhir = [];
foreach ($tampung_alternatif as $key => $d_alternatif) {
$id_penduduk = $d_alternatif['id_penduduk'];
$kumpul_preferensi_alternatif = [];
?>
	<tr>
		
	
		<td><?php echo $no2++ ?></td>
	    <td><?php echo $d_alternatif['nama'] ?></td>
	    <?php 
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

		?>
		<td><?php echo $hasil_preferensi ?></td>
	
		</tr>

		<?php } 



		arsort($hasil_akhir)?>
		<tr>
			<td>
				
			</td>
		</tr>
				
	</table>



<hr>


<div class="box-header">
	<h3 class="box-title">Hasil Akhir</h3>
</div>
<div class="box-body">
	<table class="table">
		<tr>
			<td>Urutan</td>
			<td>Alternatif</td>
		</tr>
		<?php 
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





		foreach ($penerima_bantuan as $key => $value) {
		
			?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value['alternatif'] ?></td>
		</tr>
		<?php } ?>
	</table>
</div>


<hr>



<div class="box-header">
	<h3 class="box-title">Keputusan penerima bantuan</h3>
	<div class="pull-right">
		<?php if ($djb['status']=='Di Publikasi') { ?>
			Sudah di publikasikan
		<?php }else{ ?>
			<a href="form/jenis_bantuan/publikasikan.php?id=<?php echo $id  ?>" class="btn btn-info btn-sm" onclick="return confirm('Publikasikan bantuan..?')">Publikasikan</a>
		<?php } ?>
		
	</div>
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
		if ($j_alternatif < $kuota) {
			$banyak_penerima = $j_alternatif;
		}else{
			$banyak_penerima = $kuota;

		}
		for ($i=0; $i < $banyak_penerima ; $i++) { 
			$key_alternatif = $penerima_bantuan[$i]['key'];
		
			?>
		<tr>
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