<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/styles.css">
</head>
<body>
    <div class="particles-js" id="particles-js"></div>
    <div class="container">
      <form id="login-form" action="admin/Login_Process.php" method="POST">
      
        <div class="title">Login</div>
        <div class="input-box underline">
          <input type="text" id="email" name="email" placeholder="Enter Your Email" required />
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" id="password" name="passworder"  placeholder="Enter Your Password" required />
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" value="Login" />
        </div>
      </form>
      <div class="option">Don't have an account?! <a href="signup.php">Signup</a></div>
      <div class="option">Home page?! <a href="index.php">Sugar Rush</a></div>
    </div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="admin/script.js"></script>
</body>
</html>