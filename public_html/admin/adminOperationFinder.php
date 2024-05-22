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
    
}
elseif($action==='orders')
{
    orders();
    
}
elseif($action==='delete')
{
    del();
}
elseif($action==='deleteuser')
{
 deleteuser();   
}elseif($action==='deleteitem')
{
 deleteitem();   
}elseif($action==='done')
{
    dones();
}elseif($action==='history')
{
    history();
}elseif($action==='users')
{
    users();
}else
{
        HomeButton();
}

function deleteuser(){
    require_once '../../connection.php';
    // Assuming you have a 'orders' and 'history' table
    $id = $_POST["id"];
    $deleteQuery = "DELETE FROM admins WHERE id = $id";
    $stmt = $con->prepare($deleteQuery);
    $stmt->execute();
}
function deleteitem(){
    require_once '../../connection.php';
    // Assuming you have a 'orders' and 'history' table
    $id = $_POST["id"];
    $deleteQuery = "DELETE FROM items WHERE id = $id";
    $stmt = $con->prepare($deleteQuery);
    $stmt->execute();
}

function users(){
    require_once '../../pdpConnection.php';
    
    $query = "SELECT * FROM admins"; 
    $result = $pdo->query($query);
    
    
    
    
    echo "<form method='post'>";
    echo "<table id='orderTable'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Location</th>
            <th></th>
          </tr>";
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    
        echo "<tr>";
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['Email'] . '</td>';
        echo '<td>' . $row['Mobile'] . '</td>';
        echo '<td>' . $row['Location'] . '</td>';
        echo "<td><button  id='deletebuttom' value='" . $row['id'] . "' onclick='deluser(this.value)'>Delete</button></td>";
        
    
        echo "</tr>";
    }
    
    echo "</table>";
    echo "</form>";
}

function history(){
    require_once '../../pdpConnection.php';

$query = "SELECT * FROM history";
$result = $pdo->query($query);


$query2 = "SELECT * FROM admins"; 
$result2 = $pdo->query($query2);

$user_id = $result2->fetchAll(PDO::FETCH_ASSOC);

        echo' <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        Filter by <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
        <li><a href="#" data-filter="id">ID</a></li>
        <li><a href="#" data-filter="name">Name</a></li>
        <li><a href="#" data-filter="branch">Branch</a></li>
        <li><a href="#" data-filter="service">Service</a></li>
        </ul>
        </div>
        <div class="input-group">
        <input id="searchInput" type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
        </span>
        </div>';


echo "<form method='post'>";
echo "<table id='historyTable'>";
echo "<tr>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>linked_id</th>
        <th>Service</th>
        <th>Description</th>
        <th>Branch</th>
        <th>Time</th>
        <th>Total</th>
      </tr>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";
    foreach ($user_id as $userdata) {
       if($userdata['id']==$row['user_id']){
        echo '<td>' . $userdata['username'] . '</td>';

        echo '<td>' . $userdata['Email'] . '</td>';

        echo '<td>' . $userdata['Mobile'] . '</td>';
       }
       else{
        
       }
    }
    echo '<td>' . $row['link_id'] . '</td>';
    echo '<td>' . $row['type'] . '</td>';
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['branch'] . '</td>';
    echo '<td>' . $row['time'] . '</td>';
    echo '<td>' . $row['total'] . '</td>';
    

    echo "</tr>";
}

echo "</table>";
echo "</form>";
}

function del(){
    require_once '../../connection.php';
    // Assuming you have a 'orders' and 'history' table
    $id = $_POST["id"];
    $deleteQuery = "DELETE FROM orders WHERE id = $id";
    $stmt = $con->prepare($deleteQuery);
    
    $stmt->execute();
}
function dones(){
    require_once '../../connection.php';
   // Assuming you have a 'orders' and 'history' table
   $id = $_POST["id"];
        
   // Retrieve data from 'orders' table where id matches
   $sql = "SELECT * FROM orders WHERE id = ?";
   $stmt = $con->prepare($sql);
   $stmt->bind_param("i", $id);
   $stmt->execute();
   $result = $stmt->get_result();
   
   if ($result->num_rows > 0) {
       // Insert retrieved data into 'history' table
       $row = $result->fetch_assoc();
       $description = $row["description"];
       $branch = $row["branch"];
       $time = $row["time"];
       $total = $row["total"];
       $user_id = $row["user_id"];
       
       $insert_sql = "INSERT INTO history (type, link_id, user_id, description, branch, time, total) VALUES ('Order', ?, ?, ?, ?, ?, ?)";
       $insert_stmt = $con->prepare($insert_sql);
       $insert_stmt->bind_param("iissid", $id, $user_id, $description, $branch, $time, $total);

       
       if ($insert_stmt->execute()) {
           echo "Data from order with ID $id moved to history successfully.";
           // Delete the order from the 'orders' table
        $deleteQuery = "DELETE FROM orders WHERE id = $id";
        $stmt = $con->prepare($deleteQuery);
        
        $stmt->execute();
       } else {
           echo "Error: " . $con->error;
       }
   } else {
       echo "No data found for order with ID $id.";
   }
    
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
        <th></th>
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
    echo "<td><button  id='deletebuttom' value='" . $row['id'] . "' onclick='delitem(this.value)'>Delete</button></td>";
        
    echo "</tr>";
}

echo "</table>";

echo "<button type='button' id='updateButton' onclick='updateItems()'>Update Changes</button>";
echo "</form>";
}

function orders(){
    
require_once '../../pdpConnection.php';

$query = "SELECT * FROM orders";
$result = $pdo->query($query);


$query2 = "SELECT * FROM admins"; 
$result2 = $pdo->query($query2);

$user_id = $result2->fetchAll(PDO::FETCH_ASSOC);

echo "<form method='post'>";
echo "<table id='orderTable'>";
echo "<tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Location</th>
        <th>Description</th>
        <th>branch</th>
        <th>Time</th>
        <th>Total</th>
        <th>status</th>
        <th></th>
      </tr>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";
    foreach ($user_id as $userdata) {
       if($userdata['id']==$row['user_id']){
        echo '<td>' . $userdata['username'] . '</td>';

        echo '<td>' . $userdata['Mobile'] . '</td>';

        echo '<td>' . $userdata['Location'] . '</td>';
       }
    }
    echo '<td>' . $row['description'] . '</td>';
    echo '<td>' . $row['branch'] . '</td>';
    echo '<td>' . $row['time'] . '</td>';
    echo '<td>' . $row['total'] . '</td>';
    echo "<td><button  id='donebuttom' value='" . $row['id'] . "' onclick='done(this.value)'>Done</button></td>";
    echo "<td><button  id='deletebuttom' value='" . $row['id'] . "' onclick='del(this.value)'>Delete</button></td>";

    echo "</tr>";
}

echo "</table>";
echo "</form>";
    
}
?>