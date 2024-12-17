<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

// Establish connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo '<script>alert("Connected successfully")</script>';
}
$sql_t="CREATE TABLE IF NOT EXISTS student(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR (30) NOT NULL,
admiss_no VARCHAR(30) NOT NULL,
department VARCHAR(50) NOT NULL,
mob_no  INT(10) NOT NULL,
dob INT(10),
reg_date INT(10))";
if ($conn->query($sql_t)===TRUE)
{
	echo "Table student created successfully <br>";
}
else
{
	echo"Error creating table:" .$conn->error;
}
$sql_insert="INSERT INTO student(name,admiss_no,department,mob_no,dob,reg_date)
VALUES('AYSHA',12345,'physics',23456778,869549,483822)";
if ($conn->query($sql_insert) === TRUE)
{
    echo "New record created successfully.";
} else 
{
    echo "Error inserting data: " . $conn->error;
}
// Fetch and display data from the student table
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the data in a neat table
    echo '<center><h2>Student Details</h2></center>';
    echo '<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 80%; margin: 20px auto; text-align: left;">';
    echo '<thead><tr><th>ID</th><th>Name</th><th>Admission No</th><th>Department</th><th>Mobile No</th><th>DOB</th><th>Registration Date</th></tr></thead>';
    echo '<tbody>';
    
    // Loop through each row in the result and display data
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['admiss_no'] . '</td>';
        echo '<td>' . $row['department'] . '</td>';
        echo '<td>' . $row['mob_no'] . '</td>';
        echo '<td>' . $row['dob'] . '</td>';
        echo '<td>' . $row['reg_date'] . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else 
{
    echo '<p>No student data available.</p>';
}

$conn->close();
?>