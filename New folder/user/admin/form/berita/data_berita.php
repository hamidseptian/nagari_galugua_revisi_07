 
 <div class="box-header with-border">
   <h3 class="box-title">Data Berita</h3>
    <div class="pull-right">
      <a href="?a=new_berita" class="btn btn-info btn-sm">Tambah Berita</a>
    </div>
 </div>

 <div class="box-body">
   

   <table id="example1" class="table table-striped table-bordered">
  <thead>
    <tr >
      <th style="width:5%">No.</th>
      <th>Judul Artikel</th>
    
      <th>Tanggal Posting</th>
   
      <!-- <th style="width: 10%;">Option</th> -->
    </tr>
  </thead>




<?php 
$sql="SELECT * from berita";
$no=1;
$query=mysqli_query($conn, $sql);
while ($publish=mysqli_fetch_array($query)) {
 $id=$publish['id_berita'];
 $judul=$publish['judul_berita'];
 $isi=$publish['isi_berita'];
 $tgl=$publish['tanggal'];
 $x=explode("-", $tgl);
 $tg=$x['2'];
 $bl=$x['1'];
 if ($bl==1) {
   $txbl="January";
 }
elseif ($bl==2) {
   $txbl="Februari";
 }
elseif ($bl==3) {
   $txbl="Maret";
 }
elseif ($bl==4) {
   $txbl="April";
 }
elseif ($bl==5) {
   $txbl="Mei";
 }
elseif ($bl==6) {
   $txbl="Juni";
 }
elseif ($bl==7) {
   $txbl="Juli";
 }
elseif ($bl==8) {
   $txbl="Agustus";
 }
elseif ($bl==9) {
   $txbl="September";
 }
elseif ($bl==10) {
   $txbl="Oktober";
 }
elseif ($bl==11) {
   $txbl="November";
 }
elseif ($bl==12) {
   $txbl="Desember";
 }
 $th=$x['0'];
 $file=$publish['gambar'];
 

 ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><a href="?a=baca_berita&id=<?php echo $id; ?>" style="color: blue"><?php echo $judul; ?></a></td>
       
        <td><?php echo $tg." ".$txbl." ".$th; ?></td>
      <!--   <td><center>
          
                <form method="post" action="form/berita/delete_berita.php?id=<?php echo $id; ?>">       
                <input type="hidden" name="foto" value="<?php echo $file?>">  
                <input type="submit" value="Hapus" style="float: right;" class="btn btn-danger btn-xs" onclick="return confirm('Hapus berita   ini.?')">
                </form>
        </center>
        </td> -->
      </tr>


<?php } ?>


</table>

</div>