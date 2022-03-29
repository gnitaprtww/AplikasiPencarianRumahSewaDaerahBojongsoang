<?php
// session_start();
// if(!isset($_SESSION['nik']))
// {
//   header("location: ../register/bmas.php");
// }
include('header.php');
include('sidebar.php');

 ?>

 <div class="main-panel">
 	<div class="content-wrapper">
 		<div class="row">
 			<div class="col-12 grid-margin stretch-card">
 				<div class="card">
           <div class="card-body">
             <h4 class="card-title">Tambah Lapor</h4>
             <form class="forms-sample" method="post" action="ilaporan.php" enctype="multipart/form-data">
             <div class="form-group">
              <div class="form-group"> 

                
              <div class="form-group">
                <label >Kategori Lapor</label>
                <select name="kategorilapor" class="form-control">
                <option > Bencana </option>
                <option > Sarana </option>
               </select>
              </div>
              <label >Isi Lapor</label>
                <input class="form-control" type="text" name="isi_lapor">
              </div>
              <div class="form-group">
                <label >Foto</label>
                <input class="form-control" type="file" name="foto" ></input>
              </div>
              <div class="form-group">
                <label >Kategori Bencana</label>
                <select name="id_kat_bencana" class="form-control">
                <?php 
                include"koneksi.php";
                $qokatben = "SELECT * FROM kategori_bencana";
                $open = mysqli_query($conn , $qokatben);

                while ($row = mysqli_fetch_assoc($open))
                {
                 ?>
                <option >
                <?php echo $row['id_kat_bencana']; ?>
                <?php echo $row['kategoribencana']; ?>
                </option>
                <?php
                }
                 ?>
                 <option value="lainnya.."> Lainnya..</option>
               </select>
              </div>
              <div class="form-group">
                <label >Lembaga</label>
                <select name="id_ref_lembaga" class="form-control">
                <?php 
                include"../database/koneksi.php";
                $qoreflem = "SELECT * FROM references_lembaga";
                $openreflem = mysqli_query($conn , $qoreflem);

                while ($row = mysqli_fetch_assoc($openreflem))
                {
                 ?>
                <option >
                <?php echo $row['id_ref_lembaga']; ?>
                <?php echo $row['reflembaga']; ?>
                </option>
                <?php
                }
                 ?>
                 <option value="lainnya.."> Lainnya..</option>
               </select>
              </div>
              <button type="submit" name="submit" value="Submit" class="btn btn-gradient-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>

<?php 
      include 'koneksi.php';
      if (isset($_POST['submit'])) {
        $id_laporan 				= $_POST['id_laporan'];
        $id_pengguna 				= $_POST['id_pengguna'];
        $kategorilapor 	        	= $_POST['kategorilapor'];
        $isi_lapor 	       			= $_POST['isi_lapor'];
        $foto  						= $_FILES['foto'];
        $id_kat_bencana             = $_POST['id_kat_bencana'];
        $id_ref_lembaga             = $_POST['id_ref_lembaga'];

        $target_dir     = "image";
        $namafile       = "laporan" . $id_laporan . "." . strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
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
                $sql = "INSERT INTO laporan (id_pengguna, kategorilapor, isi_lapor, foto, id_kat_bencana,id_ref_lembaga)
                VALUES ('".$_SESSION['id_pengguna']."', '".$kategorilapor."', '".$isi_lapor."', '".$namafile."', '".$id_kat_bencana."', '".$id_ref_lembaga."')";
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

include('footer.php');
 ?>