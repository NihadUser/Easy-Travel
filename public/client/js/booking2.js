let bir = document.getElementById("bir");
let iki = document.getElementById("iki");
const bookingContainer = document.querySelector(".bookingContainer-1");
const paymentBtn = document.getElementById("paymentBtn");
let hotelContent = document.createElement("div");
hotelContent.classList.add("hotelContent-4");
const bookingPlacePrice = document.querySelector(".bookingPlacePrice");
let bookPrice = bookingPlacePrice.textContent;
let hotelPrice = Number(bookingPlacePrice.textContent);
let date1, date2, days, month, days2, month2;
const currentDate = new Date();
const day = String(currentDate.getDate()).padStart(2, "0"); // Get the day and pad with leading zero if necessary.
const ay = String(currentDate.getMonth() + 1).padStart(2, "0"); // Get the month (0-based) and add 1 to it, then pad with leading zero.
const year = currentDate.getFullYear(); // Get the full year (4 digits).

let today = `${year}-${ay}-${day}`;
console.log(today);
bir.addEventListener("change", () => {
    date1 = new Date(bir.value);
    days = date1.getDate();
    if (bir.value == today) {
        alert("Salam");
    }
    month = date1.getMonth() + 1;
});
iki.addEventListener("change", () => {
    date2 = new Date(iki.value);
    days2 = date2.getDate();
    month2 = date2.getMonth() + 1;
    if (!isNaN(date2)) {
        let totalMonths = month2 - month;
        console.log(totalMonths);
        let totalDays = days2 - days;
        console.log(totalDays);
        if (totalMonths == 1) {
            totalDays = 30 + totalDays;
            console.log(totalDays);
        }
        if (totalDays > 0 && totalMonths >= 0) {
            hotelContent.innerHTML = "";
            let discountPrice;
            let taxes;
            let totalPrice;
            let div1 = document.createElement("div");
            let div2 = document.createElement("div");
            let div3 = document.createElement("div");
            let div4 = document.createElement("div");
            let p = document.createElement("p");
            let p2 = document.createElement("p");
            let p3 = document.createElement("p");
            let p4 = document.createElement("p");
            let p5 = document.createElement("p");
            let p6 = document.createElement("p");
            let h3 = document.createElement("h3");
            let p7 = document.createElement("input");
            let hr = document.createElement("hr");
            p3.innerHTML = "Discount";
            p5.innerHTML = "Services/Taxes fee";
            h3.innerHTML = "Total";
            p.innerHTML = `${hotelPrice}*${totalDays} $`;
            let firstPrice = hotelPrice * totalDays;
            p2.innerHTML = firstPrice;

            if (firstPrice >= 0 && firstPrice < 500) {
                discountPrice = Math.random() * 50;
            } else if (firstPrice > 500 && firstPrice <= 1000) {
                discountPrice = Math.random() * 100;
            } else if (firstPrice > 1000 && firstPrice <= 2000) {
                discountPrice = Math.random() * 150;
            } else if (firstPrice > 2000 && firstPrice <= 3000) {
                discountPrice = Math.random() * 200;
            } else if (firstPrice > 3000 && firstPrice < 5000) {
                discountPrice = Math.random() * 250;
            } else {
                discountPrice = Math.random() * 300;
            }
            if (firstPrice >= 0 && firstPrice < 100) {
                taxes = 6;
            } else if (firstPrice > 100 && firstPrice <= 500) {
                taxes = 11;
            } else if (firstPrice > 500 && firstPrice <= 1000) {
                taxes = 25;
            } else if (firstPrice > 1000 && firstPrice <= 2000) {
                taxes = 35;
            } else if (firstPrice > 3000 && firstPrice < 5000) {
                taxes = 40;
            } else {
                taxes = 50;
            }
            p6.innerHTML = taxes;
            p4.innerHTML = `-${discountPrice.toFixed(1)} $`;
            p4.classList.add("bookingDiscountPrice");
            totalPrice = firstPrice - discountPrice - taxes;
            p7.value = `${totalPrice.toFixed(1)}`;
            p7.name = "totalPrice";
            p7.classList.add("totalPrice");
            paymentBtn.innerHTML = `Confrim Pay - ${totalPrice.toFixed(1)}$`;
            div1.append(p, p2);
            div2.append(p3, p4);
            div3.append(p5, p6);
            div4.append(h3, p7);
            hotelContent.append(div1, div2, div3, hr, div4);
            bookingContainer.append(hotelContent);
        } else {
            alert("Enter valid date");
        }
    }
});
