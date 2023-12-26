let span1 = document.getElementById("increasingSpan1");
let span2 = document.getElementById("increasingSpan2");
let span3 = document.getElementById("increasingSpan3");
const firstH1 = document.querySelector(".aboutMain-1 h1");
let main31 = document.querySelectorAll(".main-3-1");
const firstSpan = document.querySelector(".aboutMain-1 span ");
const content1 = document.querySelector(".main-2-content-1");
const content2 = document.querySelector(".main-2-content-2");
const stafs = document.querySelectorAll(".staffs");
window.addEventListener("load", () => {
  firstH1.classList.add("aboutFirstText");
  firstSpan.classList.add("aboutFirstText");
});

let counter = 0;
let counter2 = 0;
let counter3 = 0;
let isScrolling = false;
let isScrolling2 = false;
let isScrolling3 = false;

function updateCounter2() {
  span2.innerHTML = counter2;
  counter2++;

  if (counter2 <= 30 && isScrolling2) {
    requestAnimationFrame(updateCounter2);
  }
}
function updateCounter3() {
  span3.innerHTML = counter3;
  counter3++;

  if (counter3 <= 60 && isScrolling3) {
    requestAnimationFrame(updateCounter3);
  }
}

function updateCounter() {
  span1.innerHTML = counter;
  counter++;

  if (counter <= 300 && isScrolling) {
    requestAnimationFrame(updateCounter);
  }
}

window.addEventListener("scroll", () => {
  if (window.scrollY >= 400 && !isScrolling) {
    isScrolling = true;
    requestAnimationFrame(updateCounter);
  } else if (window.scrollY < 400 && !isScrolling) {
    isScrolling = false;
  }
  if (window.scrollY >= 650 && !isScrolling2) {
    isScrolling2 = true;
    requestAnimationFrame(updateCounter2);
  } else if (window.scrollY < 650 && !isScrolling2) {
    isScrolling2 = false;
  }
  if (window.scrollY >= 650 && !isScrolling3) {
    isScrolling3 = true;
    requestAnimationFrame(updateCounter3);
  } else if (window.scrollY < 650 && !isScrolling3) {
    isScrolling3 = false;
  }
  if (window.scrollY > 150) {
    content1.classList.add("xScroll");
    content2.classList.add("yScroll");
  }
  if (window.scrollY > 200) {
  }
  if (window.scrollY > 830) {
    for (let i = 0; i < main31.length; i++) {
      main31[i].classList.add("marginNone");
    }
  }
  if (window.scrollY > 1200) {
    for (let i = 0; i < 3; i++) {
      stafs[i].classList.add("stafActive");
    }
  }
});
