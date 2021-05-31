<?php
    include('../process.php');
    if(isset($_GET['email'])){

        $email=mysqli_real_escape_string($mysqli,strip_tags(preg_replace('#[^@.0-9a-zA-Z]#i','',$_GET['email'])));
        $pass=mysqli_real_escape_string($mysqli,strip_tags(preg_replace('#[^@.0-9a-zA-Z]#i','',$_GET['pass'])));

        $encrypt = md5($pass);

        $query="select * from users where email='$email' && pass='$encrypt'";

         $check = mysqli_num_rows(mysqli_query($mysqli,$query));

        if($check=='1'){
            $name = mysqli_fetch_array(mysqli_query($mysqli,$query));
            $_SESSION['id'] = $name['user_id'];
            $_SESSION['name'] = $name['name'];
            $_SESSION['email'] = $name['email'];

            $result = $mysqli->query("SELECT status FROM users WHERE name='".$_SESSION['name']."'") or die($mysqli->error);

            if(mysqli_num_rows($result) == 1){
                $row = $result->fetch_array();
                if($stat = $row['status'] == 0){
                    echo "<script>window.open('teacher.php','_self');</script>";	
                }else{
                    echo "<script>window.open('index.php','_self');</script>";	
                }
            }
        }
        else{
            echo "<script>window.open('none.php','_self');</script>";	
        }
    }
?>