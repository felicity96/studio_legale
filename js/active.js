var linksContainer = document.getElementById("navbarLinks");
var links = linksContainer.getElementsByClassName("nav-link");

for (var i = 0; i < links.length; i++) {
    links[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].removeAttribute("aria-current");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    this.setAttribute("aria-current", "page");
  });
}