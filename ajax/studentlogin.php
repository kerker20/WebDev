<?php
    include('../process.php');
    if(isset($_GET['email'])){

        $email=mysqli_real_escape_string($mysqli,strip_tags(preg_replace('#[^@.0-9a-zA-Z]#i','',$_GET['email'])));
        $pass=mysqli_real_escape_string($mysqli,strip_tags(preg_replace('#[^@.0-9a-zA-Z]#i','',$_GET['pass'])));

        $encrypt = md5($pass);

        $query="select * from students where email='$email' && pass='$encrypt'";

         $check = mysqli_num_rows(mysqli_query($mysqli,$query));

        if($check=='1'){
            $name = mysqli_fetch_array(mysqli_query($mysqli,$query));
            $_SESSION['name'] = $name['name'];
            $_SESSION['email'] = $name['email'];

            echo "<script>window.open('student.php','_self');</script>";	
        }
        else{
            echo "<script>window.open('none.php','_self');</script>";	
        }
    }
