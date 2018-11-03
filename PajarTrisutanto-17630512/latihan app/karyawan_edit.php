<?php Include "header.php"; ?>
	<?php
	$Nik = $_GET['nik'];
	$sql = mysqli_query($koneksi, "SELECT * FROM tkaryawan WHERE Nik='$Nik'");
	if(mysqli_num_rows($sql)==0){
	?>
		<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nik Tidak Ada..!</div>
	<?php
	}else{
		$row = mysqli_fetch_assoc($sql);
	}
	//Proses Simpan Data
	if(isset($_POST['add'])){
		$Nik			= $_POST['Nik'];
		$nama			= $_POST['nama'];
		$tempat_lahir	= $_POST['tempat_lahir'];
		$tanggal_lahir	= $_POST['tanggal_lahir'];
		$alamat			= $_POST['alamat'];
		$no_telepon		= $_POST['no_telepon'];	
		$jabatan		= $_POST['jabatan'];
		$status			= $_POST['status'];
		
		$update = mysqli_query($koneksi, "UPDATE tkaryawan SET
		nama='$nama', tempat_lahir='$tempat_lahir',
		tanggal_lahir='$tanggal_lahir', alamat='$alamat',
		no_telepon='$no_telepon', jabatan='$jabatan', status='
		$status' WHERE Nik='$Nik'") or die(mysqli_error());
		if($update){
		?>
		<div class="alert alert-success alert=dismissable"
		><button type="button" class="close" data-dismiss="alert"
		 aria-hidden="true">&times;</button>Data berhasil
		 disimpan.</div>
		<?php
		}else{
		?> <div class="alert alert-danger alert-dismissable"
		><button type="button" class="close" data-dismiss="alert"
		 aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>
		<?php
		}
	}
	$now = strtotime (date("Y-m-d"));
	$maxyear = date ('Y-m-d', strtotime('- 16 year', $now));
	$minyear = date ('Y-m-d', strtotime('- 50 year', $now));
	?>
	<h2>Data Karyawan &raquo; Edit Data</h2>
	<hr/>
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">  <body style="background-color:black" >
			<label class="col-sm-3 control-label">NIK</label>
			<div class="col-sm-2">
				<input type= "text" name="Nik" Value="<?php echo $row['Nik'];?>" class="form-control" placeholder="NIK" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Nama</label>
			<div class="col-sm-4">
				<input type="text" name="nama" value="<?php echo $row['nama'];?>" class="form-control" placeholder="Nama" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Tempat Lahir</label>
			<div class="col-sm-4">
				<input type="text" name="tempat_lahir" Value="<?php echo $row['tempat_lahir'];?>" class="form-control" placeholder="Tempat Lahir" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
				<input type="date" name="tanggal_lahir" Value="<?php echo $row['tanggal_lahir'];?>" min="<?php echo $minyear;?>" max="<?php echo $maxyear;?>" class="input-group form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Alamat</label>
			<div class="col-sm-3">
				<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $row['alamat'];?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">No Telepon</label>
			<div class="col-sm-3">
				<Input type="text" name="no_telepon" Value="<?php echo $row['no_telepon'];?>" class="form-control" placeholder="No Telepon" required>
			</div>
		</div>
		<div class="form-group"> 
			<label class="col-sm-3 control-label">Jabatan</label>
			<div class="col-sm-2">
				<select name="jabatan" class="form-control" required>
					<option Value="">-Jabatan Terbaru-</option>
					<option Value="Operator">Operator</option>
					<option Value="Leader">Leader</option>
					<option Value="Supervisor">Supervisor</option>
					<option Value="Manager">Manager</option>
				</select>	
			</div>
			<div class="col-sm-3">
			<b>Jabatan Sekarang :</b> <span class="label label-success"><?php echo $row['jabatan'];?></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Status</label>
			<div class="col-sm-2">
				<select name="status" class="form-control">
					<option Value="">-Status Terbaru-</option>
					<option Value="Outsourcing">Outsourcing</option>
					<option Value="Kontrak">Kontrak</option>
					<option Value="Tetap">Tetap</option>
				</select>	
			</div>
			<div class="col-sm-3">
			<b>Status Sekarang :</b> <span class="label label-info"><?php echo $row['status'];?></span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">&nbsp; </label>
			<div class="col-sm-6">
				<button type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan">Simpan</button>
				<button type="reset" class="btn btn-sm btn-warning" value="reset">reset</button>
				<button class="btn btn-sm btn-danger" onclick="history.back()">Kembali</button>
			</div>
		</div>
	</Form>
<?php include "footer.php"; ?>