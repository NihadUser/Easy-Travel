const hotelAddModal = document.querySelector(".hotelAddModal");
const addSearchBtn = document.querySelector(".addSearchBtn");
const popUp = document.querySelector(".popUp");
const guideAddModal2 = document.querySelector(".guideAddModal");
const hotelAddModal2 = document.querySelector(".hotelAddModal2");
const popUp2 = document.querySelector(".popUp2");
guideAddModal2.addEventListener("click", () => {
    if (
        hotelAddModal2.classList.contains("active") &&
        popUp2.classList.contains("activep")
    ) {
        hotelAddModal2.classList.remove("active");
        popUp2.classList.remove("activep");
    } else {
        hotelAddModal2.classList.add("active");
        popUp2.classList.add("activep");
    }
});
addSearchBtn.addEventListener("click", () => {
    if (
        hotelAddModal.classList.contains("active") &&
        popUp.classList.contains("activep")
    ) {
        hotelAddModal.classList.remove("active");
        popUp.classList.remove("activep");
    } else {
        hotelAddModal.classList.add("active");
        popUp.classList.add("activep");
    }
});
hotelAddModal.addEventListener("click", () => {
    hotelAddModal.classList.remove("active");
    popUp.classList.remove("activep");
});
popUp.addEventListener("click", (e) => {
    e.stopPropagation();
});
hotelAddModal2.addEventListener("click", () => {
    hotelAddModal2.classList.remove("active");
    popUp2.classList.remove("activep");
});
popUp2.addEventListener("click", (e) => {
    e.stopPropagation();
});
