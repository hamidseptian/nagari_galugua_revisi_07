<?php 
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * from berita where id_berita = '$id'");
$d = mysqli_fetch_array($q);
 ?>
<head>
     <script type="text/javascript" src="form/berita/ckeditor/ckeditor.js"></script>
</head>
<form action="form/berita/simpanedit_berita.php" method="post"  enctype="multipart/form-data">
<div class="col-md-12">

  
    <div class="form-group">
    <label>Judul Berita</label>
    <input type="hidden" class="form-control" name="id"  maxlength="250" required value="<?php echo $d['id_berita'] ?>">
    <input type="text" class="form-control" name="judul"  maxlength="250" required value="<?php echo $d['judul_berita'] ?>">
     </div>

  

    <div class="form-group">
    <label>Isi Berita</label><br>
    <textarea class="ckeditor" id="ckedtor" name="isi" rows="10" required><?php echo $d['isi_berita'] ?></textarea>
     </div>

    <div class="form-group">
    <label>Gambar Artikel</label>
    <input type="file" name="file">
     </div>
    <div class="form-group">
    <input type="submit" value="Publikasikan" class="btn btn-info">
     </div>

</div>
</form>