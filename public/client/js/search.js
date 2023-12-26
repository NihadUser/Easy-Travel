const li1 = document.querySelector(".li1");
const li2 = document.querySelector(".li2");
const li3 = document.querySelector(".li3");
const propertySearhCard = document.querySelector(".propertySearhCard");
const guideSearhCard = document.querySelector(".guideSearhCard");
const placeSearchCard = document.querySelector(".placeSearchCard");
li1.addEventListener("click", () => {
    li1.classList.add("activeList");
    placeSearchCard.classList.add("searchActive");
    if (
        propertySearhCard.classList.contains("searchActive") ||
        guideSearhCard.classList.contains("searchActive")
    ) {
        propertySearhCard.classList.remove("searchActive");
        guideSearhCard.classList.remove("searchActive");
    }
    if (
        li2.classList.contains("activeList") ||
        li3.classList.contains("activeList")
    ) {
        li2.classList.remove("activeList");
        li3.classList.remove("activeList");
    }
});

li2.addEventListener("click", () => {
    propertySearhCard.classList.add("searchActive");
    li2.classList.add("activeList");
    if (
        placeSearchCard.classList.contains("searchActive") ||
        guideSearhCard.classList.contains("searchActive")
    ) {
        placeSearchCard.classList.remove("searchActive");
        guideSearhCard.classList.remove("searchActive");
    }
    if (
        li1.classList.contains("activeList") ||
        li3.classList.contains("activeList")
    ) {
        li1.classList.remove("activeList");
        li3.classList.remove("activeList");
    }
});
li3.addEventListener("click", () => {
    li3.classList.add("activeList");
    guideSearhCard.classList.add("searchActive");
    if (
        placeSearchCard.classList.contains("searchActive") ||
        propertySearhCard.classList.contains("searchActive")
    ) {
        placeSearchCard.classList.remove("searchActive");
        propertySearhCard.classList.remove("searchActive");
    }
    if (
        li1.classList.contains("activeList") ||
        li2.classList.contains("activeList")
    ) {
        li1.classList.remove("activeList");
        li2.classList.remove("activeList");
    }
});
