<?php
$id = $_GET['id'];
$qjb = mysqli_query($conn, "SELECT * from jenis_bantuan where id_jenis_bantuan='$id'");
$djb = mysqli_fetch_array($qjb);

$q_alternatif = mysqli_query($conn, "SELECT * from alternatif a
	left join penduduk p on a.id_penduduk=p.id_penduduk where a.id_jenis_bantuan = '$id'");

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


$q_kriteria = mysqli_query($conn, "SELECT * from kriteria where id_jenis_bantuan='$id'");
$j_kriteria = mysqli_num_rows($q_kriteria);
$tampung_kriteria = [];
 ?>







<form action="form/kriteria/simpan_kriteria.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addkriteria">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kriteria Penerima Bantuan <?php echo $djb['nama_jenis_bantuan'] ?></h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Kategori</label>
                  <select name="kat" class="form-control" required>
                    <?php $kat = ['Benefit','Cost'];
                    foreach ($kat as $v) { ?>
                      <option value="<?php echo $v ?>"><?php echo $v ?></option>
                    <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Kode Kriteria</label>
                  <input type="text" name="kode" class="form-control" required>
                  <input type="hidden" name="id_jenis_bantuan" class="form-control" required value="<?php echo $id ?>">
              </div> 
              <div class="form-group">
                  <label>Nama Kriteria</label>
                  <input type="text" name="nama" class="form-control" required>
              </div> 
                <div class="form-group">
                  <label>Bobot</label>
                  <input type="text" name="bobot" class="form-control" required>
              </div> 
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Kriteria</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

<form action="form/struktur/simpan_struktur.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="pilih_alternatif">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Penduduk</h4>
              </div>
              <div class="modal-body">
             
<?php
  $perintah="SELECT * From  penduduk p
  where p.id_penduduk not in (SELECT id_penduduk from alternatif where id_jenis_bantuan='$id') ";
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
      <td>NIK</td>
      <td>Nama</td>
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
    <td><?php echo $data['nik'] ?></td>
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
    <a href="?a=alternatif_dipilih&id_penduduk=<?php echo $data['id_penduduk'] ?>&id_jenis_bantuan=<?php echo $id ?>" class="btn btn-info btn-xs">Pilih</a>
    
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
	    Detail Bantuan
	  </h3>

	  <div class="pull-right">
                    
	  	  <!-- <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#pilih_alternatif">Pilih Kepala Keluarga</a> -->
	  	  <?php if ($j_kriteria>0) { ?>
          <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#pilih_alternatif">Pilih Alternatif</a>
        <?php } ?>
        <a href="" class=" btn btn-info btn-xs"  data-toggle="modal" data-target="#addkriteria">Tambah Kriteria</a>
        <a href="form/jenis_bantuan/hapus_jenis_bantuan.php?id=<?php echo $djb['id_jenis_bantuan'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus Bantuan</a>
      <a href="?a=edit_jenis_bantuan&id=<?php echo $djb['id_jenis_bantuan'] ?>" class="btn btn-warning btn-xs">Edit Bantuan</a> 
                    
	  </div>
	 
	  
	</div>
	<div class="box-body">
		<div class="col-md-4">
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
		<div class="col-md-8">
				<label>Data Kriteria</label>
        <?php if ($j_kriteria==0) { ?>
          <div class="alert alert-danger">Belum ada data kriteria <br>Alternatif belum bisa di tambahkan</div>
        <?php }else{ ?>
			 <table class="table">
			 	<tr>
			 		<td>Kode</td>
			 		<td>Kriteria</td>
			 		<td>Kategori</td>
			 		<td>Bobot</td>
          <td>Pilihan Alternatif</td>
          <td>Option</td>
			 	</tr>
			<?php 
				
				
					while ($d_kriteria = mysqli_fetch_array($q_kriteria)) { 
            $id_kriteria = $d_kriteria['id_kriteria'];
            ?>

			 	<tr>
			 		<td><?php echo $d_kriteria['kode_kriteria'] ?></td>
			 		<td><?php echo $d_kriteria['nama_kriteria'] ?></td>
			 		<td><?php echo $d_kriteria['kategori'] ?></td>
			 		<td><?php echo $d_kriteria['bobot'] ?></td>
          <td>
            <ol>
              <?php $q_pilihan = mysqli_query($conn, "SELECT * from pilihan_nilai_alternatif where id_Kriteria='$id_kriteria'");
              while ($d_pilihan = mysqli_fetch_array($q_pilihan)) { ?>
              <li style="color:black"><?php echo $d_pilihan['nama_pilihan'].' [Nilai : '.$d_pilihan['nilai'] ?>] 
                <a href=""  data-toggle="modal" data-target="#edit_alternatif_kriteria_<?php echo $d_pilihan['id_pilihan'] ?>"><i class="fa fa-edit"></i></a>
                <a href="form/kriteria/hapus_pilihan_alternatif.php?id=<?php echo $d_pilihan['id_pilihan'] ?>&id_jenis_bantuan=<?php echo $id ?>"><i class="fa fa-trash" title="Hapus pilihan" data-toggle="tooltip"></i></a>
              </li>


                    <div class="modal fade" id="edit_alternatif_kriteria_<?php echo $d_pilihan['id_pilihan'] ?>">
                    <form action="form/kriteria/simpanedit_pilihan_kriteria.php" method="post" enctype="multipart/form-data">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Edit pilihan Alternatif Kriteria <?php echo $d_kriteria['nama_kriteria'] ?></h4>
                                  </div>
                                  <div class="modal-body">
                                      
                                  <div class="form-group">
                                      <label>Nama Pilihan Alternatif</label>
                                      <input type="text" name="nama" class="form-control" required value="<?php echo $d_pilihan['nama_pilihan'] ?>">
                                      <input type="hidden" name="id" class="form-control" value="<?php echo $d_pilihan['id_pilihan']?>">
                                      <input type="hidden" name="id_jenis_bantuan" class="form-control" value="<?php echo $d_kriteria['id_jenis_bantuan'] ?>">
                                  </div> 
                                    <div class="form-group">
                                      <label>Nilai</label>
                                      <input type="number" name="nilai" class="form-control" required value="<?php echo $d_pilihan['nilai'] ?>">
                                  </div> 
                                
                                </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan Data Pilihan Alternatif</button>
                                   
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                    </form>
                            </div>
               <?php } ?>
            </ol>
          </td>
          <td>
            <a href="form/kriteria/hapus_kriteria.php?id=<?php echo $d_kriteria['id_kriteria'] ?>&id_jenis_bantuan=<?php echo $id  ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a>
      <a href="" class=" btn btn-info btn-xs"  data-toggle="modal" data-target="#edit_kriteria_<?php echo $d_kriteria['id_kriteria'] ?>">Edit</a>  
      <a href="" class=" btn btn-info btn-xs"  data-toggle="modal" data-target="#pilihan_alternatif_kriteria_<?php echo $d_kriteria['id_kriteria'] ?>">Tambah Pilihan</a>  
          </td>





<div class="modal fade" id="edit_kriteria_<?php echo $d_kriteria['id_kriteria'] ?>">
<form action="form/kriteria/simpanedit_kriteria.php" method="post" enctype="multipart/form-data">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Kriteria Penerima Bantuan <?php echo $djb['nama_jenis_bantuan'] ?></h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Kategori</label>
                  <select name="kat" class="form-control" required>
                    <?php $kat = ['Benefit','Cost'];
                    foreach ($kat as $v) { ?>
                      <option value="<?php echo $v ?>" <?php if($v==$d_kriteria['kategori']){echo "selected";} ?>><?php echo $v ?></option>
                    <?php } ?>
                  </select>
              </div> 
              <div class="form-group">
                  <label>Kode Kriteria</label>
                  <input type="text" name="kode" class="form-control" required value="<?php echo $d_kriteria['kode_kriteria'] ?>">
                  <input type="hidden" name="id" class="form-control" required value="<?php echo $d_kriteria['id_kriteria'] ?>">
                  <input type="hidden" name="id_jenis_bantuan" class="form-control" required value="<?php echo $id ?>">
              </div> 
              <div class="form-group">
                  <label>Nama Kriteria</label>
                  <input type="text" name="nama" class="form-control" required value="<?php echo $d_kriteria['nama_kriteria'] ?>">
              </div> 
                <div class="form-group">
                  <label>Bobot</label>
                  <input type="text" name="bobot" class="form-control" required value="<?php echo $d_kriteria['bobot'] ?>">
              </div> 
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Kriteria</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</form>
        </div>

<div class="modal fade" id="pilihan_alternatif_kriteria_<?php echo $d_kriteria['id_kriteria'] ?>">
<form action="form/kriteria/simpan_pilihan_kriteria.php" method="post" enctype="multipart/form-data">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah pilihan Alternatif Kriteria <?php echo $d_kriteria['nama_kriteria'] ?></h4>
              </div>
              <div class="modal-body">
                  
              <div class="form-group">
                  <label>Nama Pilihan Alternatif</label>
                  <input type="text" name="nama" class="form-control" required>
                  <input type="hidden" name="id_kriteria" class="form-control" value="<?php echo $d_kriteria['id_kriteria'] ?>">
                  <input type="hidden" name="id_jenis_bantuan" class="form-control" value="<?php echo $d_kriteria['id_jenis_bantuan'] ?>">
              </div> 
                <div class="form-group">
                  <label>Nilai</label>
                  <input type="number" name="nilai" class="form-control" required>
              </div> 
            
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data Pilihan Alternatif</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</form>
        </div>
			 	</tr>
			 	<?php 
						$d['id_kriteria'] = $d_kriteria['id_kriteria'];
						$d['kode'] = $d_kriteria['kode_kriteria'];
						$d['nama'] = $d_kriteria['nama_kriteria'];
						array_push($tampung_kriteria, $d);
	}
	 ?>
			 	
			 	
			 </table>
      <?php } ?>
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
	    <th rowspan="2">NIK </th>
      <th rowspan="2">Nama</th>
      <th rowspan="2">Tempat / Tanggal Lahir</th>
      <th rowspan="2">Jenis Kelamin</th>
      <th rowspan="2">Alamat</th>
      <th rowspan="2">Pekerjaan</th>
      <?php if ($j_kriteria>0) { ?>
	    <th colspan="<?php echo $j_kriteria ?>"><center>Kriteria</center></th>
    <?php } ?>
		<th rowspan="2">Option</th>
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
	
$nik = $d_alternatif['nik'];
$id_penduduk = $d_alternatif['id_penduduk'];

?>
	<tr>
		
	
		<td><?php echo $no2++ ?></td>
	    <td><?php echo $d_alternatif['nik'] ?></td>
	    <td><?php echo $d_alternatif['nama'] ?></td>
	    <td><?php echo $d_alternatif['tmpl'].' /'.$d_alternatif['tgll'] ?></td>
	    <td><?php echo $d_alternatif['jk'] ?></td>
	    <td><?php echo $d_alternatif['alamat'] ?></td>
	    <td><?php echo $d_alternatif['pekerjaan'] ?></td>
	    
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
			'nilai' => $nilai_dasar
		];
		array_push($data['nilai'], $x);

    ?>
			
		<td><?php echo $dnka['keterangan'].'<br>Nilai : '.number_format($nilai_dasar) ?></td>
		<?php } ?>
	
	
	<td>
   
    <a href="form/spk/hapus_alternatif.php?id_alternatif=<?php echo $d_alternatif['id_alternatif'] ?>&id_penduduk=<?php echo $d_alternatif['id_penduduk'] ?>&id_jenis_bantuan=<?php echo $id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a> 
    <a href="?a=edit_alternatif&id_alternatif=<?php echo $d_alternatif['id_alternatif'] ?>&id_penduduk=<?php echo $d_alternatif['id_penduduk'] ?>&id_jenis_bantuan=<?php echo $id ?>" class="btn btn-default btn-xs" >Edit</a> 

    
	</td>
		</tr>

		<?php } ?>
				
	</table>


<br>
<a href="?a=perhitungan_spk&id=<?php echo $id ?>" class="btn btn-info btn-sm">Pengambilan Keputusan Penerima Bantuan Dengan Metode SAW</a>

