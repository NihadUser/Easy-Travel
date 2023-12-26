const MainWebsiteSearch = document.querySelector(".MainWebsiteSearch");
const MainWebsiteSearch2 = document.querySelector(".MainWebsiteSearch2");
const MainWebsiteSearch3 = document.querySelector(".MainWebsiteSearch3");
fetch("https://restcountries.com/v2/all")
    .then((res) => res.json())
    .then((data) => {
        data.map((item) => {
            let option = document.createElement("option");
            option.textContent = item.name;
            option.setAttribute("value", item.name);
            MainWebsiteSearch.append(option);
        });
    });
fetch("https://restcountries.com/v2/all")
    .then((res) => res.json())
    .then((data) => {
        data.map((item) => {
            let option = document.createElement("option");
            option.textContent = item.name;
            option.setAttribute("value", item.name);
            MainWebsiteSearch2.append(option);
        });
    });
fetch("https://restcountries.com/v2/all")
    .then((res) => res.json())
    .then((data) => {
        data.map((item) => {
            let option = document.createElement("option");
            option.textContent = item.name;
            option.setAttribute("value", item.name);
            MainWebsiteSearch3.append(option);
        });
    });
