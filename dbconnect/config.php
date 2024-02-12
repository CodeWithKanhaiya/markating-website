<?php
$con=mysqli_connect("localhost","root","","project");
if(!$con){
    die("connection failed ".mysqli_error_connect($con));
}