<?php
session_start();
include "header.php";
include "sidebar.php";

?>	
 <div class="main-panel">
 	<div class="content-wrapper">
 		<div class="row">
       <div class="col-lg-12 stretch-card">
         <div class="card">
           <div class="card-body">
             <h4 class="card-title">kelola pengguna</h4>
             <a class="btn btn-gradient-primary btn-fw" href="http://localhost/pengelola/tambahpengguna.php">Tambah</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> id_pengguna</th>
                  <th> username </th>
                  <th> password </th>
                  <th>nama</th>
                  <th>email</th>
                  <th>telp</th>
                  <th>statusp</th>
                </tr>
              </thead>
        
              <?php 
              include "koneksi.php";

              $sql = "SELECT *from pengguna";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)) {
                ?>
              <tbody>
                <tr class="table-warning">
                  <td> <?php echo $row["id_pengguna"]; ?> </td>
                  <td> <?php echo $row["username"]; ?> </td>
                  <td> <?php echo $row["password"]; ?> </td>
                  <td> <?php echo $row["nama"]; ?> </td>
                  <td> <?php echo $row["email"]; ?> </td>
                  <td> <?php echo $row["telp"]; ?> </td>
                  <td> <?php echo $row["statusp"]; ?> </td>
                  <td>
                  <a href="editpengguna.php?id_pengguna=<?php echo $row['id_pengguna']?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-trash">edit</span></a>
									<a href="deletepengguna.php?id_pengguna=<?php echo $row['id_pengguna']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>

									</td>
                </tr>
              </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>


<?php
include "footer.php";
?>