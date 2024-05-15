 <?php
    //   session_start();
     if (!isset($_SESSION['user'])) {
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
      }else{
           if ($_SESSION['master']==1) {
            // header("Location: index.php");
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
           }
      }
      include("database.php");
      ?>
<!--user session is disabled for this dev branch-->
<!--as I didn't know how to set up the db-->

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ganti Profil | QUIZA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <main>
   
   
     <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $nis = $_SESSION['user'];
           $email = $_POST["email"];
           $kelas = $_POST["kls"];
         
           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($kelas)) {
            array_push($errors,"Kolom tak lengkap");
           }
          
           require_once "database.php";
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            $sql = "UPDATE siswa SET nama_siswa = ?, email = ?, kelas = ? WHERE siswa.nis=".$nis."";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss", $fullName, $email, $kelas);
                mysqli_stmt_execute($stmt);
                echo "<script type='text/javascript'>window.location.href='profil.php';</script>";
                
                 $tempdir = "assets/profil_pict/"; 
        if (!file_exists($tempdir))
        mkdir($tempdir,0755); 

        $nama_gambar=$_FILES['pp']['name'];
      
        $target_path = $tempdir .$_SESSION['user'] .".jpg";
        
            if (move_uploaded_file($_FILES['pp']['tmp_name'], $target_path)) {
                
                 echo "<div class='alert alert-success'>Foto berhasil up.</div>";  
                        
            } else {
                 echo "<div class='alert alert-success'>Foto tidak ada.</div>";
                 
            }
                
            }else{
                echo "Gagal";
            }
           }
           
           

          
       
}

          ?>

          <?php
          $sql = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = " . $_SESSION['user'] . ";");
          $hasil = mysqli_fetch_array($sql, MYSQLI_ASSOC);
          

          echo '
          
          <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">

           <h1 style="color:#6eeb83;" class="responsive-font fw-semibold fs-1">
              <a style="text-decoration:none; color:#6eeb83;" href="profil.php"><</a>
             <br>Ganti Profil
            </h1>
            
          <form action="change_profil.php" method="post"  enctype="multipart/form-data">
           <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Nama Siswa:" value="'. $hasil["nama_siswa"].'">
            </div>
            
           
            
             <p>Kelas : </p>
  <input type="radio" id="kls1" name="kls" value="X">
  <label for="age1">X</label><br>
  <input type="radio" id="kls2" name="kls" value="XI">
  <label for="age2">XI</label><br>  
  <input type="radio" id="kls3" name="kls" value="XII">
  <label for="age3">XII</label><br><br>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:" value="'. $hasil["email"].'">
            </div>
            <p><label>Your Image File
  <input type="file" name="pp" accept="image/png, image/gif, image/jpeg" />
</label></p>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Ganti" name="submit">
            </div>
        </form>
        
          </div>
        </div>
        
         
         ';
          ?>


  </main>

  <!-- audio played troughout the quiz -->
  <audio autoplay loop>
    <source src="assets/bcksnd.mp3" type="audio/mp3" />
  </audio>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>