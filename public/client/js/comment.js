const commentWirterBtn = document.getElementById("commentWirterBtn");
const comment = document.querySelector(".commentDiv");
commentWirterBtn.addEventListener("click", () => {
    if (comment.classList.contains("commentActive")) {
        comment.classList.remove("commentActive");
    } else {
        comment.classList.add("commentActive");
    }
});
