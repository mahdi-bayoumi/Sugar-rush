<?php
require_once 'pdpConnection.php';

$query = "SELECT * FROM categories";
$result = $pdo->query($query);

echo "<style>";
echo "
.item-list {
    display: flex;
    padding: 10px;
    overflow-x: scroll;
    scrollbar-width: none;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    -webkit-mask-repeat: no-repeat;
    mask-repeat: no-repeat;
    -webkit-mask-size: 100%;
    mask-size: 100%;
    position: relative;
    margin: 10px;
}

.item {
    display: inline-flex;
    width: 30rem;
    margin: 5px;
    flex-shrink: 0;
}

@media screen and (max-width: 768px) {
    .item-list .item {
        width: 20rem; /* Adjust the width as per your requirement */
    }
    .item p, .item select, .item h3{
      font-size: 0.8em; /* Adjust font size */
  }
  .image{
    margin-top:10px;
    width: 15rem;
    height:20rem;
  }
  .addcart{
    font-size: 0.8em; /* Adjust font size */
    width:20px;
  }
}

@media screen and (max-width: 576px) {
    .item-list .item {
        width: 15rem; /* Adjust the width as per your requirement */
    }
    .item p, .item select, .item h3{
      font-size: 0.8em; /* Adjust font size */
  }
  
  .image{
    margin-top:10px;
    width: 15rem;
    height:15rem;
  }
  .addcart{
    font-size: 0.8em; /* Adjust font size */
    width:20px;
  }
  
}
";
echo "</style>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='menu-item'>";
    echo "<h3>" . $row['name'] . "</h3>";
    echo "<p>" . $row['CatDescriiption'] . "</p>";
    echo '<span style="display: inline-block; position: relative;">';
    echo '<img  src="resources/the_arrow.png" alt="Arrow" style="width: 20px; height: 20px; float: right;">';
    echo '</span>';

    $querys = "SELECT * FROM items WHERE category_id = '" . $row['id'] . "'";
    $results = $pdo->query($querys);
    echo '<div class="data1" style="position: relative;">';
    echo '<div class="item-list">';
    while ($rows = $results->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="item">';
        echo '<h3 class="item-name' . $rows['id'] . '">' . $rows['name'] . '</h3>';
        echo '<figure class="image">';
        echo '<img  src="data:image/jpeg;base64,'.base64_encode($rows['img']).' " style="width:30rem;margin:10px;"/>';
        echo '</figure>';
        echo '<p class="item-price' . $rows['id'] . '" style="color: green; font-size: 1.1em; text-align:right;">' . $rows['price'] . '$</p>';
        echo '<label for="quantity-select' . $rows['id'] . '">Quantity:</label>';
        echo '<select name="quantity" id="quantity-select' . $rows['id'] . '">';
        echo '<option value="1">1</option>';
        echo '<option value="2">2</option>';
        echo '<option value="3">3</option>';
        echo '<option value="4">4</option>';
        echo '<option value="5">5</option>';
        echo '</select>';
        echo '<button style="width:100%;" class="addcart" type="button" onclick="addtocart(' . $rows['id'] . ');">';
        echo '<span class="glyphicon glyphicon-plus"></span>';
        echo 'Add to Cart</button>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    echo "</div>";
}
?>
