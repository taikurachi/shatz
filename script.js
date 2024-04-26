const mobileMenu = document.querySelector(".navbar__mobile__menu");
const navbarLinks = document.querySelector(".navbar__links__container");

mobileMenu.addEventListener("click", function () {
  mobileMenu.classList.toggle("active");
  navbarLinks.classList.toggle("active");
  document.body.classList.toggle("lock-scroll");
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
});
