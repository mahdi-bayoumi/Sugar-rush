<?php 
//This file will be called multiple times based on the action and operation will happen
//check for the Ajax sended 
$action = isset($_POST['action']) ? $_POST['action'] : '';



if($action === 'Home')
{
    HomeButton();
    
}elseif($action === 'Add')
{
    insertIntoCategory();

}elseif($action === 'AddItem')
{

        insertIntoItems();
}
elseif($action==='editItem')
{
    clickedAtEdits();
    
}else
{
        HomeButton();
}


function HomeButton()
{
        require_once '../../pdpConnection.php';
    
    $query = "SELECT * FROM categories";
    $result = $pdo->query($query);
    
    echo "<form method='post'>";
    echo "<table id='categoryTable'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Select</th>
          </tr>";
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td contenteditable='true'>" . $row['name'] . "</td>";
        echo "<td contenteditable='true'>" . $row['CatDescriiption'] . "</td>";
        echo "<td><input type='checkbox' name='selectedRows[]' value='" . $row['id'] . "'></td>";
        echo "</tr>";
        
    }
    
    echo "</table>";
    


    echo "<button  onclick='sendChanges()'>Save Data</button>";
    echo "</form>";
    }

function insertIntoCategory()
{

echo '
<form action="submit_category.php" method="post">
    <h2>Add Category</h2>
    <label for="category_name">Category Name:</label>
    <input type="text" id="category_name" name="category_name" required>
    </br>
    </br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="2"></textarea>
        </br>
    <input type="submit" value="Submit">
</form>';

}

function insertIntoItems()
{
    echo '<form action="submit_Item.php" method="post" id="formDesign">
    <h2>Add Item</h2>';
    require_once '../../pdpConnection.php';

    $query = "SELECT * FROM categories";
    $result = $pdo->query($query);

    echo '</br></br><select name="category">';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
echo '</select>';
    echo '</br></br><label for="item_name">Item Name:</label> 

    <input type="text" id="item_name" name="item_name" required>
    </br>
    </br>
    <label for="item_price">Item Price:</label>
    <input type="number" step="any" id="item_price" name="item_price" required>
    </br>
    <!--<label for="description">Description:</label>
    <textarea id="description" name="description" rows="4"></textarea>
    -->
    </br>
    <input type="submit" value="Submit">
</form>';
    
}

function clickedAtEdits()
{
require_once '../../pdpConnection.php';

$query = "SELECT * FROM categories";
$result = $pdo->query($query);

$query2 = "SELECT * FROM items"; 
$result2 = $pdo->query($query2);

$categories = $result->fetchAll(PDO::FETCH_ASSOC);

echo "<form method='post'>";
echo "<table id='categoryTable'>";
echo "<tr>
        <th>Category</th>
        <th>Item name</th>
        <th>Price</th>
        <th>Select</th>
      </tr>";

while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";

    echo "<td>";
    echo '<select name="category">';
    foreach ($categories as $category) {
        $selected = ($category['id'] == $row['category_id']) ? 'selected' : '';
        echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['name'] . '</option>';
    }
    echo '</select>';
    echo "</td>";
    

    echo '<td contenteditable="true">' . $row['name'] . '</td>';
    echo '<td contenteditable="true">' . $row['price'] . '</td>';
    echo "<td><input type='checkbox' name='selectedRows[]' value='" . $row['id'] . "'></td>";
    echo "</tr>";
}

echo "</table>";

echo "<button type='button' id='updateButton' onclick='updateItems()'>Update Changes</button>";
echo "</form>";
}
?>