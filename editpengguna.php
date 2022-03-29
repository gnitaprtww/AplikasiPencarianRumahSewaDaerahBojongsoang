<?php
include'header.php';
include'sidebar.php';
include 'koneksi.php';

    $id_pengguna   = $_GET['id_pengguna'];
    $result      = mysqli_query($conn,"SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'");
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
             <h4 class="card-title">Edit pengguna
             </h4>
            <form class="forms-sample" action="editpeng.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
              <label >id_pengguna</label>
                        <input type="number" name="id_pengguna" value="<?php echo $row['id_pengguna']?>">
                    </div>

                    <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" value="<?php echo $row['username']?>">
                    </div>

                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" value="<?php echo $row['password']?>">
                    </div>

                    <div class="form-group">
                        <label>nama</label>
                        <input type="text" name="nama" value="<?php echo $row['nama']?>">
                    </div>

                    <div class="form-group">
                        <label>email</label>
                        <input type="text" name="email" value="<?php echo  $row['email']?>">
                    </div>

                    <div class="form-group">
                        <label>telp</label>
                        <input type="number" name="telp" value="<?php echo  $row['telp']?>">
                    </div>

                    <div class="form-group">
                        <label>statusp</label>
                        <input type="number" name="statusp" value="<?php echo  $row['statusp']?>">
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
                $statusp           =$_POST['statusp'];
                
                $sql = " UPDATE  pengguna (id_pengguna, username, password,nama,email,telp,akses)
                VALUES ('".$id_pengguna."', '".$username."', '".$password."','".$nama."','".$email."','".$telp."','".$akses."' )";
      
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Data Berhasil Diubah');document.location.href='pengguna.php'</script>";
                  } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                  $conn->close();
              }
             
          ?>
      
      <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
    </form>
  </div>
</div>
</div>
</div>
<?php }}

include'footer.php';
?>