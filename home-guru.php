<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
      if (!isset($_SESSION['user'])) {
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
      }else{
           if ($_SESSION['master']==0) {
            // header("Location: index.php");
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
           }
      }
      include("database.php");
      ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Homepage Guru | QUIZA</title>
  <link rel="stylesheet" href="style.css" />
</head>
<style>


      /* dari sini copyannya */
  .container-home {
    max-width: 1000px;
    max-height:600px;
    margin: 0 auto;
    padding: 20px;
  }
  
  .responsive-flex {
    display: flex;
    flex-wrap: wrap;
  }
  
  .responsive-padding {
    padding: 20px;
  }
  
  .column {
    flex: 1;
    margin-right: 10px;
  }
  
  .tulisan-home h1 {
    font-size: 2rem;
    line-height: 1.5;
    color: #333;
    margin-bottom: 10px;
  }
  
  .tulisan-home p {
    font-size: 1rem;
    line-height: 1.5;
    color: #666;
    margin-bottom: 20px;
  }
  
  /* Responsive Styles */
  @media (min-width: 50rem) {
    .responsive-logo {
      width: min(100%, 25rem);
    }
    .column {
      margin-right: 10px;
    }
  }
  
  @media (max-width: 50rem) {
    .responsive-logo {
      width: min(70%, 25rem);
      position:absolute;
      top:50px;
      margin-left:6%;
      margin-right:auto;
      margin-bottom:50px;
    }
    .responsive-button {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
      gap: 10px;
      margin-top:10px;
    }
    .font-atas{
        margin-top:20px;
    }
  }
  
}

</style>
<body>
  <main class="container-home">
    <div class="responsive-padding responsive-flex align-items-center justify-content-center gap-1">
      <div class="column">
        <div class="tulisan-home">
          <h1 class="font-atas text-white responsive-font fw-semibold fs-1">
            Selamat Datang, 
            <span class="text-primary">

              <?php
              $result = mysqli_query($conn,"select nama_guru from guru WHERE nip = " . $_SESSION['user'] . " limit 1");
              $row = mysqli_fetch_array($result);
              if($row){
               
              echo "$row[0]";
                 
              }
              else{
                  echo "Nama Kosong";
              }
              ?>
              </span>
          </h1>
          <p class="text-white responsive-font fw-regular fs-5">
            <!--Disini kamu bisa belajar mengenai materi dan langsung mengerjakan quiz.-->
          </p>
        </div>
        <div class="responsive-button">
          <a class="btn btn-outline-primary" type="button" href="quiz-guru.php">Buat Quiza</a>
          <a class="btn btn-outline-primary" type="button" href="about.html">Tentang</a>
          <a class="btn btn-outline-primary" type="button" href="profil-guru.php">Profil</a>
          <a class="btn btn-outline-secondary" type="button" href="logout.php">Logout</a>
        </div>
      </div>

      <a href="https://www.unimed.ac.id" class="responsive-logo">
        <img class="responsive-logo" src="assets/unimednoLogo.png" alt="logo unimed" />
        <!--<img class="responsive-logo" src="https://www.unimed.ac.id/wp-content/uploads/2022/07/Unimed-2.svg" alt="logo unimed" />-->
      </a>
    </div>
  </main>

  <!-- Audio played throughout the quiz -->
  <audio autoplay loop>
    <source src="assets/sound.mp3" type="audio/mp3" />
  </audio>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
