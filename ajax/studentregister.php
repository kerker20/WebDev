<?php
if (isset($_GET['name'])) {
    include('../process.php');
    $name = $_GET['name'];

    $email = mysqli_real_escape_string($mysqli, strip_tags(preg_replace('#[^@.0-9a-zA-Z]#i', '', $_GET['email'])));

    $pass1 = mysqli_real_escape_string($mysqli, strip_tags(preg_replace('#[^0-9a-zA-Z]#i', '', $_GET['pass'])));
    $pass2 = mysqli_real_escape_string($mysqli, strip_tags(preg_replace('#[^0-9a-zA-Z]#i', '', $_GET['pass1'])));

    if ($name == "" || $email == "" || $pass1 == "" || $pass2 == "") {
        echo "<script>alert('Please fill all the feilds...');</script>";
    } else if (strlen($name) < 5 || strlen($name) > 15) {
        echo "<script>alert('Name should be less the 20 and greater then 4 characters..');</script>";
    } else if ($pass1 != $pass2) {
        echo "<script>alert('Password does not match...');</script>";
    } else if (strlen($pass1) < 5 || strlen($pass1) > 20) {
        echo "<script>alert('Password should be less the 20 and greater then 4 characters..');</script>";
    } else if (mysqli_num_rows(mysqli_query($mysqli, "select * from user where user='$name'")) == 1) {
        echo "<script>alert('Username is already taken!...');</script>";
    } else {
        $encrypt = md5($pass2);

        $query = "Insert into students (name,email,pass,rpass,status) values('$name','$email','$encrypt','$pass2',1)";
        $run = mysqli_query($mysqli, $query);
        echo "<script>alert('You have signed successfully...');</script>";

        echo "<script>window.open('studentlogin.php','_self');</script>";
    }
}
