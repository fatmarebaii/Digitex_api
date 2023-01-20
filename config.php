<?php
$con = mysqli_connect("localhost","root","","db_isa");
if($con){
    echo "DB connected";
}
else{ 
    echo "DB connection is failed" ;
}
?>