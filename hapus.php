<?php
include 'koneksi.php';
$x = $_GET['nim'];
$sql = "DELETE FROM mahasiswa WHERE nim = '$x'";
$exe = $conn->query($sql);
if ($exe) {
header("Location: read.php");
} 
?>