 <?php 
 $sql="SELECT * from profile";
$no=1;
$query=mysqli_query($conn, $sql);
$j = mysqli_num_rows($query);
$d = mysqli_fetch_array($query);
 ?>
 <div class="box-header with-border">
   <h3 class="box-title">Profile Nagari</h3>
    <div class="pull-right">
      <?php if ($j==0) { ?>
      <a href="?a=new_profile" class="btn btn-info btn-sm">Edit Profile</a>
      <?php }else{ ?>
      <a href="?a=edit_profile&id=<?php echo $d['id_profile'] ?>" class="btn btn-info btn-sm">Edit Profile</a>
    <?php } ?>
    </div>
 </div>

 <div class="box-body">
   <?php if ($j==0) { ?>
      <div class="alert alert-info">Profile belum ditambahkan</div>
      <?php }else{ ?>
       <h3 class="box-title"><?php echo $d['judul'] ?></h3>
     <?php echo $d['isi'] ?>
    <?php } ?>
   


</div>