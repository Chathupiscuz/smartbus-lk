<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "smartbus"
);

if(!$conn){
    die("Database Failed");
}

?>