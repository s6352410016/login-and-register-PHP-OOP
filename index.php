<?php
    include_once('functions.php');
    $userdata = new DB_CON();

    // เช็คว่ามีการ submit แล้วรึยัง ถ้ามีรับค่ามาเก็บลงตัวแปร
    if(isset($_POST['submit'])){
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];
        $uemail = $_POST['email'];
        $password = md5($_POST['password']); 

        $sql = $userdata->registration($fname , $uname , $uemail , $password);

        // เช็คข้อมูลที่บันทึกลง database ว่ามี error ไหม 
        if($sql){
            echo "<script>alert('Register Successful');</script>";
            echo "<script>window.location.href='signin.php'</script>";  // Redirect ไปยังหน้าเพจ Signin
        }else{
            echo "<script>alert('Someting Went Wrong');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <br>
        <h1 style="text-align:center">Register Page</h1>
        <form method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="username" name="fullname">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" oninput="checkusername(this.value);">
                <span id="usernameavailable"></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-success">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- ฟังค์ชั่นเช็ค Username ในระบบ -->
    <script>
        function checkusername(value){
            $.ajax({
                type: 'POST',
                url: 'checkuser_available.php',
                data: 'username='+value,
                success: function(data){
                    $('#usernameavailable').html(data);
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>