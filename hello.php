<?php
$servername ="localhost";
$username ="root";
$pass ="";
$dbname ="brilliant_web_design";

$conn = mysqli_connect($servername,$username,$pass,$dbname);

if($conn)
{
    echo "<h1>you are connected to the database";
}
else 
{

    echo "<h1>no connection</h1>";

}

?>
