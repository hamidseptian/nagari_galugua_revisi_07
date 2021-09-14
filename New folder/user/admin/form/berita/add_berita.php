<head>
     <script type="text/javascript" src="form/berita/ckeditor/ckeditor.js"></script>
</head>
<form action="form/berita/save_berita.php" method="post"  enctype="multipart/form-data">
<div class="col-md-12">

  
    <div class="form-group">
    <label>Judul Berita</label>
    <input type="text" class="form-control" name="judul"  maxlength="250" required>
     </div>

  

    <div class="form-group">
    <label>Isi Berita</label><br>
    <textarea class="ckeditor" id="ckedtor" name="isi" rows="10" required></textarea>
     </div>

    <div class="form-group">
    <label>Gambar</label>
    <input type="file" name="foto" required>
     </div>
    <div class="form-group">
    <input type="submit" value="Publikasikan" class="btn btn-info">
     </div>

</div>
</form>