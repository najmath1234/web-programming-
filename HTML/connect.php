<?php
$servername="localhost";
$username="root";
$password="";
$dbname="DBMS";
//create connection
$conn=new mysqli($servername,$username,$password,$dbname);
//check connection
if($conn->connect_error)
{
	die("connection failed:".$conn->connect_error);
}
else
{
	echo"connection successful";
}
//sql to create table
$sql="CREATE TABLE MYGUESTS (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
if($conn->query($sql)===TRUE)
{
	echo "table myGuestes created successfully";
}
else
{
	echo "Error creating table:".$conn->error;
}
$conn->close();
?>