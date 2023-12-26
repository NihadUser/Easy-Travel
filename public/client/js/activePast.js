const bookedItem1 = document.getElementById("bookedItem1");
const bookedItem2 = document.getElementById("bookedItem2");
const bookedItem3 = document.getElementById("bookedItem3");
const bookedItem4 = document.getElementById("bookedItem4");
const UserTourContainer = document.getElementById("UserTourContainer");
const pastUserTourContainer = document.getElementById("pastUserTourContainer");
const tourDeactivator = document.getElementById("tourDeactivator");
const tourActivator = document.getElementById("tourActivator");
const active = document.getElementById("activeTour");
const past = document.getElementById("pastTour");
active.addEventListener("click", () => {
    if (past.classList.contains("bookActive")) {
        past.classList.remove("bookActive");
    }
    active.classList.add("bookActive");
    if (bookedItem1.classList.contains("nonActive")) {
        bookedItem1.classList.remove("nonActive");
    }
    bookedItem2.classList.add("nonActive");
    if (bookedItem3.classList.contains("nonActive")) {
        bookedItem3.classList.remove("nonActive");
    }
    bookedItem4.classList.add("nonActive");
});
past.addEventListener("click", () => {
    if (active.classList.contains("bookActive")) {
        active.classList.remove("bookActive");
    }
    past.classList.add("bookActive");
    if (bookedItem2.classList.contains("nonActive")) {
        bookedItem2.classList.remove("nonActive");
    }
    bookedItem1.classList.add("nonActive");
    if (bookedItem4.classList.contains("nonActive")) {
        bookedItem4.classList.remove("nonActive");
    }
    bookedItem3.classList.add("nonActive");
});
tourActivator.addEventListener("click", () => {
    if (tourDeactivator.classList.contains("bookActive")) {
        tourDeactivator.classList.remove("bookActive");
    }
    tourActivator.classList.add("bookActive");
    if (UserTourContainer.classList.contains("nonActive")) {
        UserTourContainer.classList.remove("nonActive");
    }
    pastUserTourContainer.classList.add("nonActive");
});
tourDeactivator.addEventListener("click", () => {
    if (tourActivator.classList.contains("bookActive")) {
        tourActivator.classList.remove("bookActive");
    }
    tourDeactivator.classList.add("bookActive");
    if (pastUserTourContainer.classList.contains("nonActive")) {
        pastUserTourContainer.classList.remove("nonActive");
    }
    UserTourContainer.classList.add("nonActive");
});
