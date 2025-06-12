<?php
include("koneksi.php");
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$sql = "insert into mahasiswa values('$nim','$nama','$jenkel','$email','$nohp','')";
$exe = $conn->query($sql);
if($exe){
    header("location:read.php");
}
?>