<head>
     <script type="text/javascript" src="form/berita/ckeditor/ckeditor.js"></script>
</head>
<form action="form/profile_nagari/save_profile.php" method="post"  enctype="multipart/form-data">
<div class="col-md-12">

  
    <div class="form-group">
    <label>Judul </label>
    <input type="text" class="form-control" name="judul"  maxlength="250" required>
     </div>

  

    <div class="form-group">
    <label>Profile</label><br>
    <textarea class="ckeditor" id="ckedtor" name="isi" rows="10" required></textarea>
     </div>

  
    <div class="form-group">
    <input type="submit" value="Simpan Profil" class="btn btn-info">
     </div>

</div>
</form>