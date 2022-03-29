<?php
include'header.php';
include'sidebar.php';
include 'koneksi.php';

    $id_laporan   = $_GET['id_laporan'];
    $result      = mysqli_query($conn, "SELECT * FROM laporan WHERE laporan . id_laporan = '$id_laporan'");
    if (mysqli_num_rows($result) == 0) {
        echo '<tr><td colspan="6"><center>Data Kosong!!!</center></td></tr>';
    }else{
    $no = 1;
    while($row = mysqli_fetch_array($result)) {
?> 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
           <div class="card-body">
             <h4 class="card-title">Edit Lapor</h4>
             <form class="forms-sample" method="post" action="editlpr.php" enctype="multipart/form-data">
              <div class="form-group">
                <label >Kategori Lapor</label>
                <input type="hidden" name="id_laporan" value="<?php echo $row['id_laporan']?>">
                <input type="hidden" name="id_pengguna" value="<?php echo $row['id_pengguna']?>">
                <select name="kategorilapor" class="form-control" value="<?php echo $row['kategorilapor']?>">
                <option > Bencana </option>
                <option > Sarana </option>
               </select>
              </div>
              <div class="form-group">
              <label >Isi Lapor</label>
                <input class="form-control" type="text" name="isi_lapor" value="<?php echo $row['isi_lapor']?>">
              </div>
              <div class="form-group">
                <label >Foto</label>
                <input class="form-control" type="file" name="foto" value="<?php echo $row['foto']?>">
                <img src='../image/<?php echo $row['foto'];?>' width="200" height="auto">
              </div>
              <div class="form-group">
                <label >Kategori Bencana</label>
                <select name="id_kat_bencana" class="form-control" value="<?php echo $row['id_kat_bencana']?>">
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
                <select name="id_ref_lembaga" class="form-control" value="<?php echo $row['id_ref_lembaga']?>">
                <?php 
                include"koneksi.php";
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
</div>
<?php }}

include'footer.php';
?>