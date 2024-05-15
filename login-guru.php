<?php
if (isset($_SESSION['user'])) {
     header("Location: home-guru.php");
     die();
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Guru | QUIZA</title>
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
            $sql = "SELECT * FROM guru WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            // echo '<script language=javascript> alert("")</script>';
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $onuser=$user['nip'];
                    session_start();
                    $_SESSION['user'] = $onuser;
                    $_SESSION['master'] =$user['master'];
                    
                    //  var_dump($_SESSION['user']);
                    // header("Location: https://google.com");
                    // die();
                    echo "<script type='text/javascript'>window.location.href='home-guru.php'</script>";
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <div class="container cont-none">
            <img src="assets/unimednoLogo.png" alt="" class="logo">
            <form action="login-guru.php" method="post">
                <div class="form-group">
                    <input type="email" placeholder="Enter Email:" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                </div>
                <div class="form-btn">
                    <input type="submit" value="Login sebagai Guru" name="login" class="btn btn-primary">
                </div>
                <br>
                    <a href="index.php">Login sebagai murid</a>
            </form>
        </div>
    </div>
</body>

</html>