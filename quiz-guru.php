 <?php
    //   session_start();
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
<!--user session is disabled for this dev branch-->
<!--as I didn't know how to set up the db-->

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Upload Quiz | QUIZA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="style.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
  <main>
   
   
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = " . $_SESSION['user'] . ";");
          $hasil = mysqli_fetch_array($sql, MYSQLI_ASSOC);
          

          echo '
          
          <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">

           <h1 style="color:#6eeb83;" id="jsonText" class="responsive-font fw-semibold fs-1">
              <a style="text-decoration:none; color:#6eeb83;" href="home-guru.php"><i class="bi bi-arrow-left-circle-fill"></i></a>
             <br>Buat Quiz
            </h1>
            
         
          <form action="quiz-guru.php" method="post"  enctype="multipart/form-data">
        
        
               <input type="text" class="form-control mb-5" name="namafile" placeholder="Nama Quiz">
        
            <div class="form-group">
               <input type="text" class="form-control" name="soal1" placeholder="Soal 1">
               <input type="text" class="form-control Ans" name="soal1A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal1B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal1C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal1Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal2" placeholder="Soal 2">
               <input type="text" class="form-control Ans" name="soal2A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal2B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal2C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal2Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal3" placeholder="Soal 3">
               <input type="text" class="form-control Ans" name="soal3A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal3B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal3C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal3Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal4" placeholder="Soal 4">
               <input type="text" class="form-control Ans" name="soal4A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal4B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal4C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal4Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal5" placeholder="Soal 5">
               <input type="text" class="form-control Ans" name="soal5A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal5B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal5C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal5Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal6" placeholder="Soal 6">
               <input type="text" class="form-control Ans" name="soal6A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal6B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal6C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal6Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal7" placeholder="Soal 7">
               <input type="text" class="form-control Ans" name="soal7A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal7B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal7C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal7Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal8" placeholder="Soal 8">
               <input type="text" class="form-control Ans" name="soal8A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal8B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal8C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal8Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal9" placeholder="Soal 9">
               <input type="text" class="form-control Ans" name="soal9A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal9B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal9C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal9Q" placeholder="Jawaban">
            </div>
            
            <div class="form-group">
               <input type="text" class="form-control" name="soal10" placeholder="Soal 10">
               <input type="text" class="form-control Ans" name="soal10A" placeholder="Pilihan A">
               <input type="text" class="form-control Ans" name="soal10B" placeholder="Pilihan B">
               <input type="text" class="form-control Ans" name="soal10C" placeholder="Pilihan C">
               <input type="text" class="form-control Ans checkedAns" name="soal10Q" placeholder="Jawaban">
            </div>
            
           <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Upload" name="submit">
            </div>
        </form>
        
          </div>
        </div>
        
         
         ';
            
if($_POST['submit'] and $_SERVER['REQUEST_METHOD'] == "POST"){
    $file = 'js/question/'.$_POST['namafile'].'.json';
  
    $arr = array(array('numb' => 1,
            'question' => $_POST['soal1'],
            'answer' => $_POST['soal1Q'],
            'options' => [
          $_POST['soal1A'],
          $_POST['soal1B'],
          $_POST['soal1C'],
          $_POST['soal1Q']]
    ), array('numb' => 2,
            'question' => $_POST['soal2'],
            'answer' => $_POST['soal2Q'],
            'options' => [
          $_POST['soal2A'],
          $_POST['soal2B'],
          $_POST['soal2C'],
          $_POST['soal2']]
    ), array('numb' => 3,
            'question' => $_POST['soal3'],
            'answer' => $_POST['soal3Q'],
            'options' => [
          $_POST['soal3A'],
          $_POST['soal3B'],
          $_POST['soal3C'],
          $_POST['soal3Q']]
    ), array('numb' => 4,
            'question' => $_POST['soal4'],
            'answer' => $_POST['soal4Q'],
            'options' => [
          $_POST['soal4A'],
          $_POST['soal4B'],
          $_POST['soal4C'],
          $_POST['soal4Q']]
    ), array('numb' => 5,
            'question' => $_POST['soal5'],
            'answer' => $_POST['soal5Q'],
            'options' => [
          $_POST['soal5A'],
          $_POST['soal5B'],
          $_POST['soal5C'],
          $_POST['soal5Q']]
    ), array('numb' => 6,
            'question' => $_POST['soal6'],
            'answer' => $_POST['soal6Q'],
            'options' => [
          $_POST['soal6A'],
          $_POST['soal6B'],
          $_POST['soal6C'],
          $_POST['soal6Q']]
    ), array('numb' => 7,
            'question' => $_POST['soal7'],
            'answer' => $_POST['soal7Q'],
            'options' => [
          $_POST['soal7A'],
          $_POST['soal7B'],
          $_POST['soal7C'],
          $_POST['soal7Q']]
    ), array('numb' => 8,
            'question' => $_POST['soal8'],
            'answer' => $_POST['soal8Q'],
            'options' => [
          $_POST['soal8A'],
          $_POST['soal8B'],
          $_POST['soal8C'],
          $_POST['soal8Q']]
    ), array('numb' => 9,
            'question' => $_POST['soal9'],
            'answer' => $_POST['soal9Q'],
            'options' => [
          $_POST['soal9A'],
          $_POST['soal9B'],
          $_POST['soal9C'],
          $_POST['soal9Q']]
    ), array('numb' => 10,
            'question' => $_POST['soal10'],
            'answer' => $_POST['soal10Q'],
            'options' => [
          $_POST['soal10A'],
          $_POST['soal10B'],
          $_POST['soal10C'],
          $_POST['soal10Q']]
    )
    );
    
    $json_string = json_encode($arr);
    file_put_contents($file, $json_string);
}
         
      
          ?>


  </main>

  <!-- audio played troughout the quiz -->
  <audio autoplay loop>
    <source src="assets/sound.mp3" type="audio/mp3" />
  </audio>

<script>

</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>