 <?php 
 $sql="SELECT * from struktur_organisasi where id_struktur='1'";
$no=1;
$query=mysqli_query($conn, $sql);
$j = mysqli_num_rows($query);
$d = mysqli_fetch_array($query);
 ?>

 <img src="../user/admin/form/struktur/gambar/<?php echo $d['file'] ?>" style="width:100%">