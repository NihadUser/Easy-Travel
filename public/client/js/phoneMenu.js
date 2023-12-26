let toogle = document.querySelector(".toogle-btn");
const Navigation = document.querySelector(".Navigation");
const menuContainer = document.querySelector(".menuContainer");
const mobileCloseBtn = document.querySelector(".mobileCloseBtn");
toogle.addEventListener("click", () => {
    if (Navigation.classList.contains("phoneActive")) {
        Navigation.classList.remove("phoneActive");
    } else {
        Navigation.classList.add("phoneActive");
    }
    if (menuContainer.classList.contains("phoneActive2")) {
        menuContainer.classList.remove("phoneActive2");
    } else {
        menuContainer.classList.add("phoneActive2");
    }
});
Navigation.addEventListener("click", () => {
    Navigation.classList.remove("phoneActive");
    menuContainer.classList.remove("phoneActive2");
});
menuContainer.addEventListener("click", (e) => {
    e.stopImmediatePropagation();
});
mobileCloseBtn.addEventListener("click", () => {
    Navigation.classList.remove("phoneActive");
    menuContainer.classList.remove("phoneActive2");
});
