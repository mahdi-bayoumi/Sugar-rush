<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changes'])) {
    require_once '../../pdpConnection.php';

    $changes = json_decode($_POST['changes'], true);

    foreach ($changes as $change) {
        $id = $change['id'];
        $category = $change['category_id'];
        $name = $change['name'];
        $price = $change['price'];

        // Use prepared statements to prevent SQL injection
        $sql = "UPDATE items SET name = :name, price = :price, category_id = :category WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    $pdo = null;

    echo json_encode(['success' => true, 'message' => 'Changes saved successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

?>
