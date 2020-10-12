<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET Keterangan_KdProduk dari URL
if(isset($_GET['Keterangan_KdProduk'])){
	//membuat variabel $Keterangan_KdProduk yang menyimpan nilai dari $_GET['Keterangan_KdProduk']
	$Keterangan_KdProduk = $_GET['Keterangan_KdProduk'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE Keterangan_KdProduk='$Keterangan_KdProduk'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM produk WHERE Keterangan_KdProduk='$Keterangan_KdProduk'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_produk";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_produk";</script>';
		}
	}else{
		echo '<script>alert("Keterangan_KdProduk tidak ditemukan di database."); document.location="index.php?page=tampil_produk";</script>';
	}
}else{
	echo '<script>alert("Keterangan_KdProduk tidak ditemukan di database."); document.location="index.php?page=tampil_produk";</script>';
}

?>
