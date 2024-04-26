<?php

require_once '../../connection.php';
session_start();

if (isset($_POST['email']) && isset($_POST['passworder'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = validate($_POST['email']);
    $passwords = validate($_POST['passworder']);

  if (empty($email)) {

        header("Location: ../admin_login.php?error=User Name is required");

        exit();

    }else if(empty($passwords)){

        header("Location: ../admin_login.php?error=Password is required");

        exit();

    }else{
    $sql = "SELECT * FROM admins WHERE Email = ? LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        if (MD5($passwords)==$row['password']) {

            $_SESSION['username'] = $row['username'];
            $_SESSION['userid'] = $row['id'];
            if($email=='admin@admin.com'){
            header("Location: admin_session.php");
            }
            else{ header("Location: ../index.php");}
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
            header("Location: ../admin_login.php");
            exit();
    }
}

    $stmt->close();
}

$con->close();
?>