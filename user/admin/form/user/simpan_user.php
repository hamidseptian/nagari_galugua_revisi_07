<?php 
include "../../../../assets/koneksi.php";

$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$level=$_POST['level'];
$nama		= $_POST['nama'];
$alamat		= $_POST['alamat'];
$hp		= $_POST['hp'];
$tp		= $_POST['tp'];
$jab		= $_POST['jab'];
$id		= $_POST['id'];


$q = mysqli_query($conn, "SELECT * from user where username='$username' and password='$password'");
$j =  mysqli_num_rows($q) ;
if ($j>0 ) { ?>
		<script type="text/javascript">
		alert('Data user gagal disimpan\nUsername dan password sudah digunakan');
		window.location.href="../../?a=tambah_user&id=<?php echo $id ?>"

	</script>
	<?php 
	
}else{

	$q1=mysqli_query($conn, "INSERT into user set 
		 id_pn='$id',
		 username = '$username',
		 password = '$password',
		 level = '$level'
		
		")or die(mysqli_error()); 

?>

	<script type="text/javascript">
		alert('Data user berhasil disimpan');
		window.location.href="../../?a=user"

	</script>
<?php } ?>