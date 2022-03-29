<?php
include 'koneksi.php';
$id_pengguna      = $_GET['id_pengguna'];

$hapus         	  = mysqli_query($conn, " DELETE FROM pengguna  WHERE id_pengguna = '$id_pengguna'");
if($hapus){
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='history.php'</script>";
}
// elseif($hapuss){
//     echo "<script>alert('Data Berhasil Dihapus');document.location.href='history.php'</script>";
// }else{
//     echo "<script>alert('Data Gagal Dihapus');document.location.href='history.php''</script>";
// }
?>