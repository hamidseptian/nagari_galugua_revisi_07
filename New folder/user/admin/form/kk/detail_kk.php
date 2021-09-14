<?php
$no_kk = $_GET['no_kk'];
$qkk = mysqli_query($conn, "SELECT * from kk kk left join penduduk p on kk.kepala_keluarga=p.nik where kk.no_kk = '$no_kk'");
$dkk = mysqli_fetch_array($qkk);
  $no=1;
?>

<form action="form/struktur/simpan_struktur.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="add_anggota">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Anggota KK</h4>
              </div>
              <div class="modal-body">
             
<?php
  $perintah="SELECT * From penduduk where nik not in (SELECT kepala_keluarga from kk) and nik not in (SELECT nik from detail_kk)";
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
    <a href="form/kk/pilih_anggota_kk.php?nik=<?php echo $data['nik'] ?>&no_kk=<?php echo $no_kk ?>" class="btn btn-info btn-xs pilih" nik="<?php echo $data['nik'] ?>">Pilih</a>
    
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
	    Identitas KK <br>
	    No : <?php echo $no_kk ?>
	  </h3>

	  <div class="pull-right">
                    
	  	  <!-- <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#add_anggota">Pilih Kepala Keluarga</a> -->
	  	  <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#add_anggota">Pilih Anggota KK</a>
                    
	  </div>
	 
	  
	</div>
	<div class="box-body">
		<div class="col-md-6">
			 <table class="table">
			 	<tr>
			 		<td>Kepala Keluarga</td>
			 		<td>:</td>
			 		<td><?php echo $dkk['nama'] ?></td>
			 	</tr>
			 	<tr>
			 		<td>Alamat</td>
			 		<td>:</td>
			 		<td><?php echo $dkk['alamat'] ?></td>
			 	</tr>
			 	<tr>
			 		<td>RT / RW</td>
			 		<td>:</td>
			 		<td><?php echo $dkk['rt'].'/'.$dkk['rw'] ?></td>
			 	</tr>
			 </table>
		</div>
		<div class="col-md-6">
			 <table class="table">
			 	<tr>
			 		<td>Desa / Kelurahan</td>
			 		<td>:</td>
			 		<td><?php echo $dkk['kelurahan'] ?></td>
			 	</tr>
			 	<tr>
			 		<td>Kecamatan</td>
			 		<td>:</td>
			 		<td><?php echo $dkk['kecamatan'] ?></td>
			 	</tr>
			 	<tr>
			 		<td>Kabupaten</td>
			 		<td>:</td>
			 		<td>50 Kota</td>
			 	</tr>
			 </table>
		</div>
	</div>

	<hr>
	<div class="box-header with-border">
	  <h3 class="box-title">
	    Anggota KK
	  </h3>
	 
	  
	</div>
<table class="table table-striped table-bordered" id="example3">
	<thead>
	<tr>
		<td>No</td>
	    <td>Nama Lengkap</td>
	    <td>NIK</td>
	    <td>Jenis Kelamin</td>
		<td>Tempat Lahir</td>
		<td>Tanggal Lahir</td>
		<td>Agama</td>
		
		<td>Pekerjaan</td>
		<td>Option</td>
	</tr>
</thead>

	<tr>
		<td><?php echo $no2++ ?></td>
	    <td><?php echo $dkk['nama'] ?></td>
	    <td><?php echo $dkk['nik'] ?></td>
	    <td><?php echo $dkk['jk'] ?></td>
	    <td><?php echo $dkk['tmpl'] ?></td>
	    <td><?php echo $dkk['tgll'] ?></td>
	    <td><?php echo $dkk['agama'] ?></td>
	    
	    <td><?php echo $dkk['pekerjaan'] ?></td>
		<td></td>
	</tr>
	

<?php
$q_det_kk = mysqli_query($conn, "SELECT * from detail_kk dk
left join penduduk p on dk.nik = p.nik where  dk.no_kk='$no_kk'");
while ($data=mysqli_fetch_array($q_det_kk))
{ 
$no_kk = $data['no_kk'];
$q2 = mysqli_query($conn, "SELECT * from detail_kk where no_kk='$no_kk'");
$j2 = mysqli_num_rows($q2);

?>
	<tr>
		
	
		<td><?php echo $no2++ ?></td>
	    <td><?php echo $data['nama'] ?></td>
	    <td><?php echo $data['nik'] ?></td>
	    <td><?php echo $data['jk'] ?></td>
	    <td><?php echo $data['tmpl'] ?></td>
	    <td><?php echo $data['tgll'] ?></td>
	    <td><?php echo $data['agama'] ?></td>
	    
	    <td><?php echo $data['pekerjaan'] ?></td>
		
	
	
	
	<td>
   
    <a href="form/kk/hapus_detail_kk.php?no_kk=<?php echo $data['no_kk'] ?>&id=<?php echo $data['id_detail_kk'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin.?')">Hapus</a> 
    
	</td>
		</tr>

		<?php } ?>
				
	</table>
