<?php
session_start();

include "../../../../assets/koneksi.php";
$no_kk		= $_POST['no_kk'];
// 	echo $no_kk;
$sql = "SELECT no_kk from kk where no_kk='$no_kk'
";
$q = mysqli_query($conn, $sql)or die(mysqli_error());
$j = mysqli_num_rows($q);
if ($j>0) {
	echo 1;
}else{
	echo 0;

}
?>