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
             <h4 class="card-title">kelola laporan</h4>
             <a class="btn btn-gradient-primary btn-fw" href="http://localhost/pengelola/tambahlaporan.php">Tambah</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> id_laporan</th>
                  <th> id_pengguna </th>
                  <th>kategori</th>
                  <th>isi_laporan</th>
                  <th>foto</th>
                  <th>id_kat bencana</th>
                  <th>id_ref_lembaga</th>
                </tr>
              </thead>
        
              <?php 
              include "koneksi.php";

              $sql = "SELECT *from laporan";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)) {
                ?>
              <tbody>
                <tr class="table-warning">
                  <td> <?php echo $row["id_laporan"]; ?> </td>
                  <td> <?php echo $row["id_pengguna"]; ?> </td>
                  <td> <?php echo $row["kategorilapor"]; ?> </td>
                  <td> <?php echo $row["isi_lapor"]; ?> </td>
                  <td> <?php echo $row["foto"]; ?> </td>
                  <td> <?php echo $row["id_kat_bencana"]; ?> </td>
                  <td> <?php echo $row["id_ref_lembaga"]; ?> </td>
                  <td>
                  <a href="editlpr.php?id_laporan=<?php echo $row['id_laporan']?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-trash">edit</span></a>
			      <a href="deletelaporan.php?id_laporan=<?php echo $row['id_laporan']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>

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