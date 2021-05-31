<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'privatetutor') or die(mysqli_error($mysqli));



if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $subjects = $_POST['subjects'];
    $type = $_POST['type'];
    $payment = $_POST['payment'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];



    $mysqli->query("Insert into teacherinfo (name,subjects,type,address,contact,payment,status) values('$username','$subjects','$type','$address','$contact','$payment',1)") or die($mysqli->error);
    $mysqli->query("UPDATE users SET status = 0 WHERE name = '" . $_SESSION['name'] . "';") or die($mysqli->error);


    header("location: teacher.php");
}

if (isset($_POST['request'])) {

    $subjects = $_POST['subjects'];
    $name = $_POST['name'];
    $payment = $_POST['payment'];
    $teacher = $_POST['teacher'];
    $type = $_POST['type'];
    $address = $_POST['address'];


    $mysqli->query("Insert into studentrequest (name,subjects,payment,teacher,type,address,status) values('$name','$subjects','$payment','$teacher','$type','$address',0)") or die($mysqli->error);
    $mysqli->query("Insert into request (name,subjects,payment,teacher,type,address,status,obtain) values('$name','$subjects','$payment','$teacher','$type','$address',0,'no')") or die($mysqli->error);

    header("location: studentReq.php");
}

if (isset($_GET['cancel'])) {
    $id = $_GET['cancel'];

    $mysqli->query("Delete from studentrequest where id='$id'") or die($mysqli->error);
    header("location: studentReq.php");
}


if (isset($_GET['logoutT'])) {

    $user = $_SESSION['email'];

    mysqli_query($mysqli, "update users set status=0 where email='$user'") or die($mysqli->error);

    session_destroy();

    header("location: login.php");
}
if (isset($_GET['logout'])) {

    $user = $_SESSION['email'];

    mysqli_query($mysqli, "update users set status=0 where email='$user'") or die($mysqli->error);

    session_destroy();

    header("location: studentlogin.php");
}

if (isset($_GET['dropcourse'])) {

    $user = $_GET['dropcourse'];

    mysqli_query($mysqli, "DELETE FROM request WHERE subjects='$user'") or die($mysqli->error);

    header("location: teacher.php");
}
if (isset($_GET['dropstud'])) {

    $user = $_GET['dropstud'];

    mysqli_query($mysqli, "DELETE FROM request WHERE name='$user'") or die($mysqli->error);

    header("location: teacher.php");
}

if (isset($_GET['refuse'])) {

    $id = $_GET['refuse'];

    mysqli_query($mysqli, "DELETE FROM request WHERE id='$id'") or die($mysqli->error);

    header("location: teacher.php");
}


if (isset($_GET['accept'])) {

    $id = $_GET['accept'];
    $student = $_GET['name'];

    mysqli_query($mysqli, "update request set obtain= 'yes', status = 1 where name='$student' && teacher='" . $_SESSION['name'] . "'") or die($mysqli->error);
    mysqli_query($mysqli, "update teacherinfo set status=0 where name='" . $_SESSION['name'] . "'") or die($mysqli->error);

    header("location: teacher.php");
}
