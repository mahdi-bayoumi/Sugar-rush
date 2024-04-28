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
<style>
    :root {
  --glow-color: hsl(186 100% 69%);
}
    *::before,
*::after {
  box-sizing: border-box;
}
    .glowing-btn {
        background-color: rgba(0, 0, 0, 0.8);
  position: relative;
  color: var(--glow-color);
  cursor: pointer;
  padding: 0.35em 1em;
  border: 0.15em solid var(--glow-color);
  border-radius: 0.45em;
  perspective: 2em;
  font-family: "Raleway", sans-serif;
  font-size: 2em;
  font-weight: 900;
  letter-spacing: 0.5em;

  -webkit-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  -moz-box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  box-shadow: inset 0px 0px 0.5em 0px var(--glow-color),
    0px 0px 0.5em 0px var(--glow-color);
  animation: border-flicker 2s linear infinite;
  width: 80%;
  margin-top: 1em;
}

.glowing-txt {
  
  margin-right: -0.8em;
  -webkit-text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3),
    0 0 0.45em var(--glow-color);
  -moz-text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3),
    0 0 0.45em var(--glow-color);
  text-shadow: 0 0 0.125em hsl(0 0% 100% / 0.3), 0 0 0.45em var(--glow-color);
  animation: text-flicker 3s linear infinite;
}

.faulty-letter {
  opacity: 0.5;
  animation: faulty-flicker 2s linear infinite;
}



.glowing-btn::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0;
  z-index: -1;
  background-color: var(--glow-color);
  box-shadow: 0 0 2em 0.2em var(--glow-color);
  transition: opacity 100ms linear;
}

.glowing-btn:hover {
  color: rgba(0, 0, 0, 0.8);
  text-shadow: none;
  animation: none;
}

.glowing-btn:hover .glowing-txt {
  animation: none;
}

.glowing-btn:hover .faulty-letter {
  animation: none;
  text-shadow: none;
  opacity: 1;
}

.glowing-btn:hover:before {
  filter: blur(1.5em);
  opacity: 1;
}

.glowing-btn:hover:after {
  opacity: 1;
}

@keyframes faulty-flicker {
  0% {
    opacity: 0.1;
  }
  2% {
    opacity: 0.1;
  }
  4% {
    opacity: 0.5;
  }
  19% {
    opacity: 0.5;
  }
  21% {
    opacity: 0.1;
  }
  23% {
    opacity: 1;
  }
  80% {
    opacity: 0.5;
  }
  83% {
    opacity: 0.4;
  }

  87% {
    opacity: 1;
  }
}

@keyframes text-flicker {
  0% {
    opacity: 0.1;
  }

  2% {
    opacity: 1;
  }

  8% {
    opacity: 0.1;
  }

  9% {
    opacity: 1;
  }

  12% {
    opacity: 0.1;
  }
  20% {
    opacity: 1;
  }
  25% {
    opacity: 0.3;
  }
  30% {
    opacity: 1;
  }

  70% {
    opacity: 0.7;
  }
  72% {
    opacity: 0.2;
  }

  77% {
    opacity: 0.9;
  }
  100% {
    opacity: 0.9;
  }
}

@keyframes border-flicker {
  0% {
    opacity: 0.1;
  }
  2% {
    opacity: 1;
  }
  4% {
    opacity: 0.1;
  }

  8% {
    opacity: 1;
  }
  70% {
    opacity: 0.7;
  }
  100% {
    opacity: 1;
  }
}

@media only screen and (max-width: 600px) {
  .glowing-btn{
    font-size: 1em;
  }
}

tbody td {
  /* 1. Animate the background-color
     from transparent to white on hover */
  background-color: rgba(255,255,255,0);
  transition: all 0.2s linear; 
  transition-delay: 0.3s, 0s;
  /* 2. Animate the opacity on hover */
  opacity: 0.6;
}
tbody tr:hover td {
  background-color: rgba(255,255,255,1);
  transition-delay: 0s, 0s;
  opacity: 1;
  font-size: 1em;
}

td {
  /* 3. Scale the text using transform on hover */
  transform-origin: center left;
  transition-property: transform;
  transition-duration: 0.4s;
  transition-timing-function: ease-in-out;
}
tr:hover td {
  transform: scale(1.1);
}







