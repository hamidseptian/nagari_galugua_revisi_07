<?php 

?>            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Perangkat Nagari</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="form/perangkat_nagari/simpan_perangkat_nagari.php" method="post" enctype="multipart/form-data">

              <div class="box-body">

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="nama">
                    
                  </div>
                </div>   

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="alamat">
                    
                  </div>
                </div>   

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">No HP </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="hp">
                    
                  </div>
                </div>   

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tugas Pekerjaan </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="tp">
                    
                  </div>
                </div>   
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jabatan </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="jab">
                    
                  </div>
                </div>   


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?a=perangkat_nagari" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-info" id="tombol_simpan_perangkat_nagari" >Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          