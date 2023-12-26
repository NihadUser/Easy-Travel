const list = document.querySelectorAll("#categoryList li");
for (let i = 0; i < list.length; i++) {
    list[i].addEventListener("click", async (e) => {
        console.log(list[i].textContent.toLocaleLowerCase());
        let urlParam = list[i].textContent.toLocaleLowerCase();
        let url = "{{route('blogs.search')}}";
        await fetch(url + "?category=" + urlParam)
            .then((res) => res.json())
            .then((items) => {
                console.log(items);
            });
    });
}
