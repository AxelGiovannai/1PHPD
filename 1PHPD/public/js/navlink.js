const navMenu = document.getElementById("nav-menu");
const navButtons = document.getElementById("nav-buttons");
const burgerMenu = document.getElementById("burger-menu");

function onToggleMenu(e) {
  navMenu.classList.toggle("hidden");
  navMenu.classList.toggle("block");
  navButtons.classList.toggle("hidden");
  navButtons.classList.toggle("block");
  burgerMenu.classList.toggle("hidden");
  burgerMenu.classList.toggle("block");
}
