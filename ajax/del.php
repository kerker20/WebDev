<?php
session_start();
include('../process.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($mysqli, "delete from msg where id='$id'");
}
