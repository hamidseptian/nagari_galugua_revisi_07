<?php 
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * from profile where id_profile='$id'");
$d = mysqli_fetch_array($q);
 ?>
<head>
     <script type="text/javascript" src="form/berita/ckeditor/ckeditor.js"></script>
</head>
<form action="form/profile_nagari/saveedit_profile.php" method="post"  enctype="multipart/form-data">
<div class="col-md-12">

  
    <div class="form-group">
    <label>Judul </label>
    <input type="hidden" class="form-control" name="id"    value="<?php echo $d['id_profile'] ?>">
    <input type="text" class="form-control" name="judul"  required value="<?php echo $d['judul'] ?>">
     </div>

  

    <div class="form-group">
    <label>Profile</label><br>
    <textarea class="ckeditor" id="ckedtor" name="isi" rows="10" required>
        <?php echo $d['isi'] ?>
    </textarea>
     </div>

  
    <div class="form-group">
    <input type="submit" value="Simpan Profil" class="btn btn-info">
     </div>

</div>
</form>