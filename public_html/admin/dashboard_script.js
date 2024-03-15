document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll("nav ul li a");

    navLinks.forEach(link => {
        link.addEventListener("click", function(event) {

            event.preventDefault();

            console.log("Clicked on:", link.textContent);
        });
    });
});
