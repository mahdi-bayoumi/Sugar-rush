<?php
// Establish database connection
require_once 'pdpConnection.php';

// Get search keyword and filter from the AJAX request
$keyword = $_GET['keyword'];
$filter = $_GET['filter'];

// Construct the SQL query based on the selected filter
$query = "SELECT * FROM history WHERE $filter LIKE :keyword";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the search results as HTML
if ($results) {
    foreach ($results as $row) {
        // Output HTML for each search result
        echo '<div class="search-result">';
        echo '<p>ID: ' . $row['id'] . '</p>';
        echo '<p>Name: ' . $row['name'] . '</p>';
        echo '<p>Branch: ' . $row['branch'] . '</p>';
        echo '<p>Service: ' . $row['service'] . '</p>';
        // Add more fields as needed
        echo '</div>';
    }
} else {
    // Output a message if no results found
    echo '<p>No results found.</p>';
}
?>
