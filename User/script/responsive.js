var menutoggle = document.querySelector(".menu-toggle input");
var nav = document.querySelector("nav ul");
menutoggle.addEventListener("click", function () {
  nav.classList.toggle("slide");
});
