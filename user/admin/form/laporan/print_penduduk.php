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
<center><h4>LAPORAN DATA PENDUDUK</h4></center>
 <table style="font-size:12px;border-collapse: collapse; width:100%;" border = 1>
   <thead>
    <tr>
      <td>No</td>
        <td>NIK</td>
        <td>Nama</td>
        <td>Jenis Kelamin</td>
        <td>Tempat / Tanggal Lahir</td>
        <td>Alamat</td>
        <td>Agama</td>
        <td>Status Perkawinan</td>
        <td>Pekerjaan</td>
    </tr>
  </thead>

';
  $perintah="SELECT * From penduduk";
  $jalan=mysqli_query($conn, $perintah)or die(mysqli_error());
$no = 1;
while ($data=mysqli_fetch_array($jalan))
{ 
  $html .= '
      <tr>
      <td>'.$no++.'</td>
      <td>'.$data['nik'].'</td>
      <td>'.$data['nama'].'</td>
      <td>'.$data['jk'].'</td>
      <td>'.$data['tmpl'].'/'.$data['tgll'].'</td>

      <td>
          '.$data['alamat'].'<br>
          RT : '.$data['rt'].'<br>
          RW : '.$data['rw'].'<br>
          Kelurahan : '.$data['kelurahan'].'<br>
          Kecamatan : '.$data['kecamatan'].'<br>
      </td>

      <td>'.$data['agama'].'</td>
      <td>'.$data['status_perkawinan'].'</td>
      <td>'.$data['pekerjaan'].'</td>
      </tr>

';

}

 $html .= '
    </table>
    <br><br>
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
$dompdf->stream('Laporan Data Penduduk.pdf', ['Attachment'=>0]);

?>
<p style="font-size: "></p>

