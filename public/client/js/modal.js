const modalContainer = document.querySelector(".modalContainer");
const modal = document.querySelector(".modal");
const editButton = document.querySelector(".userActions button");
const modalCloser = document.querySelector(".modalColser span");
editButton.addEventListener("click", () => {
    modalContainer.classList.add("active");
    modal.classList.add("modalActive");
});
modalContainer.addEventListener("click", () => {
    modalContainer.classList.remove("active");
    modal.classList.remove("modalActive");
});
modal.addEventListener("click", (e) => {
    e.stopImmediatePropagation();
});
modalCloser.addEventListener("click", () => {
    modalContainer.classList.remove("active");
    modal.classList.remove("modalActive");
});
const changeSelectBar = document.getElementById("changeSelectBar");
const bookedGuideContainer = document.querySelector(".bookedGuideContainer");
const bookedUserContainer = document.querySelector(".bookedUserContainer");
changeSelectBar.addEventListener("change", () => {
    if (bookedGuideContainer.classList.contains("nonActive")) {
        bookedGuideContainer.classList.remove("nonActive");
        bookedUserContainer.classList.add("nonActive");
    } else if (bookedUserContainer.classList.contains("nonActive")) {
        bookedUserContainer.classList.remove("nonActive");
        bookedGuideContainer.classList.add("nonActive");
    }
});
