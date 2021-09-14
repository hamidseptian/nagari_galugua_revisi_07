 <?php 
 $sql="SELECT * from struktur_organisasi";
$no=1;
$query=mysqli_query($conn, $sql);
$j = mysqli_num_rows($query);
$d = mysqli_fetch_array($query);
 ?>
 <div class="box-header with-border">
   <h3 class="box-title">Struktur Organisasi Nagari</h3>
    <div class="pull-right">
      <?php if ($j==0) { ?>
      <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#add">Tambahkan Struktur</a>



<form action="form/struktur/simpan_struktur.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Struktur Organisasi</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Gambar Struktur</label>
                  <input type="file" name="file" required>
              </div> 
              
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Struktur Organisasi</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


      <?php }else{ ?>
         <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#edit">Edit Struktur</a>



<form action="form/struktur/simpanedit_struktur.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Struktur Organisasi</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label>Gambar Struktur</label>
                  <input type="hidden" name="id" value="<?php echo $d['id_struktur'] ?>">
                  <input type="hidden" name="filelama" value="<?php echo $d['file'] ?>">
                  <input type="file" name="file" required>
              </div> 
              
             
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Struktur Organisasi</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>


    <?php } ?>
    </div>
 </div>

 <div class="box-body">
   <?php if ($j==0) { ?>
      <div class="alert alert-info">Struktur belum ditambahkan</div>
      <?php }else{ ?>
       <img src="form/struktur/gambar/<?php echo $d['file'] ?>" width="100%">
    <?php } ?>
   


</div>


