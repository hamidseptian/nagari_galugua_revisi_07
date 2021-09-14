<?php 

$id=$_GET['id'];
$sql="select * from berita where id_berita='$id'";
$query=mysqli_query($conn, $sql);
$publish=mysqli_fetch_array($query);
{
 $id=$publish['id_berita'];
 $judul=$publish['judul_berita'];
 $tgl=$publish['tanggal'];
 $isi=$publish['isi_berita'];
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

}
 ?>

 <div class="box-header with-border">
   <h3 class="box-title"><?php echo $judul; ?></h3>
   <div class="pull-right">
     <small><?php echo $tg; echo " "; echo $txbl; echo " "; echo $th; ?></small>
   </div>
 </div>

 <div class="box-body">
   
 
      <form method="post" action="form/berita/delete_berita.php?id=<?php echo $id; ?>">       
    <input type="hidden" name="foto" value="<?php echo $file?>">  
                
                 
                  <div class="x_content">

                  	<img src="form/berita/gambar/<?php echo $file; ?>" style="width:35%; float: left; margin-right: 10px;">
      				
                


      
                         <?php echo $isi; ?>
                    <div class="clearfix"></div>

                  <hr>
                  <input type="submit" value="Hapus Berita" style="float: right;" class="btn btn-danger btn" onclick="return confirm('Hapus berita ini.?')"> 
                 <a href="?a=edit_berita&id=<?php echo $id ?>" class="btn btn-warning" style="float: right; margin-right: 10px" >Edit</a>
                  <a href="?a=berita" class="btn btn-info btn" style="float: left;">Back</a>
                  </div>
       </form>

              


</div>