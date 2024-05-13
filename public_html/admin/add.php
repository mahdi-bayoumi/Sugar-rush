<?php
require_once '../../connection.php'; 

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['passworder']) && isset($_POST['mobile']) && isset($_POST['location'])) {

        function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

        }
    }
    $username = validate($_POST['username']);
    $email = validate($_POST['email']);
    $passwords = MD5(validate($_POST['passworder']));
    $mobile = validate($_POST['mobile']);
    $location = validate($_POST['location']);

    if (empty($username)){
        header("Location: ../signup.php?error=User Name is required");
        exit;
    }
    elseif (empty($email)){
        header("Location: ../signup.php?error=User email is required");
        exit;
    }
    elseif (empty($passwords)){
        header("Location: ../signup.php?error=User password is required");
        exit;
    }
    elseif (empty($mobile)){
        header("Location: ../signup.php?error=User mobile is required");
        exit;
    }
    elseif (empty($location)){
        header("Location: ../signup.php?error=User location is required");
        exit;
    }
    else{

        $sqlcheck = "SELECT * FROM admins WHERE Email = ? LIMIT 1";
        $stmtcheck = $con->prepare($sqlcheck);
        $stmtcheck->bind_param("s", $email);
        $stmtcheck->execute();
        $resultcheck = $stmtcheck->get_result();
        if ($resultcheck->num_rows == 1){
            header("Location: ../signup.php?error=User-already-exist!!");
        exit;
        }
        else{

        


        $sql = "INSERT INTO admins (username, Email, password, Mobile, Location) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssss", $username, $email, $passwords, $mobile , $location);

            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                header("Location: ../admin_login.php");
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
$con->close();
?>
