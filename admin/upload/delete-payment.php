<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schooldb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $studentID = $conn->real_escape_string($_POST['studentID']);

    // Delete record
    $sql = "DELETE FROM tbl_payments WHERE studentID = '$studentID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../stud_profile.php?error=delete-success");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
