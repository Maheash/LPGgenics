<?php

$dbhost="localhost";
$dbname="user_db";
$dbuser="root";
$dbpw="";

if(!$con=mysqli_connect($dbhost,$dbuser,$dbpw,$dbname))
{
    die("failed to connect");
}
