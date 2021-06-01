<?php
if (isset($_GET['msg'])) {
    include('../process.php');
    $msg = $_GET['msg'];
    $user = $_SESSION['name1'];
    $rece = $_GET['rece'];
    if ($msg == "") {
        echo "<script>alert('Enter your Message...');</script>";
    } else {
        $mysqli->query("INSERT INTO msg (user,teacher,msg) VALUES ('$user','$rece','$msg')") or die($mysqli->error);
    }
}
