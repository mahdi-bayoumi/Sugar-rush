<?php
require_once '../../pdpConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryId = $_POST['category']; // Assuming the selected category ID is sent via POST
    $itemName = $_POST['item_name'];
   // $itemDescription = $_POST['description'];
    $price = $_POST['item_price'];

    // Prepare SQL statement to insert data into the 'items' table
    $sql = "INSERT INTO items (id, category_id, name, price) VALUES (NULL, :categoryId, :itemName, :price)";
    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->bindParam(':itemName', $itemName);
       // $stmt->bindParam(':itemDescription', $itemDescription);
        $stmt->bindParam(':price', $price);

        if ($stmt->execute()) {
       header("Location: admin_session.php");
        exit();
        } else {

        }
        $stmt->closeCursor(); // Optional: closeCursor() for good practice
    } else {

    }

    $pdo = null; // Close the connection
}
?>
