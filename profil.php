 <?php
    //   session_start();
   if (!isset($_SESSION['user'])) {
            echo "<script type='text/javascript'>window.location.href='index.php';</script>";
      }else{
           if ($_SESSION['master']==1) {
            echo "<script type='text/javascript'>window.location.href='home-guru.php';</script>";
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
  <title>Profil | QUIZA</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./style.css" />
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
  <main>
   

          <?php
          $sql = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = " . $_SESSION['user'] . ";");
          $hasil = mysqli_fetch_array($sql, MYSQLI_ASSOC);
          $time = strtotime($hasil['created_at']); 
          $waktu = date("d F Y H:i:s A", $time); 
          $Utime = strtotime($hasil['updated_at']); 
          $Uwaktu = date("d F Y H:i:s A", $Utime); 
          
          $sql2 = mysqli_query($conn, "SELECT * FROM `hasil_quiz` WHERE nis=" . $_SESSION['user'] . " order by created_at asc limit 4;");
     
$hasil2= array();
while($line = mysqli_fetch_row($sql2)){
    $hasil2[] = $line;
    }
  
  
 if (is_null($hasil2[0][0])){
     $xw=1;
 }else{
$xw=0;
$xx1 = strtotime($hasil2[0][3]);
$xx2 = strtotime($hasil2[1][3]);
$xx3 = strtotime($hasil2[2][3]);
$xx4 = strtotime($hasil2[3][3]);
          
$x1 =  date("d F Y H:i:s A", $xx1);
$x2 =  date("d F Y H:i:s A", $xx2);
$x3 =  date("d F Y H:i:s A", $xx3);
$x4 =  date("d F Y H:i:s A", $xx4);

 }
       
          echo '
          
          <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">

            <h1 style="color:#6eeb83;" class="responsive-font fw-semibold fs-1">
              <a style="text-decoration:none; color:#6eeb83;" href="home.php"><i class="bi bi-arrow-left-circle-fill"></i></a>
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
                  <th scope="row">NIS</th>
                  <td>' . $hasil["nis"]. '</td>
                </tr>
                <tr>
                  <th scope="row">Nama</th>
                  <td id="namasiswa">' . $hasil["nama_siswa"] . '</td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td>' . $hasil["email"] . '</td>
                </tr>
                <tr>
                  <th scope="row">Kelas</th>
                  <td>' . $hasil["kelas"] . '</td>
                </tr>
                <tr>
                  <th scope="row">Tanggal Dibuat</th>
                  <td>' . $waktu . '</td>
                </tr>
                <tr>
                  <th scope="row">Tanggal Diedit</th>
                  <td>' . $Uwaktu . '</td>
                </tr>
                 <tr>
                  <th scope="row"><a href="change_profil.php">Ganti</a></th>
                  <td></td>
                </tr>
              </tbody>
            </table>
        
        <div id="qChart" style="width:100%; max-width:600px; height:500px;">
            <h1 id="qcWarn" class="responsive-font fw-semibold fs-1 text-center">
            Belum ada riwayat terakhir
            </h1>
        </div>
        <br>

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