const modalCloser3 = document.querySelector(".modalColser3 i");
const modalContainer3 = document.querySelector(".modalContainer3");
const modal3 = document.querySelector(".modal3");
const blog = document.querySelector(".blogWriterBtn");
blog.addEventListener("click", () => {
    modalContainer3.classList.add("active");
    modal3.classList.add("modalActive");
});
modalContainer3.addEventListener("click", () => {
    modalContainer3.classList.remove("active");
    modal3.classList.remove("modalActive");
});
modal3.addEventListener("click", (e) => {
    e.stopImmediatePropagation();
});
modalCloser3.addEventListener("click", () => {
    modalContainer3.classList.remove("active");
    modal3.classList.remove("modalActive");
});
