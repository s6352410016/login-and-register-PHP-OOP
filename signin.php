<?php

    // มีการใช้ session ต้องเรียกใช้ฟังค์ชั่นนี้ไว้บนสุดเสมอ
    session_start();
    include_once('functions.php');
    $userdata = new DB_CON();

    if(isset($_POST['login'])){
        $uname = $_POST['username'];
        $password = md5($_POST['password']);

        $result = $userdata->signin($uname ,  $password);
        $num = mysqli_fetch_array($result);

        // สร้าง session ขึ้นมาเพื่อนำไปแสดงบอก user
        if($num > 0){
            $_SESSION['id'] = $num['id'];
            $_SESSION['fullname'] = $num['fullname'];

            echo "<script>alert('Login Successful');</script>";
            echo "<script>window.location.href='welcome.php'</script>";  // Redirect ไปยังหน้าเพจ welcome
        }else{
            echo "<script>alert('Invalid username or password.');</script>";
            echo "<script>window.location.href='signin.php'</script>";  // Redirect ไปยังหน้าเพจ Signin
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <br>
        <h1 style="text-align:center">Login Page</h1>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username">
                <span id="usernameavailable"></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-success">Login</button>
            <a href="index.php" class="btn btn-primary">Create accout</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>