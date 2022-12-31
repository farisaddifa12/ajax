<?php
 
 header('Content-Type: application/json; charset=utf8');
 
/// Create connection

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "ajax";

 $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

 //query tabel produk
 $sql="SELECT * FROM `submit`";
 $result = $conn->query($sql);

//data array
 $array=array();
//  while($data=mysql_fetch_assoc($query)) $array[]=$data; 
 while($row = $result->fetch_assoc()) $array[]=$row;
 
//mengubah data array menjadi json
 echo json_encode($array);
?>