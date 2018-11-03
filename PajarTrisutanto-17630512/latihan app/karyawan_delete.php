<?php include "header.php";
	if($_GET) {
	if(empty($_GET['Nik'])){
?>
	<b>Data yang dihapus tidak ada</b>
	<?php
	}
	else {
		$mySql = "DELETE FROM tkaryawan WHERE Nik='".$_GET['Nik']."'";
		$myQry = mysqli_query($koneksi,$mySql) or die ("Eror hapus data ".mysqli_error($koneksi));
	if ($myQry) {
	?>
		<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss= "alert" aria-hidden="true">&times;</button>Data Karyawan berhasil dihapus.</div>
		<meta http-eqiv='refresh'content='1; url=karyawan_data.php'/>
	<?php
			}
		}
	}
	?>
