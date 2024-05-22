<?php
require_once '../../pdpConnection.php';

if(isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    // Fetch the order details
    $query = "SELECT * FROM orders WHERE id = :order_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':order_id', $orderId);
    $stmt->execute();
    $order = $stmt->fetch(PDO::FETCH_ASSOC);

    if($order) {
        // Insert the order into the history table
        $insertQuery = "INSERT INTO history (type, link_id, user_id, description, branch, time, total) 
                        VALUES (:type, :link_id, :user_id, :description, :branch, :time, :total)";
        $stmt = $pdo->prepare($insertQuery);
        $type = "order_completed";
        $linkId = $orderId;
        $userId = $order['user_id'];
        $description = $order['description'];
        $branch = $order['branch'];
        $time = $order['time'];
        $total = $order['total'];
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':link_id', $linkId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':branch', $branch);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':total', $total);
        $stmt->execute();

        // Delete the order from the 'orders' table
        $deleteQuery = "DELETE FROM orders WHERE id = :order_id";
        $stmt = $pdo->prepare($deleteQuery);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();

        // Return a success message if needed
        echo "Order marked as done and moved to history.";
    } else {
        // Return an error message if the order is not found
        echo "Order not found.";
    }
} else {
    // Handle cases where the order_id parameter is not set
    echo "Order ID not provided.";
}
?>
