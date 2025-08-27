const menuBtn=document.querySelector("#menu-btn")
const MobileMenu=document.querySelector("#mobile-menu");
const closeMenu=document.querySelector("#close-menu")

menuBtn.addEventListener("click", () => {
    MobileMenu.classList.remove("-translate-x-full")
})

closeMenu.addEventListener("click", () => {
    MobileMenu.classList.add("-translate-x-full")
})
