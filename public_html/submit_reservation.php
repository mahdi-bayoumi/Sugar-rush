<?php
require_once '../connection.php'; 
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if reservation is confirmed
    if (isset($_POST["reservation_confirmed"]) && $_POST["reservation_confirmed"] == 1) {
        // Retrieve form data
        $arrival_date = $_POST["arrival_date"];
        $arrival_time = $_POST["arrival_time"];
        $tables = $_POST["tables"];
        $adults = $_POST["adults"];
        $kids = $_POST["kids"];

       
        
        
       
        
        // Prepare SQL statement
        $sql = "INSERT INTO reservations (arrival_date, arrival_time, tables, adults, kids)
                VALUES ('$arrival_date', '$arrival_time', '$tables', '$adults', '$kids')";
        
        if ($con->query($sql) === TRUE) {
            // Redirect user after successful reservation
            header("Location: index.php");
            exit; // Stop further execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    } else {
        // Reservation not confirmed, handle accordingly
        echo "Reservation not confirmed!";
    }
}
?>
