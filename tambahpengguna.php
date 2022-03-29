<?php 
include('header.php');
include('sidebar.php');
 ?>

 <div class="main-panel">
 	<div class="content-wrapper">
 		<div class="row">
 			<div class="col-12 grid-margin stretch-card">
 				<div class="card">
           <div class="card-body">
             <h4 class="card-title">Tambah pengguna</h4>
             <form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
             <div class="form-group">
               <label >id_pengguna</label>
               <input class="form-control" type="number" name="id_pengguna">
              </div>
              <div class="form-group">
                <label >username</label>
                <input class="form-control" type="text" name="username">
              </div>
              <div class="form-group">
                <label >password</label>
                <input class="form-control" type="password" name="password" ></input>
              </div>
              <div class="form-group">
                <label >nama</label>
                <input class="form-control" type="text" name="nama">
              </div>
              <div class="form-group">
                <label >email</label>
                <input class="form-control" type="text" name="email">
              </div>
              <div class="form-group">
                <label >telp</label>
                <input class="form-control" type="text" name="telp">
              </div>
              <div class="form-group">
                <label >statusp</label>
                <input class="form-control" type="text" name="statusp">
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
          $id_pengguna 				= $_POST['id_pengguna'];
          $username 	            = $_POST['username'];
          $password  				= md5($_POST['password']);
          $nama             =$_POST['nama'];
          $email            =$_POST['email'];
          $telp             =$_POST['telp'];
          $statusp          =$_POST['statusp'];
          
          $sql = " INSERT INTO pengguna (id_pengguna, username, password,nama,email,telp,statusp)
          VALUES ('".$id_pengguna."', '".$username."', '".$password."','".$nama."','".$email."','".$telp."','".$statusp."' )";


          if ($conn->query($sql) === TRUE) {
              echo "<script>alert('Data Berhasil Ditambah');document.location.href='pengguna.php'</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
		}
    
    ?>

<?php 
include('footer.php');
 ?>