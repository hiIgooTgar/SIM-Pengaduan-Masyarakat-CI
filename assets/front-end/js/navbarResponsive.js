// navbar nav
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");

menuOpenBtn.onclick = function () {
	navLinks.style.left = "0";
};
menuCloseBtn.onclick = function () {
	navLinks.style.left = "-100%";
};

let htmlcssArrow = document.querySelector(".dropmenus-arrow");
htmlcssArrow.onclick = function () {
	navLinks.classList.toggle("show1");
};

// navbar sticky muncul ketika di scroll
window.addEventListener("scroll", function () {
	let navSticky = document.querySelector(".navbar");
	navSticky.classList.toggle("sticky", window.scrollY > 0);
});
