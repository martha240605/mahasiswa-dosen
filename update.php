<?php
include("koneksi.php");
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$sql = "update mahasiswa set nama='$nama', jenkel='$jenkel', email='$email', nohp='$nohp' where nim = '$nim'";
$exe = $conn->query($sql);
if($exe){
    header("location:read.php");
}
?>