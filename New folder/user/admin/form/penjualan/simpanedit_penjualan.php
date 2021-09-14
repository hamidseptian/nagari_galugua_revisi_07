<?php 
include "../../../../assets/koneksi.php";

session_start();
$id_mitra = $_SESSION['id_user'];
$id = $_POST['id'];
$produk = $_POST['produk'];
$qty = $_POST['qty'];
$tgl = $_POST['tgl'];

 $q_produk = mysqli_query($conn, "SELECT * from produk where id_produk='$produk'");
$d_produk = mysqli_fetch_array($q_produk);
$item = $d_produk['nama_produk'];
$satuan = $d_produk['satuan'];
$harga = $d_produk['harga'];
			
	$q1=mysqli_query($conn, "UPDATE penjualan set 
		
		produk='$item',
		satuan='$satuan',
		harga_satuan='$harga',
		qty='$qty',
		tanggal_transaksi ='$tgl'
		where id_penjualan='$id'
		
		
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data penjualan berhasil diperbaharui');
		window.location.href="../../?a=penjualan"

	</script>