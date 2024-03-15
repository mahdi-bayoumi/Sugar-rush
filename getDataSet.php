

<?php   
        require_once 'pdpConnection.php';
    
    $query = "SELECT * FROM categories";
    $result = $pdo->query($query);
    

  
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "
        <div class='menu-item' >
        ";
        echo "<h3>" . $row['name'] . "</h3>";
        echo "<p>" . $row['CatDescriiption'] . "</p>";
/*    echo '<span style="top: 50%; right: 10px; transform: translateY(-50%); display: inline-block; position: relative;">
        <img src="resources/the_arrow.png" alt="Arrow" style="width: 20px; height: 20px; vertical-align: middle;float: right;">
      </span>';
        */
    echo '<span style="display: inline-block; position: relative;">
        <img src="resources/the_arrow.png" alt="Arrow" style="width: 20px; height: 20px; float: right;">
      </span>';        
        
            $querys = "SELECT * FROM items WHERE category_id = '" . $row['id'] . "'";
            $results = $pdo->query($querys);
            
    echo '<div class="item-list" >';
    while ($rows = $results->fetch(PDO::FETCH_ASSOC)) {
        echo '
        <div class="item" >
        <h3 class="item-name' . $rows['id'] . '" style="font-weight: bold; margin-bottom: 5px;">' . $rows['name'] . '</h3>

        <figure>
        <img  src="data:image/jpeg;base64,'.base64_encode($rows['img']).' "/>
        </figure>

        <p class="item-price' . $rows['id'] . ' " style="color: green; font-size: 1.1em; text-align:right;">' . $rows['price'] . '$</p>
            
        <label for="quantity-select' . $rows['id'] . '">Quantity:</label>
        <select name="quantity" id="quantity-select' . $rows['id'] . '">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button  type="button" onclick="addtocart(' . $rows['id'] . ');">
        <span class="glyphicon glyphicon-plus"></span>
        Add to Cart</button>
        </div>
        
        <script>
        
        
        window.onload = function () {
           if(!sessionStorage.getItem("Total price")){
          sessionStorage.setItem("Total price",0 );
        }
      };
        

        function addtocart(id){
            var e = document.getElementById("quantity-select"+id);
            var item = document.querySelector(`.item-name${id}`);
            var price = document.querySelector(`.item-price${id}`);
    if (item) { // Check if item is found before accessing textContent
      var itemName = item.textContent;
    } else {
      console.error("Item with id", id, "not found.");
      // Handle the case where the item is not found (optional)
    }
    if (price) { // Check if item is found before accessing textContent
      var price = parseFloat(price.textContent);

    } 
    else {
      console.error("price with id", id, "not found.");
      // Handle the case where the item is not found (optional)
    }
        var quantity=e.value;
        price=price*parseFloat(quantity);

        if(sessionStorage.getItem("Total price")){
          
         var Totalprice=price+parseFloat(sessionStorage.getItem("Total price"));
         
        }
        else{
          var Totalprice=price;
        }
        if(sessionStorage.getItem(itemName)){
            Totalprice=Totalprice-parseFloat(sessionStorage.getItem(itemName));
          }
var array=[quantity,price]
        sessionStorage.setItem(itemName,array);
        sessionStorage.setItem("Total price",Totalprice );
        console.log(price);
        
        }

        </script>
        ';

        
    }
    echo '</div>';

         echo "</div>";
         

    }


    
?>

