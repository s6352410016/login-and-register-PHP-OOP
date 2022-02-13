<?php

    // มีการใช้ session ต้องเรียกใช้ฟังค์ชั่นนี้ไว้บนสุดเสมอ
    session_start();

    // ทำการเคลีย session เมื่อ logout 
    session_destroy();
    header("location: signin.php");
?>