
<form action="form/struktur/simpan_struktur.php" method="post" enctype="multipart/form-data">
<div class="modal fade" id="add">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Kelapa Keluarga</h4>
              </div>
              <div class="modal-body">
             
              
              
















<?php



  
  $perintah="SELECT * From penduduk where nik not in (SELECT kepala_keluarga from kk) and nik not in (SELECT nik from detail_kk)";
  $jalan=mysqli_query($conn, $perintah);

  $total = mysqli_num_rows($jalan);
  $no=1;
?>
<div style="overflow-x: scroll">
<table class="table table-striped table-bordered" id="example1" width="100%">
  <thead>
  <tr>
    <td>No</td>
      <td>NIK</td>
      <td>Nama</td>
      <td>Alamat</td>
      
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
  
  <td>
    <button type="button" class="btn btn-info btn-xs pilih" nik="<?php echo $data['nik'] ?>">Pilih</button>
    
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
              <h3 class="box-title">Tambah Data kk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="form/kk/simpan_kk.php" method="post" enctype="multipart/form-data">

              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">No KK </label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" required name="no_kk" id="no_kk">
                    <input type="hidden" class="form-control" required name="nik" id="nik">
                    <span id="ket_no_kk"></span>
                  </div>
                </div>   
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kepala Keluarga </label>
                  <div class="col-sm-10">
                    <div id="detail_penduduk"></div>
                    <a href="#" class="btn btn-info btn-xs"  data-toggle="modal" data-target="#add">Pilih Kepala Keluarga</a>
                    


                  </div>
                </div>   



        
<script type="text/javascript">
  $('.pilih').click(function(){
    var nik = $(this).attr('nik');
    
       $.ajax({
        url : 'form/kk/detail_kepala_keluarga.php',
        type : 'POST',
        data : { "nik" : nik},
        success : function (data){
         $('#detail_penduduk').html(data);
         $('#nik').val(nik);

        },
        error : function (){
          alert('error');
        }
       });
         $('.close').click();
  });


 var nik_ok = $('#nik').val();

</script>
              
				<script type="text/javascript">
          $('#tombol_simpan_kk').attr('style','display:none');
					$('#no_kk').keyup(function(){
						var no_kk = $('#no_kk').val();
  					 $.ajax({
              url : 'form/kk/cek_no_kk.php',
              type : 'POST',
              data : { "no_kk" : no_kk},
              success : function (data){
                if (data==1) {
                  $('#ket_no_kk').html('no_kk '+no_kk+' sudah digunakan');
                  $('#tombol_simpan_kk').attr('style','display:none');
                }else{
                  $('#ket_no_kk').html('');
                  $('#tombol_simpan_kk').attr('style','');

                }
              },
              error : function (){
                alert('error');
              }
             });
					});
				</script>

               
             



              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="?a=kk" class="btn btn-info">Cancel</a>
                <button type="submit" class="btn btn-info" id="tombol_simpan_kk" style="display:none">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          