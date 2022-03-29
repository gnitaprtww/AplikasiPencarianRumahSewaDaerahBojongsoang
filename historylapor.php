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
             <h4 class="card-title">History Lapor bencana</h4>
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
              <!-- SELECT lapor_bencana.id_lap_bencana,lapor_bencana.isi_lapor_bencana, lapor_bencana.foto, kategori_bencana.kategoribencana FROM lapor_bencana JOIN pengguna USING(id_pengguna) JOIN kategori_bencana USING (id_kat_bencana)WHERE username = 'ayu'; -->
              <?php 
              include "koneksi.php";

              
              $sql = "SELECT id_laporan,kategorilapor,isi_lapor,foto,kategoribencana,reflembaga FROM laporan JOIN pengguna USING(id_pengguna) JOIN kategori_bencana USING (id_kat_bencana) JOIN references_lembaga using(id_ref_lembaga) WHERE username = '".$_SESSION['username']."' ORDER BY id_laporan ASC LIMIT 0,3 ";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)) {
                ?>
              <tbody>
                <tr class="table-primary">
                  <td> <?php echo $row["isi_lapor_bencana"]; ?> </td>
                  <td><img src='image/<?php echo $row['foto'];?>' width="200" height="auto"></td>
                  <td> <?php echo $row["kategoribencana"]; ?> </td>
                  <td>
										<a href="editlpr.php?id_lap_bencana=<?php echo $row['id_lap_bencana']?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil">Edit</span></a>
										<a href="hapuslaporans.php?id_lap_bencana=<?php echo $row['id_lap_bencana']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>
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
