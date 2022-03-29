<?php
session_start();
include "header.php";
include "sidebar.php";


      include 'koneksi.php';
      if (isset($_POST['submit'])) {
            $id_laporan				= $_POST['id_laporan'];
            $id_pengguna        =$_POST['id_pengguna'];
            $kategorilapor        =$_POST['kategorilapor'];
            $isi_lapor      =$_POST['isi_lapor'];
            $foto           =$_FILES['foto'];
            $id_kat_bencana =$_POST['id_kat_bencana'];
            $id_ref_lembaga =$_POST['id_ref_lembaga'];


            $target_dir     = "../image/";
            $namafile       = "laporanimg" . $id_pengguna . "." . strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
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
                    $sql = "INSERT INTO laporan (id_laporan,id_pengguna, kategorilapor,isi_lapor,foto,id_kat_bencana,id_ref_lembaga)
                    VALUES ('".$_SESSION['id_laporan']."', '".$id_pengguna."', '".$kategorilapor."','".$isi_lapor."','".$foto."', '".$id_kat_bencana."','".$id_ref_lembaga."')";
                    // echo $sql;
                    if ($conn->query($sql) === TRUE) {
                  echo "New record created successfully";
                  header("location: laporan.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
          }
          ?>