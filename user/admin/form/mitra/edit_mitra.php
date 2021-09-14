<?php 
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * from mitra where id_mitra = '$id'");
$d = mysqli_fetch_array($q);
?>            <div class="box-header with-border">
              <h3 class="box-title">Edit Data mitra</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="form/mitra/simpanedit_mitra.php" method="post" enctype="multipart/form-data">

              <div class="box-body">
   


                    <input type="hidden" class="form-control" required name="id" id="nik" value="<?php echo $d['id_mitra'] ?>">
                
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Toko</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required name="nama" value="<?php echo $d['nama_toko'] ?>">
                    </div>
                  </div>  
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Pemilik Toko</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required name="pimilik" value="<?php echo $d['pemilik_toko'] ?>">
                    </div>
                  </div>  
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required name="alm" value="<?php echo $d['alamat_toko'] ?>">
                    </div>
                  </div>  
                   <div class="form-group">
                    <label class="col-sm-2 control-label">No HP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required name="hp" value="<?php echo $d['nohp_toko'] ?>">
                    </div>
                  </div>  
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" required name="username" value="<?php echo $d['username'] ?>">
                    </div>
                  </div>  
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" required name="password" value="<?php echo $d['password'] ?>">
                    </div>
                  </div>   
             



              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?php if ($level=='Admin') { ?>
                <a href="?a=mitra" class="btn btn-info">Cancel</a>
                <?php } ?>
                <button type="submit" class="btn btn-info" id="tombol_simpan_mitra" >Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          