table {
  width: 100%;
  margin: 0;
  text-align: left;
}
th, td {
  padding: 0.5em;
}
.plus, .minus,.del{
  
  width: var(--space-6);
  height: var(--space-6);
  border: 1px solid var(--color-blue-500);
  border-radius: var(--round);
  background-color: var(--color-white);
}
</style>
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
                          echo '<li><a href="#">Reservation</a></li>
                          <li><a href="#">History</a></li>';
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
        
        <div class="header-content">

            <h1>Welcome to Sugar Rush</h1>
            <p>Your Sweet Treat Destination</p>
            <a href="#menu" class"cta-button" onclick="forworder()">Explore Menu</a>
        </div>
    </header>
    </div>

    


	<div class="container-fluid pl-5" id="content">
	 <div style="padding-left: 15%;">
        <button  class='glowing-btn' id="sugarrush" onclick="btnclick('../getDataSet.php',this.id)"><span class='glowing-txt'>S<span class='faulty-letter'>u</span>gar Rush Bransh-Darkifa</span></button>
        <button class='glowing-btn' id="hujeir" onclick="btnclick('../getDataSett.php',this.id)"><span class='glowing-txt'>H<span class='faulty-letter'>u</span>jeir Branch-Bourj Kalaway</span></button>
        <button  class='glowing-btn' id="legohouse" onclick="btnclick('../getDataSett.php',this.id)"><span class='glowing-txt' >L<span class='faulty-letter'>e</span>go Branch-Tyre</span></button>
        </div>   
    <section id="menu">
        <h2>Our Menu</h2>
     
    
        <div id="DIVID">
        <?php 
        require_once "../getDataSet.php";
        ?>    
        </div>
        <script >
    function btnclick(_url,clickedid){
      localStorage.setItem("branch",clickedid);
        $.ajax({
            url : _url,
            type : 'post',
            success: function(data) {
             $('#DIVID').html(data);
            },
            error: function() {
             $('#DIVID').text('An error occurred');
            }
        });

    }
</script>
        
        
        

    </section>

    <section id="about">
        <h2>About Us</h2>
    <p>Welcome to Sugar Rush, your ultimate destination for delightful drinks and mouthwatering sweets. At Sugar Rush, we believe in the power of sweetness to brighten your day and create lasting memories. Our story is all about passion for quality treats and a commitment to customer satisfaction.</p>

    <p>Our journey began with a small bakery in a cozy corner of town, where we crafted our first batch of delectable pastries and desserts. Over the years, we've expanded our offerings to include a wide range of treats, from artisanal chocolates to handcrafted beverages that will satisfy your sweet cravings.</p>

    <p>What sets us apart is our dedication to using only the finest ingredients. We source locally whenever possible and take pride in creating treats that are not only delicious but also made with love and care. Our team of talented bakers and baristas are always experimenting with new flavors and combinations to bring you the latest and greatest in the world of sweets.</p>

    <p>Whether you're looking for a cozy place to enjoy a cup of coffee, a special dessert for a celebration, or a unique gift for a loved one, Sugar Rush has you covered. We're more than just a sweet shop; we're a community of dessert enthusiasts who are excited to share our passion with you.</p>

    <p>Come visit us today and experience the magic of Sugar Rush. We can't wait to serve you and be a part of your sweetest moments.</p>
    </section>

<section id="contact">
    <h2>Contact Us</h2>
    <p>Have questions or need assistance? Reach out to us:</p>
    <ul>
        <li>Phone: <a href="tel:+96178954777">+961 78 954 777</a></li>
        <li>Email: <a href="mailto:info@sugarrush.com">info@sugarrush.com</a></li>
        <li><a href="https://maps.app.goo.gl/nDycbVbpUCK9sVmeA">Visit US</a></li>
        <li><a href="https://maps.app.goo.gl/mzyYjJYSoUvAE28a8">Visit US</a></li>
        <li><a href="https://maps.app.goo.gl/1YsDiQtKiWbpev5J9">Visit US</a></li>
    </ul>
    <!-- You can also add a contact form or additional contact information here -->
</section>
<section id="visit">
    <h2>Visit US</h2>
    <ul>
        <li><a href="https://maps.app.goo.gl/nDycbVbpUCK9sVmeA">Deikifa Branch</a></li>
        <li><a href="https://maps.app.goo.gl/mzyYjJYSoUvAE28a8">Tyre Sahely sooks Branch</a></li>
        <li><a href="https://maps.app.goo.gl/1YsDiQtKiWbpev5J9">Hujeir Village Branch</a></li>
    </ul>
    <!-- You can also add a contact form or additional contact information here -->
</section>


	</div>
    <button class="open-button" onclick="openForm()"><span class="glyphicon glyphicon-shopping-cart"></span></button>

<div class="form-popup" id="myForm">
  <form  class="form-container">
    <h3>Cart</h3>
    
<div id="tables">
            <table id="table">
                <thead>
                    <tr>
                   
                        <th>Item</th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
</div>

    <button type="submit" class="btn" id="order" >Order Now</button>
    <script type="text/javascript">
    //daddy code
    $ (document).ready(function() {
        //mama code
        $("button#order").click(function() {
            //children code
            var data = Object.entries(sessionStorage);
  var post=[];
  var total=[];
  for (let row of entries) {
    if(row[0]!="Total price"){
    
    /*for(let cell of row){
      if(sessionStorage.getItem(cell)){
        item.push(cell);
      }
      else{
        item.push(cell[0]);
        
      }
                        
    }*/
    post.push(row);
    }
    else{
      total.push(row);
    }
  }
  var branch=localStorage.getItem("branch");
            
            $.ajax({
                type: "POST",
                url: "order.php",
                dataType: 'text',
                data: {data:post ,branch:branch},
                success: function(data) {
                   alert(data);
                }
            });
        });
    });
