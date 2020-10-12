<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			
			$Nama_Produk			= $_POST['Nama_Produk'];
			$Keterangan_KdProduk	= $_POST['Keterangan_KdProduk'];
			$Harga					= $_POST['Harga'];
			$Jumlah					= $_POST['Jumlah'];

			$cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE Keterangan_KdProduk='$Keterangan_KdProduk'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO produk(Nama_Produk, Keterangan_KdProduk, Harga, Jumlah) VALUES('$Nama_Produk', '$Keterangan_KdProduk', '$Harga', '$Jumlah')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_produk";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Keterangan_KdProduk sudah terdaftar.</div>';
			}
		}
		?>
				<form action="index.php?page=tambah_produk" method="post">
			
		<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Produk</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Produk" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan/KdProduk</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Keterangan_KdProduk" class="form-control" size="4" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Harga" class="form-control" required>
				</div>
			</div>
		<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Jumlah" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-danger" value="Simpan">
			</div>
		</form>
	</div>
