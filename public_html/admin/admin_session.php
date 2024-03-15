<?php

// Start the session
session_start();


if(isset($_SESSION['username'])) {
   /* echo "Welcome, " . $_SESSION['username'];*/
} else {
   header("Location: ../admin_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard_styles.css">
    <link rel="stylesheet" href="tableStyle.css"> <!-- Link to your CSS file -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <h1>Admin Dashboard</h1>
            <?php 
                echo "<h1>Admin: {$_SESSION['username']} Welcome</h1>";
            ?>

        </div>
            <nav>
    <ul>
        <li><a onclick="executePHP('Home')">Home</a></li>
        <li><a onclick="executePHP('Add')">+Category</a></li>
        <li><a onclick="executePHP('AddItem')">+Item</a></li>
        <li><a onclick="executePHP('editItem')">EditItem</a></li>
    <li><form action="logout.php" method="post"><button type="submit">Logout</button></form></li>
    </ul>

            </nav>
    </header>
    <main id="dashboardContent">
        <!-- Other dashboard content goes here -->


        <P id="result"></p>
        
        
    </main>


    <footer>
        <!-- Footer content -->
    </footer>
    <script src="dashboard_script.js"></script>
    
    <script>
    
        function executePHP(action) {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("dashboardContent").innerHTML = xhr.responseText;
                    } else {
                    console.error('0 occurred. Status:', xhr.status, 'Response:', xhr.responseText);

                    }
                }
            };

        
            var url = 'adminOperationFinder.php';
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            var params = 'action=' + action;

            xhr.send(params);
        }
</script>

<script>
function sendChanges() {
    const changes = [];
    $('#categoryTable td[contenteditable="true"]').each(function() {
        const id = $(this).closest('tr').find('input[type="checkbox"]').val();
        const columnName = $(this).index() === 1 ? 'name' : 'CatDescriiption';
        const newValue = $(this).text();

        changes.push({
            id: id,
            column: columnName,
            value: newValue
        });
    });


    $.ajax({
        url: 'handle_changes.php',
        method: 'POST',
        data: { changes: changes },
        success: function(response) {
            console.log('Changes saved:', response);

            alert("Data updated!");
        },
        error: function(xhr, status, error) {
            console.error('Error saving changes:', error);
        }
    });
}

function updateItems() {
    const changes = [];
    $('#categoryTable tr').each(function() {
        const id = $(this).find('input[type="checkbox"]').val();
        const category = $(this).find('select[name="category"]').val();
        const name = $(this).find('td:eq(1)').text();
        const price = $(this).find('td:eq(2)').text();
        changes.push({
            id: id,
            category_id: category,
            name: name,
            price: price
        });
    });

    $.ajax({
        url: 'updateItemsData.php',
        method: 'POST',
        data: { changes: JSON.stringify(changes) },
        success: function(response) {
            console.log('Changes saved:', response);
            alert("Data updated!");
        },
        error: function(xhr, status, error) {
            console.error('Error saving changes:', error);
        }
    });
}

</script>

</body>
</html>
