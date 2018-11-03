<?php Include "header.php"; ?>
	<?php
	if(isset($_POST['add'])){
		$Nik			= $_POST['Nik'];
		$nama			= $_POST['nama'];
		$tempat_lahir	= $_POST['tempat_lahir'];
		$tanggal_lahir	= $_POST['tanggal_lahir'];
		$alamat			= $_POST['alamat'];
		$no_telepon		= $_POST['no_telepon'];	
		$jabatan		= $_POST['jabatan'];
		$status			= $_POST['status'];
		
			$cek = mysqli_query ($koneksi, "SELECT * FROM tkaryawan WHERE Nik='$Nik'");
			
			if (mysqli_num_rows ($cek)){
	?>
			<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nik Sudah Ada..!</div>
		<?php
			} else {
			$insert = mysqli_query($koneksi, "INSERT INTO tkaryawan(Nik, Nama, tempat_lahir, tanggal_lahir, alamat, no_telepon, jabatan, status)
			VALUES('$Nik','$nama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telepon','$jabatan','$status')") or die(mysqli_error($koneksi));
					if($insert){
		?>
			<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan behasil disimpan.</div>
		<?php
			} else {
		?>
			<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Karyawan gagal disimpan!</div>
		<?php
			}
		}
	}
		$now = strtotime (date("Y-m-d"));
		$maxyear = date ('Y-m-d', strtotime('- 16 year', $now));
		$minyear = date ('Y-m-d', strtotime('- 50 year', $now));
		?>
	<h2>Data Karyawan &raquo; Tambah Data</h2>
	<hr />
	<form class="form-horizontal" action="" method="post">
		<div class="form-group">
			<label class="col-sm-3 control-label">Nik</label>
			<div class="col-sm-2">
				<input type="text" name="Nik" class="form-control" maxlength="10" placeholder="Nik" required>
			</div>
		</div>	
		<div class="form-group">
			<label class="col-sm-3 control-label">Nama</label>
			<div class="col-sm-4">
				<input type="text" name="nama" class="form-control"
				placeholder="Nama" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Tempat Lahir</label>
			<div class="col-sm-4">
				<input type="text" name="tempat_lahir" class=
				"form-control" placeholder="Tempat Lahir" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Tanggal Lahir</label>
			<div class="col-sm-4">
			<input type="date" name="tanggal_lahir" Value="" min="<?php echo $minyear;?>" max="<?php echo $maxyear;?>" class=
			"input-group form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Alamat</label>
			<div class="col-sm-3">
				<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">No Telepon</label>
			<div class="col-sm-3">
				<Input type="text" name="no_telepon" maxlength="12" class="form-control" placeholder="No Telepon" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Jabatan</label>
			<div class="col-sm-2">
				<select name="jabatan" class="form-control"required>
					<option Value="">----</option>
					<option Value="Operator">Operator</option>
					<option Value="Leader">Leader</option>
					<option Value="Supervisor">Supervisor</option>
					<option Value="Manager">Manager</option>
				</select>	
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Status</label>
			<div class="col-sm-2">
				<select name="status" class="form-control">
					<option Value="">----</option>
					<option Value="Outsourcing">Outsourcing</option>
					<option Value="Kontrak">Kontrak</option>
					<option Value="Tetap">Tetap</option>
				</select>	
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
	</form>
<?php include "footer.php"; ?>