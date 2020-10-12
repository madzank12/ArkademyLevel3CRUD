<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Keterangan_KdProduk'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Keterangan_KdProduk = $_GET['Keterangan_KdProduk'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM produk WHERE Keterangan_KdProduk='$Keterangan_KdProduk'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Nama_Produk  = $_POST['Nama_Produk'];
			$Harga	= $_POST['Harga'];
			$Jumlah	= $_POST['Jumlah'];

			$sql = mysqli_query($koneksi, "UPDATE produk SET Nama_Produk='$Nama_Produk', Harga='$Harga', Jumlah='$Jumlah' WHERE Keterangan_KdProduk='$Keterangan_KdProduk'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_produk";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_produk&Keterangan_KdProduk=<?php echo $Keterangan_KdProduk; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan/KdProduk</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Keterangan_KdProduk" class="form-control" size="4" value="<?php echo $data['Nim']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Produk</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Produk" class="form-control" value="<?php echo $data['Nama_Produk']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Harga" class="form-control" value="<?php echo $data['Harga']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Jumlah" class="form-control" value="<?php echo $data['Jumlah']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_produk" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
