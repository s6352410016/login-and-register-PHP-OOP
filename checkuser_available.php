<?php 

    include_once('functions.php');

    $usernamecheck = new DB_CON();

    // รับค่าที่ POST มา
    $uname = $_POST['username'];

    $sql = $usernamecheck->usernameavailable($uname);

    // เช็คข้อมูลที่อยู่ใน row ใน database ว่ามีแล้วรึยัง 
    $num = mysqli_num_rows($sql);

    if($num > 0){
        echo "<span style='color: red;'>This username already exists in the system.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }else{
        echo "<span style='color: green;'>This username is available.</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }

?>