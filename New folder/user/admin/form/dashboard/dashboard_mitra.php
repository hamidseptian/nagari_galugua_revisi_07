
	<div class="box-body">
		
<?php 
$id = $_SESSION['id_user'];

$q_user = mysqli_query($conn, "SELECT * from mitra where id_mitra='$id'");
$d_user = mysqli_fetch_array($q_user);
$namauser =  $d_user['pemilik_toko']; 
$namatoko =  $d_user['nama_toko']; 

   

?>
	



	<div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <div class="widget-user-image">
                <img class="img" src="<?php echo $gambar ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h5 class="widget-user-desc">Selamat Datang di Halaman User</h5>
              <h3 class="widget-user-username"><?php echo $namauser ?> - <?php echo $namatoko ?></h3>
           
            </div>
            
          </div>



	</div>



  <table class="table">
                  <tr>
                    <td style="width:200px">Nama Toko</td>
                    <td style="width:10px">:</td>
                    <td><?php echo $d_user['nama_toko'] ?></td>
                  </tr>
                  <tr>
                    <td>Pemilik</td>
                    <td>:</td>
                    <td><?php echo $d_user['pemilik_toko'] ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $d_user['alamat_toko'] ?></td>
                  </tr>
                  <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><?php echo $d_user['nohp_toko'] ?></td>
                  </tr>
                 </table>







