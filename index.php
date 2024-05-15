<?php
if (isset($_SESSION['user'])) {
     header("Location: home.php");
     die();
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | QUIZA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body class="body-login">
    <div class="container ">
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM siswa WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            // echo '<script language=javascript> alert("")</script>';
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $onuser=$user['nis'];
                    session_start();
                    $_SESSION['user'] = $onuser;
                    $_SESSION['master'] =$user['master'];
                    //  var_dump($_SESSION['user']);
                    // header("Location: https://google.com");
                    // die();
                    echo "<script type='text/javascript'>window.location.href='home.php'</script>";
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <div class="container cont-none">
            <img src="assets/unimednoLogo.png" alt="foto unimed" class="logo logo-login">
            <!--<img src="https://www.unimed.ac.id/wp-content/uploads/2022/07/Unimed-2.svg" alt="foto unimed" class="logo">-->
            <form action="index.php" method="post">
                <div class="form-group">
                    <input type="email" placeholder="Enter Email:" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                </div>
                <div class="form-btn">
                    <input type="submit" value="Login" name="login" class="btn btn-primary">
                </div>
            </form>
            <div><br>
                <p>Belum Punya Akun? <a href="registration.php">Daftar disini</a></p>
                <p><a href="login-guru.php">Login Guru</a></p>
            </div>
        </div>
    </div>
</body>

</html>