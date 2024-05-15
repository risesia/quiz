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
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Guru | QUIZA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./style.css" />
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
  <main>
   

          <?php
          $sql = mysqli_query($conn, "SELECT * FROM guru WHERE nip = " . $_SESSION['user'] . ";");
          $hasil = mysqli_fetch_array($sql, MYSQLI_ASSOC);
          $time = strtotime($hasil['created_at']); 
          $waktu = date("d F Y H:i:s A", $time); 
          $Utime = strtotime($hasil['updated_at']); 
          $Uwaktu = date("d F Y H:i:s A", $Utime); 
             
          echo '
          <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">

            <h1 style="color:#6eeb83;" class="responsive-font fw-semibold fs-1">
              <a style="text-decoration:none; color:#6eeb83;" href="home-guru.php"><i class="bi bi-arrow-left-circle-fill"></i></a>
              <br>Profil
            </h1>
            ';
            ?>
            <center>
              <div class="flex-shrink-0">
                <img src=<?php echo 'assets/profil_pict/'.$_SESSION['user'].'.jpg'; ?> alt="Foto Profil" onerror="this.onerror=null; this.src='assets/profil_pict/anon.jpg'"
                  class="img-fluid rounded-circle border border-dark border-3" style="width: 150px; margin: 30px 0;">
              </div>
            </center>
<?php        echo '
            <table class="table">
              <tbody>
              <tr>
                  <th scope="row">NIP</th>
                  <td>' . $hasil["nip"]. '</td>
                </tr>
                <tr>
                  <th scope="row">Nama</th>
                  <td id="namasiswa">' . $hasil["nama_guru"] . '</td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td>' . $hasil["email"] . '</td>
                </tr>
                <tr>
                  <th scope="row">Tanggal Dibuat</th>
                  <td>' . $waktu . '</td>
                </tr>
                <tr>
                  <th scope="row">Tanggal Diedit</th>
                  <td>' . $Uwaktu . '</td>
                </tr>
              </tbody>
            </table>
        
        <br>

          </div>
        </div>
        
         
         ';
          ?>


  </main>

  <!-- audio played troughout the quiz -->
  <audio autoplay loop>
    <source src="assets/sound.mp3" type="audio/mp3" />
  </audio>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
    
    <script>
if("<?php echo $xw;?>"==1){
    ('#qcWarn').hide();
}
var x1 = "<?php echo $x1; ?>";
var x2 = "<?php echo $x2; ?>";
var x3 = "<?php echo $x3; ?>";
var x4 = "<?php echo $x4 ?>";

var y1 = "<?php echo $hasil2[0][2]; ?>";
var y2 = "<?php echo $hasil2[1][2]; ?>";
var y3 = "<?php echo $hasil2[2][2]; ?>";
var y4 = "<?php echo $hasil2[3][2]; ?>";
    
    google.charts.load('current',{packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

const data = google.visualization.arrayToDataTable([
  ['Tanggal', 'Skor'],
  [x1,parseInt(y1)],
  [x2,parseInt(y2)],
  [x3,parseInt(y3)],
  [x4,parseInt(y4)],
]);

const options = {
  title: 'Riwayat Skor Quiz'
};

const chart = new google.visualization.BarChart(document.getElementById('qChart'));
chart.draw(data, options);

}


    </script>
    
    <script type="text/javascript">
    
    
        function tesjs() {
    $.post("tesjsphp.php",
    {
        name: $("#namasiswa").text(),
        amount: 3,
        times: '1,2,3,4,5,6,7',
    },
    function(data,status){
        document.getElementById("saveWarningText").innerHTML = data;
        $( "#saveWarningText" ).fadeIn(100);
        setTimeout(function(){ $( "#saveWarningText" ).fadeOut(100); }, 3000);
    });
  
}

function opentesjs(username) {
    $.post(
        "returndata.php",
        { name: username },
        function(response) {
            var myvariable = response.amount;
            var times = response.times;

            console.log('Retreived data: ', myvariable, times);
        }, 'json'
    );  
}
    </script>
</body>

</html>