<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/styles.css">
</head>
<body>
    <div class="particles-js" id="particles-js"></div>
    <div class="login-container">
        <h1>Admin Login</h1>
        
        <form id="login-form" action="admin/Login_Process.php" method="POST">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="passworder" required >
            
            <input type="submit" value="Login">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="admin/script.js"></script>
</body>
</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/styles.css">
</head>
<body>
    <div class="particles-js" id="particles-js"></div>
    <div class="container">
      
      <form id="login-form" action="admin/add.php" method="POST">
        <div class="title">Registration
        </div>

        <div class="input-box underline">
          <input type="text" id="username" name="username" placeholder="Enter Your Name" required />
          <div class="underline"></div>
        </div>
        
        <div class="input-box underline">
          <input type="text" id="email" name="email" placeholder="Enter Your Email" required />
          <div class="underline"></div>
        </div>
        
        <div class="input-box underline">
        
          <input type="password" id="password" name="passworder"  placeholder="Enter Your Password" required />
          <div class="underline"></div>
        </div>

        <div class="input-box underline">
          <input type="number" id="mobile" name="mobile" placeholder="Enter Your Mobile Number" required />
          <div class="underline"></div>
        </div>

        <div class="input-box underline">
          <input type="text" id="location" name="location" placeholder="Enter Your Location" required />
          <div class="underline"></div>
        </div>

        <div class="input-box button">
          <input type="submit" value="Register" />
        </div>
      </form>
      <div class="option">Already have an account?! <a href="admin_login.php">Login</a></div>
      
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="admin/script.js"></script>
</body>
</html>