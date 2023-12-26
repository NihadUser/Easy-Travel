const nav = document.querySelector("nav");

window.addEventListener("scroll", () => {
    if (window.scrollY > 400) {
        nav.classList.add("navScroll");
    } else {
        nav.classList.remove("navScroll");
    }
});
// Wait for the page to fully load
window.addEventListener("load", function () {
    // Define the button element
    const scrollButton = document.getElementById("scrollBtn");

    // Show the button after 3 seconds
    // setTimeout(function () {
    //     scrollButton.style.display = "block";
    // }, 3000);

    // Scroll to the top smoothly when the button is clicked
    scrollButton.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });

    // Hide the button when scrolling back to the top
    window.addEventListener("scroll", function () {
        if (window.scrollY < 300) {
            scrollButton.style.display = "none";
        } else {
            scrollButton.style.display = "block";
        }
    });
});
