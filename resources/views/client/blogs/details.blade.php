@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main blogMain">
    <div class="blogDetailsContainer">
            <div class="singleBlogMain">
                <img src="{{asset("/images/blogImgs/$blog->image")}}" alt="">
                <div class="singleBlogInfo">
                    <h1>{{$blog->name}}</h1>
                    <div>
                        <span>
                            <i class="fa-solid fa-user"></i>
                            {{$blog->author->name}}
                        </span>
                        <span>
                            <i class="fa-regular fa-clock"></i>
                            {{ $blog->created_at->format('Y-m-d') }}
                        </span>
                        <span>
                            <i class="fa-solid fa-comment"></i>
                            comments
                        </span>
                    </div>
                </div>
            </div>
            <div class="postContent">
                <p>
                    {{$blog->description}}
                </p>
            </div>
            <div class="commentsContainerBlog">
                <h2>Reviews</h2>
                <div class="commentsBlog">
                    @foreach ($comments as $item)
                    <div class="oneCommentBlog">
                        <div class="commentUserImageBlog">
                            <img src="{{asset("/images/userImgs/".$item->users->image)}}"
                                alt="">
                        </div>
                        <div class="placeCommentsContent">
                            <h3>{{$item->users->name}}</h3>
                            <p>{{$item->body}}</p>
                        </div>
                    </div>
                    @endforeach
                    <div>
                        @guest
                    <a href="{{route('login')}}" class="writeCommentLink writeCommentLink-2">Write Comment</a>
                        @else
                        <button id="commentWirterBtn">Write Comment</button>
                        <div class="commentDiv">
                            <div class="userComment">
                                <div class="userCommentImage">
                                    <img src="{{asset("/images/userImgs/$image")}}" alt="">
                                </div>
                                <form  action="{{route('home.comments.blogComment',['id'=>$blog->id])}}" method="POST">
                                    @csrf
                                    <input class="commentInput" placeholder="Write comment..." type="text" name="comment">
                                    <button type="submit">Done</button>
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
    </div>        
</div>
<script src="{{asset('/client/js/comment.js')}}"></script>
@include('client.clientParts.footer')
