<?php
$id_penduduk		= $_GET['id_penduduk'];
$id_jenis_bantuan		= $_GET['id_jenis_bantuan'];

$qjb = mysqli_query($conn, "SELECT * from jenis_bantuan where id_jenis_bantuan='$id_jenis_bantuan'");
$djb = mysqli_fetch_array($qjb);
// 	echo $nik;
$sql = mysqli_query($conn, "SELECT * from penduduk 
 where id_penduduk='$id_penduduk'");

$j = mysqli_num_rows($sql);
$d = mysqli_fetch_array($sql);



$q_kriteria = mysqli_query($conn, "SELECT * from kriteria where id_jenis_bantuan='$id_jenis_bantuan'");
				$j_kriteria = mysqli_num_rows($q_kriteria);
				$tampung_kriteria = [];
					while ($d_kriteria = mysqli_fetch_array($q_kriteria)) { ?>

			
			 	<?php 
						$dt['id_kriteria'] = $d_kriteria['id_kriteria'];
						$dt['kode'] = $d_kriteria['kode_kriteria'];
						$dt['nama'] = $d_kriteria['nama_kriteria'];
						array_push($tampung_kriteria, $dt);
	}

?>





<form action="form/spk/simpanedit_nilai.php" method="post" enctype="multipart/form-data">

<input type="hidden" name="id_penduduk" id="id_penduduk" value="<?php echo $id_penduduk ?>">
<input type="hidden" name="id_jenis_bantuan" id="id_jenis_bantuan" value="<?php echo $id_jenis_bantuan ?>">
<div class="col-md-6">

	<div class="box-header with-border">
	  <h3 class="box-title">
	    Alternatif Dipilih
	    <br>Bantuan 
	    <?php echo $djb['nama_jenis_bantuan'] ?>
	  </h3>

	 
	  
	</div>
              <div class="form-group">
              		<!-- <label>Identitas KK</label> -->
		             <table class="table">
		             	<tr>
		             		<td>NIK </td>
		             		<td>:</td>
		             		<td><?php echo $d['nik'] ?></td>
		             	</tr>
		             	<tr>
		             		<td>Nama</td>
		             		<td>:</td>
		             		<td><?php echo $d['nama'] ?></td>
		             	</tr>
		             	<tr>
		             		<td>Tempat / Tanggal Lahir</td>
		             		<td>:</td>
		             		<td><?php echo $d['tmpl'].' '.$d['tgll'] ?></td>
		             	</tr>
		             	<tr>
		             		<td>Jenis Kelamin</td>
		             		<td>:</td>
		             		<td><?php echo $d['jk'] ?></td>
		             	</tr>
		             	<tr>
		             		<td>Alamat</td>
		             		<td>:</td>
		             		<td><?php echo $d['alamat'] ?>
		             			<br>
		             			RT : <?php echo $d['rt'] ?> <br>
		             			RW : <?php echo $d['rw'] ?> <br>
		             			Kelurahan : <?php echo $d['kelurahan'] ?> <br>
		             			Kecamatan : <?php echo $d['kecamatan'] ?> <br>
		             		</td>
		             	</tr>
		             	<tr>
		             		<td>Agama</td>
		             		<td>:</td>
		             		<td><?php echo $d['agama'] ?></td>
		             	</tr>
		             	<tr>
		             		<td>Status Perkawinan</td>
		             		<td>:</td>
		             		<td><?php echo $d['status_perkawinan'] ?></td>
		             	</tr>
		             	<tr>
		             		<td>Pekerjaan</td>
		             		<td>:</td>
		             		<td><?php echo $d['pekerjaan'] ?></td>
		             	</tr>
		             	<tr>
		             		<td>Kewarganegaraan</td>
		             		<td>:</td>
		             		<td><?php echo $d['kewarganegaraan'] ?></td>
		             	</tr>
		             </table>
              </div>
          </div>
              <div class="col-md-6">
              <div class="box-header with-border">
				  <h3 class="box-title">
				   Kriteria
				  </h3>

				  <div class="pull-right">
			                    
				  	  <!-- <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#pilih_alternatif">Pilih Kepala Keluarga</a> -->
				  	 
			                    
				  </div>
				 
				  
				</div>
              <?php foreach ($tampung_kriteria as $key => $value) { 
              	$id_kriteria = $value['id_kriteria'];
              	$q_nilai = mysqli_query($conn, "SELECT nilai, id_pilihan from nilai_alternatif where id_jenis_bantuan='$id_jenis_bantuan' and id_penduduk='$id_penduduk' and id_kriteria='$id_kriteria'");
              	$d_nilai = mysqli_fetch_array($q_nilai);
              	$nilai = $d_nilai['nilai']=='' ? '' : $d_nilai['nilai']

              	?>
              	
              <div class="form-group">
              	<label><?php echo $value['nama'] ?></label>
              	<select name="<?php echo $value['id_kriteria'] ?>" class="form-control">
              		 <?php $q_pilihan = mysqli_query($conn, "SELECT * from pilihan_nilai_alternatif where id_Kriteria='$id_kriteria'");
		              while ($d_pilihan = mysqli_fetch_array($q_pilihan)) { ?>
              		<option value="<?php echo $d_pilihan['id_pilihan'] ?>" <?php if($d_pilihan['id_pilihan']==$d_nilai['id_pilihan'] || $d_pilihan['nilai']==$d_nilai['nilai']){echo "selected";} ?>><?php echo $d_pilihan['nama_pilihan'] ?></option>
						<?php } ?>
              	</select>
              	<!-- <input type="number" name="<?php //echo $value['id_kriteria'] ?>" class="form-control" required> -->
              	<!-- <input type="number" name="<?php //echo $value['id_kriteria'] ?>" class="form-control" required value='<?php //echo $nilai ?>'> -->
              </div>
              <?php } ?>
              <div class="form-group">
              	<button class="btn btn-info btn-sm">Simpan</button>
              	 <a href="?a=detail_jenis_bantuan&id=<?php echo $id_jenis_bantuan ?>" class="btn btn-info btn-sm" >Kembali</a>
              </div>
          </div>

</form>