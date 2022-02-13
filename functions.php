<?php
    define('DB_SERVER','localhost'); 
    define('DB_USER', 'root'); 
    define('DB_PASS','');
    define('DB_NAME','register_oop');

    class DB_CON {
        function __construct(){
            // เชื่อมต่อไปยัง database
            $conn = mysqli_connect(DB_SERVER , DB_USER , DB_PASS , DB_NAME);
            $this->dbcon = $conn;

            if(mysqli_connect_errno()){
                echo "Failed to connect to mysql" . mysqli_connect_error();
            }
        }

        // method สำหรับเช็ค User ในระบบว่ามีชื่อซ้ำกันไหม
        public function usernameavailable($uname){
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username = '$uname'");
            return $checkuser;
        }

        // method สำหรับเพิ่มข้อมูลลง database เมื่อมีการสมัครสมาชิก
        public function registration($fname, $uname , $uemail , $password){
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, username , useremail , password) VALUES('$fname', '$uname' , '$uemail' , '$password')");
            return $reg;
        }

        // method สำหรับเช็ค user ในการ login
        public function signin($uname , $password){
            $signinquery = mysqli_query($this->dbcon , "SELECT id , fullname FROM tblusers WHERE username = '$uname' AND password = '$password'");
            return $signinquery;
        }
    }
?>