<?php
include 'koneksi.php';
$id_pengguna        = $_POST['id_pengguna'];
$username           = $_POST['username'];
$password       = md5($_POST['password']);
$nama                = $_POST['nama'];
$email        = $_POST['email'];
$telp         =$_POST['telp'];
$statusp          = $_POST['statusp'];


$update  = mysqli_query($conn, "UPDATE pengguna 
            SET id_pengguna='$id_pengguna', username='$username', password='$password', nama='$nama', email='$email',telp='$telp',statusp='$statusp'
            WHERE id_pengguna='$id_pengguna'");
if ($update)
    
        echo "<script>alert('Data Berhasil Diedit');document.location.href='pengguna.php'</script>";    

?>