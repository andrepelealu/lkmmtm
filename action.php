<?php
require_once "conn.php";

if(isset($_POST['submit'])){
  session_start();
  $nama = mysqli_real_escape_string($conn,$_POST["nama"]);
  $nim = mysqli_real_escape_string($conn,$_POST["nim"]);
  $fakultas = mysqli_real_escape_string($conn,$_POST["fakultas"]);
  $progdi = mysqli_real_escape_string($conn,$_POST["progdi"]);
  $email = mysqli_real_escape_string($conn,$_POST["email"]);
  $nohp = mysqli_real_escape_string($conn,$_POST["nohp"]);
  $jenis = mysqli_real_escape_string($conn,$_POST["jenis"]);
  $organisasi = mysqli_real_escape_string($conn,$_POST["organisasi"]);

  $nama = strtoupper($nama);
  $nim = strtoupper($nim);
  $organisasi = strtoupper($organisasi);
  $jenis = strtoupper($jenis);
  $sql = "INSERT INTO formbem (nama, nim , fakultas, prodi, email,no_hp , jenis , organisasi)
  VALUES ('$nama','$nim','$fakultas','$progdi','$email','$nohp','$jenis','$organisasi')";
  $query = mysqli_query($conn,$sql);

  if($query){
    $_SESSION["nama"] = $nama;
    $_SESSION["nim"] = $nim;
    $_SESSION["jenis"] = $jenis;
    $_SESSION["organisasi"] = $organisasi;
    $_SESSION["email"] = $email;
    $_SESSION["start"] = true;

    header('Location: sukses');
    // echo "<script>alert('Transaksi Sukses.Data Sudah ada dalam Laporan');window.location='sukses.php'</script>";

  }else{
    echo "<script>alert('Pendaftaran Gagal , Silahkan Hubungi Panitia');window.location='formbem'</script>";
  }
}else{
  echo "<script>alert('No Direct Access');window.location='index.html'</script>";

}

///header("Location: sukses.php");

 ?>
