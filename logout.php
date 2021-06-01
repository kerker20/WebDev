<?php

include 'process.php';

session_destroy();

header("location: adminlogin.php");
