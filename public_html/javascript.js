

const slideshow = document.getElementById('paralexo');

const imagDir = ["im1.jpg","im2.jpg","im3.jpg","im4.jpg"];
let index = 0;




function forworder()
{
	
	slideshow.setAttribute("style","background-image: url('resources/"+imagDir[index]+"')");
	index++;
if(index == imagDir.length)
	index =0;
}

// Set an interval to switch to the next slide every 5 seconds (adjust the timing as needed)
setInterval(forworder, 5000);

windowonload = function () {
var hours = 1; // Reset when storage is more than 24hours
var now = new Date().getTime();
var setupTime = localStorage.getItem('setupTime');
if (setupTime == null) {
    localStorage.setItem('setupTime', now)
} else {
    if(now-setupTime > hours*60*60*1000) {
        sessionStorage.clear()
        localStorage.setItem('setupTime', now);
    }
}
}

 
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






