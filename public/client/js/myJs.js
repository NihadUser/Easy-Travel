const userImage = document.querySelector(".userImage");
const drpdwn = document.querySelector(".dropdown");
userImage.addEventListener("click", () => {
    if (drpdwn.classList.contains("navActive")) {
        drpdwn.classList.remove("navActive");
    } else {
        drpdwn.classList.add("navActive");
    }
});
