<div class="box">
	<div class="box-body">
		
<?php 
$id = $_SESSION['id_user'];

$id_penduduk_aktif = $_SESSION['id_user'];

$q_identitas_penduduk = mysqli_query($conn, "SELECT * from penduduk where id_penduduk='$id_penduduk_aktif'");
$d_identitas_penduduk = mysqli_fetch_array($q_identitas_penduduk);
$namauser =  $d_identitas_penduduk['nama']; 

   

?>
	



	<div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <div class="widget-user-image">
                <img class="img" src="<?php echo $gambar ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h5 class="widget-user-desc">Selamat Datang di Halaman User</h5>
              <h3 class="widget-user-username"><?php echo $namauser ?></h3>
           
            </div>
            
          </div>



	</div>



  <table class="table">
                  <tr>
                    <td style="width:200px">NIK </td>
                    <td style="width:10px">:</td>
                    <td><?php echo $d_identitas_penduduk['nik'] ?></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $d_identitas_penduduk['nama'] ?></td>
                  </tr>
                  <tr>
                    <td>Tempat / Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $d_identitas_penduduk['tmpl'].' '.$d_identitas_penduduk['tgll'] ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $d_identitas_penduduk['jk'] ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $d_identitas_penduduk['alamat'] ?>
                      <br>
                      RT : <?php echo $d_identitas_penduduk['rt'] ?> <br>
                      RW : <?php echo $d_identitas_penduduk['rw'] ?> <br>
                      Kelurahan : <?php echo $d_identitas_penduduk['kelurahan'] ?> <br>
                      Kecamatan : <?php echo $d_identitas_penduduk['kecamatan'] ?> <br>
                    </td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?php echo $d_identitas_penduduk['agama'] ?></td>
                  </tr>
                  <tr>
                    <td>Status Perkawinan</td>
                    <td>:</td>
                    <td><?php echo $d_identitas_penduduk['status_perkawinan'] ?></td>
                  </tr>
                  <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $d_identitas_penduduk['pekerjaan'] ?></td>
                  </tr>
                  <tr>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td><?php echo $d_identitas_penduduk['kewarganegaraan'] ?></td>
                  </tr>
                 </table>
</div>
