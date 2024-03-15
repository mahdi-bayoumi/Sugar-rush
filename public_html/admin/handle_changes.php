<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../pdpConnection.php';

    $changes = $_POST['changes'];

    foreach ($changes as $change) {
        $id = $change['id'];
        $columnName = $change['column'];
        $newValue = $change['value'];

        $query = "UPDATE categories SET $columnName = :newValue WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':newValue', $newValue);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


}
?>
