<?php 

?>            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data penduduk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="form/penduduk/simpan_penduduk.php" method="post" enctype="multipart/form-data">

              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">NIK </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="nik" id="nik"  onkeypress="return hanyaAngka(event)" maxlength="16">
                    <span id="ket_nik"></span>
                  </div>
                </div>   
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="nama">
                    
                  </div>
                </div>   


                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Lahir </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="tmpl">
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir </label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" required name="tgll">
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin </label>
                  <div class="col-sm-10">
                    <select class="form-control" required name="jk">
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>   

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="alamat">
                  </div>
                </div>   
                 <div class="form-group">
                  <label class="col-sm-2 control-label">RT </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="rt">
                  </div>
                </div>   
                 <div class="form-group">
                  <label class="col-sm-2 control-label">RW </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="rw">
                  </div>
                </div>   
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Kelurahan </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="kel">
                  </div>
                </div>   
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Kecamatan </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="kec">
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Agama </label>
                  <div class="col-sm-10">
                    <select class="form-control" required name="agama">
                      <?php $agama = array('Islam','Kristen','Hindu','Budha');
                      foreach ($agama as $a) { ?>
                         
                      <option value="<?php echo $a ?>"><?php echo $a ?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Status Perkawinan </label>
                  <div class="col-sm-10">
                    <select class="form-control" required name="status_kawin">
                      <?php $sp = array('Kawin','Belum Kawin');
                      foreach ($sp as $a) { ?>
                         
                      <option value="<?php echo $a ?>"><?php echo $a ?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">Pekerjaan </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" required name="pekerjaan">
                  </div>
                </div>   
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kewarga Negaraan</label>
                  <div class="col-sm-10">
                    <select class="form-control" required name="kewarganegaraan">
                      <?php $wn = array('WNI','WNA');
                      foreach ($wn as $a) { ?>
                         
                      <option value="<?php echo $a ?>"><?php echo $a ?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>   

           
                <div class="form-group">
                  <label class="col-sm-2 control-label">Berlaku Hingga </label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" required name="berlaku">
                  </div>
                </div>
              
				<script type="text/javascript">
          $('#tombol_simpan_penduduk').hide();
					$('#nik').keyup(function(){
						var nik = $('#nik').val();
  					 $.ajax({
              url : 'form/penduduk/cek_nik.php',
              type : 'POST',
              data : { "nik" : nik},
              success : function (data){
                if (data==1) {
                  $('#ket_nik').html('NIK '+nik+' sudah digunakan');
                  $('#tombol_simpan_penduduk').hide();
                }else{
                  $('#ket_nik').html('');
                  $('#tombol_simpan_penduduk').show();

                }
              },
              error : function (){
                alert('error');
              }
             });
					});


          function hanyaAngka(evt) {
              var charCode = (evt.which) ? evt.which : event.keyCode
              if (charCode > 31 && (charCode < 48 || charCode > 57))
           
              return false;
              return true;
          }
				</script>

               
             



              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?a=penduduk" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-info" id="tombol_simpan_penduduk" >Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          