<?php 
session_start();
include "../../../../assets/koneksi.php";
$level = $_SESSION['level'];
$nama =$_POST['nama'];
$pemilik =$_POST['pimilik'];
$alm =$_POST['alm'];
$hp =$_POST['hp'];
$username =$_POST['username'];
$pass =$_POST['password'];
$id =$_POST['id'];



$q1 = mysqli_query($conn, "UPDATE mitra set
                 nama_toko= '$nama',
                pemilik_toko='$pemilik',
                alamat_toko='$alm',
                nohp_toko='$hp',
                username='$username',
                password='$pass' where id_mitra='$id'
    ")or die(mysqli_error());

if ($level=='Admin') {
    $redirect = '../../index.php?a=mitra';
}else{
    $redirect = '../../';
}
?>
<script type='text/javascript'>
    alert('Data mitra berhasil diperbaharui');
    window.location.href="<?php echo $redirect ?>"
</script>