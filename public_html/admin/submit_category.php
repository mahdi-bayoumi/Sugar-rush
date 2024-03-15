<?php
// Assuming you have a database connection already established
     require_once '../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $category = $_POST['category_name'];
    $description = $_POST['description'];

    // Prepare SQL statement
    $sql = "INSERT INTO categories (id, name, CatDescriiption) VALUES (NULL, ?, ?)";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute
        $stmt->bind_param("ss", $category, $description);
        if ($stmt->execute()) {
            header("location: admin_session.php");
        } else {

        }
        $stmt->close();
    } else {

    }
    
    $con->close();
}
?>
