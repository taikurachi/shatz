const mobileMenu = document.querySelector(".navbar__mobile__menu");
const navbarLinks = document.querySelector(".navbar__links__container");

mobileMenu.addEventListener("click", function () {
  mobileMenu.classList.toggle("active");
  navbarLinks.classList.toggle("active");
  document.documentElement.classList.toggle("lock-scroll");
});
