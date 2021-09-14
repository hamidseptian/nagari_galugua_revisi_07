<?php
session_start();
include "../../../../assets/koneksi.php";
require_once("../../../../assets/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$iduser = $_SESSION['id_user'];
$level = $_SESSION['level'];

$html = '

<div style="float:left; width:5%">

    <img src="../../../../home/gambar/logo.png" style="width:100px"></div>
<div style="float:right; width:95%">
<center>
  <h3>PEMERINTAH KABUPATEN LIMA PULUH KOTA
KECAMATAN KAPUR IX
</h3>
  <h2 style="margin-top:-20px">
NAGARI GALUGUA
</h2>
</center>
</div>
<div style="clear:both">

<hr>  
    ';




$html .= '
<center><h4>LAPORAN DATA PERANGKAT NAGARI</h4></center>
 <table style="font-size:12px;border-collapse: collapse; width:100%;" border = 1>
   <thead>
    <tr>
      <td>No</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>No HP</td>
        <td>Jabatan</td>
    </tr>
  </thead>

';
  $perintah="SELECT * From perangkat_nagari";
  $jalan=mysqli_query($conn, $perintah)or die(mysqli_error());
$no = 1;
while ($data=mysqli_fetch_array($jalan))
{ 
  $html .= '
      <tr>
      <td>'.$no++.'</td>
      <td>'.$data['nama'].'</td>
      <td>'.$data['alamat'].'</td>
      <td>'.$data['nohp'].'</td>
      <td>'.$data['jabatan'].'</td>
     

      </tr>

';

}


 $html .= '
    </table>
    <br>
';

if ($level=='Pimpinan') {
  $q_admin = mysqli_query($conn, "SELECT * from user u  left join perangkat_nagari pn on u.id_pn=pn.id_pn where u.level='Admin'")or die(mysqli_error());
}else{
  $q_admin = mysqli_query($conn, "SELECT * from user u  left join perangkat_nagari pn on u.id_pn=pn.id_pn where u.id_user='$iduser'")or die(mysqli_error());
}
  
  $d_admin = mysqli_fetch_array($q_admin);
  $nama_admin=$d_admin['nama'];
 $q_pimpinan = mysqli_query($conn, "SELECT * from user u  left join perangkat_nagari pn on u.id_pn=pn.id_pn where u.level='Pimpinan'")or die(mysqli_error());
  $d_pimpinan = mysqli_fetch_array($q_pimpinan);
  $nama_pimpinan=$d_pimpinan['nama'];
 $html .= '
 <div style="float:left; text-align:center;">
     <br> Mengetahui, Admin
     <br><br><br><br><br><br>
     '.$nama_admin.'
</div>
';
 $html .= '
 <div style="float:right; text-align:center;">
     Lima Puluh Kota, '.date('d-m-Y').'<br>
     Menyetujui, Pimpinan
     <br><br><br><br><br><br>
     '.$nama_pimpinan.'
</div>
';





$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('Data gURU.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

