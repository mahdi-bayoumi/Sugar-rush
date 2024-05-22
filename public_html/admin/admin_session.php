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
    
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
     <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
     <style type="text/css">

.btn {
    margin-bottom: 5px;
}

.grid {
    position: relative;
    width: 100%;
    background: #fff;
    color: #666666;
    border-radius: 2px;
    margin-bottom: 25px;
    box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}

.grid .grid-body {
    padding: 15px 20px 15px 20px;
    font-size: 0.9em;
    line-height: 1.9em;
}

.search table tr td.rate {
    color: #f39c12;
    line-height: 50px;
}

.search table tr:hover {
    cursor: pointer;
}

.search table tr td.image {
	width: 50px;
}

.search table tr td img {
	width: 50px;
	height: 50px;
}

.search table tr td.rate {
	color: #f39c12;
	line-height: 50px;
}

.search table tr td.price {
	font-size: 1.5em;
	line-height: 50px;
}

.search #price1,
.search #price2 {
	display: inline;
	font-weight: 600;
}
    </style>
</head>
<body class="">
    <div >
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <header>
        <div class="logo">
            <h1>Admin Dashboard</h1>
            <?php 
                echo "<h1>Admin: {$_SESSION['username']} Welcome</h1>";
            ?>

        </div>
            <nav>
    <ul>
    <li><a onclick="executePHP('users')">Users</a></li>
        <li><a onclick="executePHP('Home')">Categories</a></li>
        <li><a onclick="executePHP('Add')">+Category</a></li>
        <li><a onclick="executePHP('AddItem')">+Item</a></li>
        <li><a onclick="executePHP('editItem')">EditItem</a></li>
        <li><a onclick="executePHP('orders')">orders</a></li>
        <li><a onclick="executePHP('history')">History</a></li>
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
    </div>
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
function done(id) {
    console.log("done");
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Handle success as needed
                alert(xhr.responseText); // Displaying response for demonstration, replace this with your logic
            } else {
                console.error('An error occurred. Status:', xhr.status, 'Response:', xhr.responseText);
            }
        }
    };

    var url = 'adminOperationFinder.php'; // Change this to your server-side script URL
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    var params = 'action=done&id=' + id; // Pass the id parameter
    xhr.send(params);

    // Prevent default form submission behavior
    return false;
}


function del(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update the dashboard content or handle success as needed
                document.getElementById("dashboardContent").innerHTML = xhr.responseText;
            } else {
                console.error('An error occurred. Status:', xhr.status, 'Response:', xhr.responseText);
            }
        }
    };

    var url = 'adminOperationFinder.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    var params = 'action=delete&id=' + id; // Pass the id parameter

    xhr.send(params);
}

function deluser(id) {
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update the dashboard content or handle success as needed
                document.getElementById("dashboardContent").innerHTML = xhr.responseText;
            } else {
                console.error('An error occurred. Status:', xhr.status, 'Response:', xhr.responseText);
            }
        }
    };

    var url = 'adminOperationFinder.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    var params = 'action=deleteuser&id=' + id; // Pass the id parameter

    xhr.send(params);
}

function delitem(id) {
    
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update the dashboard content or handle success as needed
                document.getElementById("dashboardContent").innerHTML = xhr.responseText;
            } else {
                console.error('An error occurred. Status:', xhr.status, 'Response:', xhr.responseText);
            }
        }
    };

    var url = 'adminOperationFinder.php';
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    var params = 'action=deleteitem&id=' + id; // Pass the id parameter

    xhr.send(params);
}


</script>
<script>
    // Add event listener to the search input
    document.getElementById("searchInput").addEventListener("keyup", function() {
        var keyword = this.value;
        var filter = document.querySelector('.btn-group .dropdown-menu .active').getAttribute('data-filter');
        search(keyword, filter);
    });

    // Add event listener to filter options
    var filterLinks = document.querySelectorAll('.btn-group .dropdown-menu a');
    filterLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var filter = this.getAttribute('data-filter');
            this.parentNode.parentNode.querySelector('.active').classList.remove('active');
            this.classList.add('active');
            var keyword = document.getElementById('searchInput').value;
            search(keyword, filter);
        });
    });

    // Function to perform the search
    function search(keyword, filter) {
        var searchResultsContainer = document.getElementById('searchResults');
        searchResultsContainer.innerHTML = ''; // Clear previous results

        // Send AJAX request to server for real-time filtering
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'search.php?keyword=' + keyword + '&filter=' + filter, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update search results container with the response from server
                    searchResultsContainer.innerHTML = xhr.responseText;
                } else {
                    console.error('Error occurred during search:', xhr.status);
                }
            }
        };
        xhr.send();
    }
</script>


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
