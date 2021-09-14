<?php
$id = $_GET['id'];
$qjb = mysqli_query($conn, "SELECT * from jenis_bantuan where id_jenis_bantuan='$id'");
$djb = mysqli_fetch_array($qjb);

$q_alternatif = mysqli_query($conn, "SELECT * from alternatif a
	left join kk on a.id_kk = kk.id_kk
	left join penduduk p on kk.kepala_keluarga=p.nik where a.id_jenis_bantuan = '$id'");

$tampung_alternatif = [];
while ($d_alt=mysqli_fetch_array($q_alternatif))
{ 
	$data = [
		'no_kk' =>$d_alt['no_kk'],
		'id_kk' =>$d_alt['id_kk'],
		'nama' =>$d_alt['nama'],
		'id_alternatif' =>$d_alt['id_alternatif'],
	];
	array_push($tampung_alternatif, $data);
}


$jkk = mysqli_num_rows($q_alternatif);
  $no=1;

 ?>
<form action="form/struktur/simpan_struktur.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="pilih_alternatif">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Anggota KK</h4>
              </div>
              <div class="modal-body">
             
<?php
  $perintah="SELECT * From kk 
  left join penduduk p on kk.kepala_keluarga = p.nik
  where kk.id_kk not in (SELECT id_kk from alternatif) ";
  $jalan=mysqli_query($conn, $perintah);

  $total = mysqli_num_rows($jalan);
  $no=1;
  $no2=1;
?>
<div style="overflow-x: scroll">
<table class="table table-striped table-bordered" id="example1" width="100%">
  <thead>
  <tr>
    <td>No</td>
      <td>No KK</td>
      <td>Kepala Keluarga</td>
      <td>Alamat</td>
      <td>Agama</td>
      <td>Pekerjaan</td>
      
    <td>Option</td>
  </tr>
</thead>
<?php
while ($data=mysqli_fetch_array($jalan))
{ 
?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['no_kk'] ?></td>
    <td><?php echo $data['nama'] ?></td>
    <td>
      <?php echo $data['alamat'] ?><br>
      RT : <?php echo $data['rt'] ?><br>
      RW : <?php echo $data['rw'] ?><br>
      Kelurahan : <?php echo $data['kelurahan'] ?><br>
      Kecamatan : <?php echo $data['kecamatan'] ?><br>
      
    </td>
    <td><?php echo $data['agama'] ?></td>
    <td><?php echo $data['pekerjaan'] ?></td>
  
  <td>
    <a href="?a=alternatif_dipilih&id_kk=<?php echo $data['id_kk'] ?>&id_jenis_bantuan=<?php echo $id ?>" class="btn btn-info btn-xs">Pilih</a>
    
  </td>
    </tr>

    <?php } ?>
        
  </table>
</div>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left closemodal" data-dismiss="modal">Close</button>
              
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


	<div class="box-header with-border">
	  <h3 class="box-title">
	    Detail SPK
	  </h3>

	  <div class="pull-right">
                    
	  	  <!-- <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#pilih_alternatif">Pilih Kepala Keluarga</a> -->
	  	  <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#pilih_alternatif">Pilih Alternatif</a>
                    
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
		<div class="col-md-6">
				<label>Data Kriteria</label>
			 <table class="table">
			 	<tr>
			 		<td>Kode</td>
			 		<td>Kriteria</td>
			 		<td>Kategori</td>
			 		<td>Bobot</td>
			 	</tr>
			<?php 
				$q_kriteria = mysqli_query($conn, "SELECT * from kriteria");
				$j_kriteria = mysqli_num_rows($q_kriteria);
				$tampung_kriteria = [];
					while ($d_kriteria = mysqli_fetch_array($q_kriteria)) { ?>

			 	<tr>
			 		<td><?php echo $d_kriteria['kode_kriteria'] ?></td>
			 		<td><?php echo $d_kriteria['nama_kriteria'] ?></td>
			 		<td><?php echo $d_kriteria['kategori'] ?></td>
			 		<td><?php echo $d_kriteria['bobot'] ?></td>
			 	</tr>
			 	<?php 
						$d['id_kriteria'] = $d_kriteria['id_kriteria'];
						$d['kode'] = $d_kriteria['kode_kriteria'];
						$d['nama'] = $d_kriteria['nama_kriteria'];
						array_push($tampung_kriteria, $d);
	}
	 ?>
			 	
			 	
			 </table>
		</div>
	</div>

	<hr>
	<div class="box-header with-border">
	  <h3 class="box-title">
	    Alternatif
	  </h3>
	 
	  
	</div>


<table class="table table-striped table-bordered" id="example3">
	<thead>
	<tr>
		<th rowspan="2">No</th>
	    <th rowspan="2">No KK</th>
	    <th rowspan="2">Kepala Keluarga</th>
	    <th rowspan="2">Jumlah Anggota Keluarga</th>
	    <th colspan="<?php echo $j_kriteria ?>"><center>Kriteria</center></th>
		<th rowspan="2">Option</th>
	</tr>

	<tr>
		<?php 
		foreach ($tampung_kriteria as $key => $value) {
    ?>
			
		<th><?php echo $value['nama'] ?></th>
		<?php } ?>
	</tr>
</thead>

		

<?php



foreach ($tampung_alternatif as $key => $d_alternatif) {
	
$no_kk = $d_alternatif['no_kk'];
$id_kk = $d_alternatif['id_kk'];
$q2 = mysqli_query($conn, "SELECT * from detail_kk where no_kk='$no_kk'");
$j2 = mysqli_num_rows($q2);
?>
	<tr>
		
	
		<td><?php echo $no2++ ?></td>
	    <td><?php echo $d_alternatif['no_kk'] ?></td>
	    <td><?php echo $d_alternatif['nama'] ?></td>
	    <td><?php echo $j2 ?></td>
	    
	    <?php 
	    $data['nilai'] = [];
	    $ke = 0;
	    foreach ($tampung_kriteria as $key => $value) {
		$ke++;
		$id_kriteria = $value['id_kriteria'];
		// qnka =  query nilai kriteria alternatif di database 
		$qnka = mysqli_query($conn, "SELECT nilai from nilai_alternatif where id_jenis_bantuan='$id' and id_kriteria='$id_kriteria' and id_kk='$id_kk'")or die(mysqli_error());
		$dnka = mysqli_fetch_array($qnka);
		$nilai_dasar = $dnka['nilai'];
		$x = [
			'id_kriteria' => $id_kriteria,
			'kode' => $value['kode'],
			'nilai' => $nilai_dasar
		];
		array_push($data['nilai'], $x);

    ?>
			
		<td><?php echo number_format($nilai_dasar) ?></td>
		<?php } ?>
	
	
	<td>
   
    <a href="form/spk/hapus_alternatif.php?id_alternatif=<?php echo $d_alternatif['id_alternatif'] ?>&id_kk=<?php echo $d_alternatif['id_kk'] ?>&id_jenis_bantuan=<?php echo $id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a> 
    <a href="?a=edit_alternatif&id_alternatif=<?php echo $d_alternatif['id_alternatif'] ?>&id_kk=<?php echo $d_alternatif['id_kk'] ?>&id_jenis_bantuan=<?php echo $id ?>" class="btn btn-warning btn-xs" >Edit</a> 

    
	</td>
		</tr>

		<?php } ?>
				
	</table>





<hr><hr>


<div class="box-header with-border">
  <h3 class="box-title">
    Perhitungan 
  </h3>	  
</div>






<table class="table table-striped table-bordered" id="example3">
	<thead>
	<tr>
		<th rowspan="2">No</th>
	    <th rowspan="2">Alternatif</th>
	    <th colspan="<?php echo $j_kriteria ?>"><center>Kriteria</center></th>
		
	</tr>

	<tr>
		<?php 
		foreach ($tampung_kriteria as $key => $value) {
    ?>
			
		<th><?php echo $value['nama'] ?></th>
		<?php } ?>
	</tr>
</thead>

		

<?php



foreach ($tampung_alternatif as $key => $d_alternatif) {
	
$no_kk = $d_alternatif['no_kk'];
$id_kk = $d_alternatif['id_kk'];
$q2 = mysqli_query($conn, "SELECT * from detail_kk where no_kk='$no_kk'");
$j2 = mysqli_num_rows($q2);
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
		$qnka = mysqli_query($conn, "SELECT nilai from nilai_alternatif where id_jenis_bantuan='$id' and id_kriteria='$id_kriteria' and id_kk='$id_kk'")or die(mysqli_error());
		$dnka = mysqli_fetch_array($qnka);
		$nilai_dasar = $dnka['nilai'];
		$x = [
			'id_kriteria' => $id_kriteria,
			'kode' => $value['kode'],
			'nilai' => $nilai_dasar
		];
		array_push($data['nilai'], $x);

    ?>
			
		<td><?php echo number_format($nilai_dasar) ?></td>
		<?php } ?>
	
	
	
		</tr>

		<?php } ?>
				
	</table>