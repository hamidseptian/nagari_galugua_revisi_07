
	<div class="box-body">
		
<?php 
$id = $_SESSION['id_user'];

$q_user = mysqli_query($conn, "SELECT * from user u  left join perangkat_nagari pn on u.id_pn=pn.id_pn where u.id_user='$id'");
$d_user = mysqli_fetch_array($q_user);
$namauser =  $d_user['nama']; 

   

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
                  <tr> <td style="width:200px">Nama </td>
                    <td style="width:10px">:</td>
                    <td><?php echo $d_user['nama'] ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $d_user['alamat'] ?></td>
                  </tr>
                  <tr>
                    <td>No HP </td>
                    <td>:</td>
                    <td><?php echo $d_user['nohp'] ?></td>
                  </tr>
                  <tr>
                    <td>Tugas </td>
                    <td>:</td>
                    <td><?php echo $d_user['lokasi_tugas'] ?></td>
                  </tr>
                  <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?php echo $d_user['jabatan'] ?></td>
                  </tr>
                  <tr>
                    <td>Hak Akses</td>
                    <td>:</td>
                    <td><?php echo $d_user['level'] ?></td>
                  </tr>
                 </table>







