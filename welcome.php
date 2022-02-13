<?php

    // มีการใช้ session ต้องเรียกใช้ฟังค์ชั่นนี้ไว้บนสุดเสมอ
    session_start();

    // เช็คว่ามีการ login เข้ามาแล้วรึยัง
    if($_SESSION['id'] == ""){
        header("location: signin.php"); // ฟังค์ชั่น redirect ไปยังหน้า login 
    }else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <h1 class="mt-5">Welcome to <?php echo $_SESSION['fullname']; ?></h1>
        <hr>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

    }
?>
