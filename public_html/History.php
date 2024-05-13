<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugar Rush - Drinks and Sweets</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="card.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>

<div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="index.php" class="navbar-brand">Sugar Rush</a>
                    </div>

                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#menu" onclick="forworder()" >Menu</a></li>
                            <?php

                        if(isset($_SESSION['username'])){
                          echo '<li><a href="#" id="openFormBtn">Reservation</a></li>
                          <li><a href="History.php">History</a></li>';
                          }
                          ?>
                            <li><a href="#about"  onclick="forworder()">About Us</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                            <li><a href="#visit">Visit Us</a></li>
                            <!-- <li><a href="#">Contact Us</a></li>-->
                        </ul>
                        
                        <?php

                        if(isset($_SESSION['username'])){
                          echo ' <ul class="nav navbar-nav navbar-right">
                            
                          <li><a href="" class="dropdown-toggle" data-toggle="dropdown">Welcome '. $_SESSION['username'].' </a>
                              <ul class="dropdown-menu bg-dark">
                                  <li><a href="admin/logout.php" onclick="logout()">logout</a> </li>
                                  
                              </ul>';
                          }
                          else{
                            echo '<ul class="nav navbar-nav navbar-right">
                            
                            <li><a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login / Sign Up <span class="caret"></span></a>
                                <ul class="dropdown-menu bg-dark">
                                    <li><a href="admin_login.php">Login</a></li>
                                    <li><a href="signup.php">Sign Up</a></li>
                                </ul>';
                          }
                          ?>
                        
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <header class="parallax" id="paralexo">
        
       
    </header>
    </div>
    <footer>
    <div class="container" >
        <p>&copy; 2024 Sugar Rush. All rights reserved.</p>
    </div>
</footer>
                        </body>
                        </html>