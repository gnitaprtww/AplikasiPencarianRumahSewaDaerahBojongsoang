<?php
include 'koneksi.php';
$id_laporan       = $_POST['id_laporan'];
$id_pengguna            = $_POST['id_pengguna'];
$kategorilapor         = $_POST['kategorilapor'];
$isi_lapor     = $_POST['isi_lapor'];
$foto                   = $_FILES['foto'];
$id_kat_bencana       = $_POST['id_kat_bencana'];
$id_ref_lembaga      = $_POST['id_ref_lembaga'];


$target_dir     = "../image/";
$namafile       = "bencanaimg" . $id_laporan . "." . strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
$target_file    = $target_dir . $namafile;
$uploadOk       = 1;
$imageFileType  = strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));

echo $imageFileType;
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($foto["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        // Check file size
        if ($foto["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($foto["tmp_name"], $target_file)) {
                $update                 = mysqli_query($conn, "UPDATE laporan SET id_pengguna = '$id_pengguna', kategorilapor= '$kategorilapor', isi_lapor = '$isi_lapor',  foto = '$namafile' ,id_ref_lembaga='$id_ref_lembaga',id_kat_bencana = '$id_kat_bencana' WHERE id_lap_bencana = '$id_lap_bencana'");}

if($update){
    echo "<script>alert('Data Berhasil Diedit');document.location.href='historylapor.php'</script>";
}else{
    echo "<script>alert('Data Gagal Diedit');document.location.href='edit.php?id_lap_bencana='$id_lap_bencana''</script>";    
}
}
?>