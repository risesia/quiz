<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
     if (!isset($_SESSION['user'])) {
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
      }else{
           if ($_SESSION['master']==1) {
            echo "<script type='text/javascript'>window.location.href='home-guru.php';</script>";
           }
      }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz | QUIZA</title>
    <!-- CSS only bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <!-- FontAweome CDN Link for Icons-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
  </head>

  <body>
  <span id="userx" style="display: none;"><?=$_SESSION['user']?></span>
    <!-- start Quiz button -->
    <div class="start_btn"><button><b>Mulai Kuy</b></button></div>

    <!-- back-home -->
    <a href="home.php"><button class="back_btn_quizz">Kembali</button> </a>

    <!-- Info Box -->
    <div class="responsive_info">
      <div class="info_box">
        <div class="info-title"><span>Ikutin peraturannya yaaa</span></div>
        <div class="info-list">
          <div class="info">
            1. Kamu cuma punya waktu <span>15 Detik</span> untuk setiap
            pertanyaan.
          </div>
          <div class="info">
            2. Kalau kamu sudah memilih jawaban, gak bisa diganti lagi ya.
          </div>
          <div class="info">
            3. Kamu gak bisa memilih opsi apa pun setelah waktu habis.
          </div>
          <div class="info">
            4. Kamu gak bisa keluar dari Kuis saat sedang bermain.
          </div>
          <div class="info">
            5. Kamu bakal dapat poin berdasarkan jawaban kamu yang benar.
          </div>
        </div>
        
         <div class="buttons">
             <div>
                 
             <input type="text" id="quizcode" placeholder="Kode Quiz" class="input-quizz">
             </div>
        <button class="restart">Lanjut</button>
        <a href="home.php"><button class="quit">Kembali</button></a>
      </div>
        
      </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
      <header>
        <div class="title">Jawab tuh soalnya</div>
        <div class="timer">
          <div class="time_left_txt"><b>Time left</b></div>
          <div class="timer_sec">15</div>
        </div>
        <div class="time_line"></div>
      </header>
      <section>
        <div class="que_text"></div>
        <div class="option_list"></div>
      </section>

      <!-- footer of Quiz Box -->
      <footer>
        <div class="total_que"></div>
        <button class="next_btn">Next</button>
      </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
      <div class="icon">
        <img src="assets/unimed.png" alt="" class="result-logo" />
      </div>
      <div class="complete_text">
        Yeayy kamu berhasil menyelesaikan Quiznyaaa!
      </div>
      <div class="score_text"></div>
      <div class="buttons">
        <button class="restart">ulang?</button>
        <a href="home.php"><button class="quit">udahan?</button></a>
      </div>
    </div>
    <!-- audio -->
    <audio autoplay loop>
      <source src="assets/sound.mp3" type="audio/mp3" />
    </audio>
    <!-- audio end -->

    <!-- pertanyaan -->
    <script src="js/questions.js"></script>

    <script src="js/script.js"></script>
  </body>
</html>
