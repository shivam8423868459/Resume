<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Print Resume</title>
    <link rel="stylesheet" href="temp.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h2>
<button class="btn" onclick="window.print()">Print</button>
</h2>
    <div class="container">
        <h2>Resume</h2>
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

                // Check if a search query is set
                if (isset($_GET['search'])) {
                    $search = $conn->real_escape_string($_GET['search']);
                    // Modify the SQL query to include the search term
                    $sql = "SELECT fname, lname, email,gender, add1, add2, phone, message,exp,language,img,addmore, hboard, hrollno, hpercentage, iboard, irollno, ipercentage, gcourse, gboard, grollno, gpercentage, pgcourse, pgboard, pgrollno, pgpercentage 
                            FROM resumes 
                            WHERE fname LIKE '%$search%' OR lname LIKE '%$search%' OR email LIKE '%$search%'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<table class='auto-style1'>";
                            echo "<tr>";
                            echo "<td class='auto-style1' colspan='2'><h1>".$row["fname"]." ".$row["lname"]."</h1></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td class='auto-style1' colspan='2'><h3>PERSONAL DETAILS-</h3></td>";
                            echo "</tr>";
                           
                            echo "<tr>";
                            echo "<td class='auto-style2' colspan='2'>Email-".$row["email"]."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td class='auto-style3'>Phone no-".$row["phone"]."</td>";
                            echo "<td class='auto-style5'>Address-".$row["add1"]."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td class='auto-style5'>Pincode-".$row["add2"]."</td>";
                            echo "<td>Date Of Birth-</td>";
                            echo "<td>Gender-".$row["gender"]."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td><h3>SKILLS</h3></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>".$row["message"]."</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td><h3>EXPERIENCE</h3></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>".$row["exp"]."</td>";
                            echo "</tr>";
                            
                            echo "<tr>";
                            echo "<td>&nbsp;</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td><h3>LANGUAGE</h3></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>".$row["language"]."</td>";
                            echo "</tr>";
                            
                            echo "<tr>";
                            echo "<td>&nbsp;</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td colspan='3'><h3>EDUCATION</h3></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td><h4>HIGH SCHOOL</h4></td>";
                            echo "<td><h4>INTERMEDIATE/DIPLOMA</h4></td>";
                            echo "<td><h4>GRADUATION</h4></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Board-".$row["hboard"]."<br />Rollno-".$row["hrollno"]."<br />Percentage-".$row["hpercentage"]."%</td>";
                            echo "<td>Board-".$row["iboard"]."<br />Rollno-".$row["irollno"]."<br />Percentage-".$row["ipercentage"]."%</td>";
                            echo "<td>Course-".$row["gcourse"]."<br />Board-".$row["gboard"]."<br />Rollno-".$row["grollno"]."<br />Percentage-".$row["gpercentage"]."%</td>";
                            echo "</tr>";
                            echo '<div class="passport-pic">';
                            echo "<img src='" . $row["img"] . "' alt='Passport Picture'>";
                            echo '</div>';
                            echo "</table>";
                            echo "<td><h3>Other Information</h3></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>".$row["addmore"]."</td>";
                            echo "</tr>";
                            
                        }
                    } else {
                        echo "<tr><td colspan='8'>No resumes found.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Please enter a search term.</td></tr>";
                }
