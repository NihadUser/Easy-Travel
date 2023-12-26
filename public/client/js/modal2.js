const modalCloser2 = document.querySelector(".modalColser2 i");
const guideInformations = document.querySelector(".guideInformations");
const modalContainer2 = document.querySelector(".modalContainer2");
const modal2 = document.querySelector(".modal2");
guideInformations.addEventListener("click", () => {
    modalContainer2.classList.add("active");
    modal2.classList.add("modalActive");
});
modalContainer2.addEventListener("click", () => {
    modalContainer2.classList.remove("active");
    modal2.classList.remove("modalActive");
});
modal2.addEventListener("click", (e) => {
    e.stopImmediatePropagation();
});
modalCloser2.addEventListener("click", () => {
    modalContainer2.classList.remove("active");
    modal2.classList.remove("modalActive");
});
