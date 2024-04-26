<?php

require_once '../connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
   

  
    if (isset($_POST['data'])){
        function validate($data){

            $data = trim($data);
     
            $data = stripslashes($data);
     
            $data = htmlspecialchars($data);
     
            return $data;
     
         }
      foreach($_POST['data'] as $value){
        
            $item=validate($value[0]);
            $qty=validate($value[1]);
            echo "item: $item qty: $qty";
            
            $sql = "SELECT id,name,price FROM items WHERE name = '" . $item . "'";
            $stmt = $con->prepare($sql);

            $stmt->execute();
            $result = $stmt->get_result();
           
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
               


                $sqlo = "SELECT user_id, item_id, description FROM orders";
            $stmto = $con->prepare($sqlo);
            $stmto->execute();
            $resulto = $stmto->get_result();
            $userid=5;
if ($resulto->num_rows >= 1) {
    $rowo = $resulto->fetch_assoc();
        
    foreach($rowo as $datao){
        
        if($datao==$userid){
            $time=date("Y-m-d h:i:s");
             $description=[];
                foreach($row as $val){
                    $description[]=$val;
                }
                $id=$description[0];
                
                $info="$description[1] $description[2] $qty";
            
    $itemid=$rowo["item_id"];
    $desc=$rowo["description"];
            $query = "UPDATE orders SET item_id='$itemid', description='$desc', time='$time' WHERE user_id=$userid";
            $stmt = $con->prepare($query);

            if ($stmt) {
                
                
                //echo "$info";
                
                
                
                
                if ($stmt->execute()) {
                    
                    echo "success";
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
    
                $stmt->close();
            } else {
                echo "Statement preparation error: " . $con->error;
            }
        }else{
    $query = "INSERT INTO orders (user_id, item_id, description, time) VALUES(?, ?, ?, ?)";
    $stmt = $con->prepare($query);

    if ($stmt) {
        $time=date("Y-m-d h:i:s");
        $description=[];
                foreach($row as $val){
                    $description[]=$val;
                }
                $id=$description[0];
                
                $info="$description[1] $description[2] $qty";
        $info="$description[1] $description[2] $qty";
        //echo "$info";
        
        
        $stmt->bind_param("ssss", $userid, $id, $info, $time);
        
        if ($stmt->execute()) {
            
            echo "success";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        $stmt->close();
    } else {
        echo "Statement preparation error: " . $con->error;
    }
}
        
    }
}






                

            }
            else{
                echo "stop playing";
            }
                
        }
        // $var = implode(json_decode($_POST['data'])) ;
            //echo $var;
            
        }
}

?>