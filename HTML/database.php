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
} else {
    echo '<p>No student data available.</p>';
}

$conn->close();
?>