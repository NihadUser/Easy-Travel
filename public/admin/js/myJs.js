const modalContainer = document.querySelector(".modalContainer");
const mainModal = document.querySelector(".mianModal");
const modalCloser = document.querySelector(".modalCloser");
const newItemAdder = document.querySelector(".newItemAdder");
newItemAdder.addEventListener("click", () => {
    modalContainer.classList.add("modalActive");
});
modalCloser.addEventListener("click", () => {
    modalContainer.classList.remove("modalActive");
});
modalContainer.addEventListener("click", (e) => {
    if (e.target === modalContainer) {
        modalContainer.classList.remove("modalActive");
    }
});
mainModal.addEventListener("click", (e) => {
    e.stopPropagation();
});
const userModalContainer = document.querySelector(".userModalContainer");
const links = document.querySelectorAll(".allImagesUser");
guide = (price, about) => {
    // console.log(price,about);
    if (userModalContainer.classList.contains("modalActive")) {
        userModalContainer.classList.remove("modalActive");
    } else {
        userModalContainer.classList.add("modalActive");
    }
};
