@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main guideMain">
    <div class="mainBlogContainer">
        <div class="blogLeftSide">
            <h1>Our Latest Blogs</h1>
            @foreach ($blogs as $item)
            <div class="oneBlog">
                <div class="bLogMainImage">
                    <a href="{{route('blogs.blogDetails',['id'=>$item->id])}}">
                    <img src="{{asset("/images/blogImgs/$item->image")}}"
                        alt="">
                    </a>
                </div>
                <div class="blogContent">
                    <div class="blogDateContainer">
                        <img src="{{asset('/images/date.svg')}}" alt="">
                        <span class="bolgDate">{{ $item->created_at->format('Y-m-d') }}</span>
                    </div>
                    <h1>
                        <a href="{{route('blogs.blogDetails',['id'=>$item->id])}}">
                            {{$item->name}}
                        </a>
                    </h1>
                    <div class="blogShortDescription">
                        {{$item->short_description}}
                    </div>
                    <div class="blogCommentsView">
                        <img src="{{asset('/images/comments.svg')}}" alt="">
                        <span>{{@count($item->comments)}} comments</span>
                    </div>
                </div>
            </div>
            @endforeach
            @include('client.clientParts.pagination')
        </div>
        <div class="blogRightSide">
            <div class="BlogCategoryContainer">
                <h2>Categories</h2>
                <ul id="categoryList">
                    @foreach ($category as $item)
                        <li>{{$item->name}}</li>
                    @endforeach
                </ul>
            </div>
            <h2 class="RecommendedBlogs">Recommended Blogs</h2>
            <div class="recomendedBlogContianer">
                @foreach ($recoBlogs as $item)
                <div class="recoBlogSingle">
                    <div class="blogLeftSmallImage">
                        <a href="{{route('blogs.blogDetails',['id'=>$item->id])}}">
                         <img class="recoBlogSingleImg"
                         src="{{asset("/images/blogImgs/$item->image")}}"
                         alt="">
                        </a>
                    </div>
                    <div class="recoBlogContent">
                        <a style="color:black;" href="{{route('blogs.blogDetails',['id'=>$item->id])}}">
                            <h3>{{$item->name}}</h3>
                        </a>
                        <p>{{$item->short_description}}</p>
                        <div class="blogDateContainer">
                            <img src="{{asset('/images/date.svg')}}" alt="">
                            <span class="bolgDate">{{$item->created_at->format('Y-m-d')}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    const description = document.querySelectorAll('.blogShortDescription');
    const btnMore = document.querySelectorAll(".btnMore")
    for (let i = 0; i < btnMore.length; i++) {
        btnMore[i].addEventListener("click", () => {
            description[i].classList.add("desc")
            btnMore[i].style.display = 'none'

        })
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/date-fns@2.25.0/esm/index.js"></script>
<script >
const list = document.querySelectorAll("#categoryList li");
const blogLeftSide=document.querySelector(".blogLeftSide");
for (let i = 0; i < list.length; i++) {
    list[i].addEventListener("click", async (e) => {

        let h1=document.createElement("h1")
        blogLeftSide.innerHTML='';
        h1.innerHTML=`Our ${list[i]} blogs`
        console.log(list[i].textContent.toLocaleLowerCase());
        let urlParam = list[i].textContent.toLocaleLowerCase();
        let url = "{{route('blogs.search')}}";
        await fetch(url + "?category=" + urlParam)
            .then((res) => res.json())
            .then((items) => {
                // console.log(items.data);
                items.data.map(blog=>{
                    let oneBlog=document.createElement('div')
                    oneBlog.classList.add("oneBlog");
                    let img=document.createElement("img")
                    let singleUrl='{{route('blogs.blogDetails',':id')}}';
                    singleUrl = singleUrl.replace(':id',blog.id);
                    let a=document.createElement("a")
                    a.href=singleUrl;
                    a.append(img)
                    img.src=`{{asset('/images/blogImgs/${blog.image}')}}`
                    let bLogMainImage=document.createElement('div')
                    bLogMainImage.classList.add('bLogMainImage')
                    bLogMainImage.append(a)
                    let blogContent=document.createElement("div")
                    blogContent.classList.add("blogContent")
                    let blogDateContainer=document.createElement("div")
                    blogDateContainer.classList.add("blogDateContainer")
                    let image=document.createElement("img")
                    image.setAttribute("src","{{asset('/images/date.svg')}}")
                    let span=document.createElement("span");
                    span.classList.add("bolgDate");
                    span.textContent=blog.created_at
                    blogDateContainer.append(image,span)
                    let blogName=document.createElement("h1")
                    blogName.textContent=blog.name;
                    let description=document.createElement("description")
                    description.classList.add("description")
                    description.textContent=blog.short_description
                    blogContent.append(blogDateContainer,blogName,description)
                    oneBlog.append(bLogMainImage,blogContent);
                    blogLeftSide.append(oneBlog)
                })
            });
    });
}

</script>
@include('client.clientParts.footer')
