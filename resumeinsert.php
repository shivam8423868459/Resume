<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "8423";
$dbname = "insertjob";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO resumes ( fname, lname, email, gender, add1, add2, phone,message,exp,language, hboard, hrollno, hpercentage, iboard, irollno, ipercentage, gcourse, gboard, grollno, gpercentage, pgcourse, pgboard, pgrollno, pgpercentage,img,addmore)
 VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?, ?,?,?,?)");

// Check if prepare() succeeded
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("sssssissssssssssssssssssss", $fname, $lname, $email, $gender, $add1, $add2, $phone,$message,$exp,$language, $hboard, $hrollno, $hpercentage, $iboard, $irollno, $ipercentage, $gcourse, $gboard, $grollno, $gpercentage, $pgcourse, $pgboard, $pgrollno, $pgpercentage,$img,$addmore);

// Set parameters from POST data (assuming form method="post")
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$exp = $_POST['exp'];
$language = $_POST['language'];
$hboard = $_POST['hboard'];
$hrollno = $_POST['hrollno'];
$hpercentage = $_POST['hpercentage'];
$iboard = $_POST['iboard'];
$irollno = $_POST['irollno'];
$ipercentage = $_POST['ipercentage'];
$gcourse = $_POST['gcourse'];
$gboard = $_POST['gboard'];
$grollno = $_POST['grollno'];
$gpercentage = $_POST['gpercentage'];
$pgcourse = $_POST['pgcourse'];
$pgboard = $_POST['pgboard'];
$pgrollno = $_POST['pgrollno'];
$pgpercentage = $_POST['pgpercentage'];
$img = $_POST['img'];
$addmore = $_POST['addmore'];

// Execute statement
if ($stmt->execute()) {
    
    header("Location: searchresume.html");
    exit();
} else {
    // Incorrect credentials, display error message
    echo "<script>alert('Invalid ID or Password'); window.location.href='index.html';</script>";

    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