</script>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

	<footer>
    <div class="container">
        <p>&copy; 2024 Sugar Rush. All rights reserved.</p>
    </div>
</footer>
    







    <script>
        function logout(){
          localStorage.clear();
          sessionStorage.clear();
        }
function minus(id){
  var update=[];
  entries = Object.entries(sessionStorage);
  for (let row of entries) {
                  
                  if(row[0]!="Total price"){
                    
                      if(row[0]==id){
                        cell=row[1];
                        var newqty=parseInt(cell[0])-1;
                        update.push(newqty);
                        
                        var newprice=(parseFloat(cell[2])/cell[0])*newqty;
                        update.push(newprice);
                        if(newqty == 0){
                          sessionStorage.removeItem(id);
                          filltable();
                        }else{
                          sessionStorage.setItem(id,update);
                        }
                      }
                    
                  }
                }
}
function plus(id){
  
  var update=[];
  entries = Object.entries(sessionStorage);
  for (let row of entries) {
                  
                  if(row[0]!="Total price"){
                    
                      if(row[0]==id){
                        cell=row[1];
                        var newqty=parseInt(cell[0])+1;
                        update.push(newqty);
                        var newprice=(parseFloat(cell[2])/cell[0])*newqty;
                        update.push(newprice);
                        if(newqty == 0){
                          sessionStorage.removeItem(id);
                          filltable();
                        }else{
                          sessionStorage.setItem(id,update);
                        }
                      }
                    
                  }
                }
}
function del(id){
  sessionStorage.removeItem(id);
}

function filltable(){
  var cart=[];
            // fills the form with the apropriate data
            entries = Object.entries(sessionStorage);
            // checks if there any product in the cart
            if (Object.entries(sessionStorage)!="") {
                //refer the table element in the html code
                const tbodyElement = document.getElementById('tbody');
                //create a body element
                
                var x=0;
                // loop over the data array
                for (let row of entries) {
                  
                  if(row[0]!="Total price"){
                    x++;
                    //create the table body and tr
                    const trElement = document.createElement('tr');
                    
                    const minus = document.createElement('td');
                    minus.innerHTML="<input type='button' class='minus"+x+" minus' value='-'  onclick='minus(this.id)'/>";
                   const plus = document.createElement('td');
                   plus.innerHTML="<input class='plus"+x+" plus' type='button' onclick='plus(this.id)'   value='+' />";
                   const del = document.createElement('td');
                   del.innerHTML="<input type='button' class='del"+x+" del' onclick='del(this.id)' value='X'/>"
                    //loop to fill the <td> in the tablev
                    
                      
                    for(let cell of row){
                      const item = document.createElement('td');
                      if(sessionStorage.getItem(cell)){
                        for(let exist of cart){
                          if(exist!=cell){
                            cart.push(cell);
                          }
                        }
                        
                        item.setAttribute("id",cell);
                         item.innerHTML = cell;
                      }
                      else{
                        item.setAttribute("id","price"+x);

                        item.innerHTML = cell[0]+" Qty || "+parseFloat(cell[2])+"$";
                      }

                            trElement.appendChild(item);
                    }   
                    trElement.appendChild(minus);
                    const minusid= document.getElementsByClassName("minus"+x);
                    trElement.appendChild(plus);
                    const plusid= document.getElementsByClassName("plus"+x);
                    trElement.appendChild(del);
                    const delid= document.getElementsByClassName("del"+x);
                    tbodyElement.appendChild(trElement);
                    
                    minusid[0].setAttribute("id",row[0]);
                    
                    plusid[0].setAttribute("id",row[0]);
                    
                    delid[0].setAttribute("id",row[0]);
                  }
                }
                return(true);
}
// if the cart is empty it will show an alert 
            else{
              return(false);
                alert("Cart is Empty!!");
            }

}
        function openForm() {
            
            var exist = filltable();
            // opens the form
           
            if(exist)
            document.getElementById("myForm").style.display = "block";
            
            

        }

       function closeForm() { 
        if(document.getElementById("tbody")!=""){
            const tbodyElement = document.getElementById("tbody");
            
                tbodyElement.innerHTML = "";
            }
           document.getElementById("myForm").style.display = "none";
           
       }


       

        $(document).ready(function() {
            $('.menu-item').click(function() {
                var $submenu = $(this).find('.item-list');
                $('.item-list').not($submenu).slideUp();
                $submenu.slideToggle();
            });

            // Prevent submenu from closing when clicking inside the submenu
            $('.item-list').click(function(event){
                event.stopPropagation();
            });

            // Hide submenu when clicking outside the menu item or submenu
            $(document).click(function(event) { 
                if(!$(event.target).closest('.menu-item').length) {
                    $('.item-list').slideUp();
                }        
            });
        });
    </script>
	
    <script src="javascript.js"></script>

</body>
</html>
