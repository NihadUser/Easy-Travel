@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main guideMain">
    <div class="guideDetailsContainer">
        <div class="guideInfoContainer">
            <div class="singleGuideInfo">
                <div class="singleGuideImage">
                    <img src="{{asset("/images/userImgs/$guide->image")}}"
                        alt="">
                </div>
                <div class="singleGuideContent">
                    <h1>{{$guide->name}}</h1>
                    <div class="mainLocation">
                        <img src="{{asset("/images/recoloc.svg")}}" alt=""> <span>{{$guide->location}}</span>
                    </div>
                    <div>
                        <span class="guidePriceBlue">{{$guide->guides->price}}$/</span>day
                    </div>
                    <div>
                        <span class="guideLanguage-1">Language- </span><span class="guideLanguage-2">@foreach($languages as $language) {{$language}}, @endforeach</span>
                    </div>
                    <div>
                        <span class="guideLanguage-1">Available for- </span><span class="guideLanguage-2">@foreach($availble_for as $item){{$item}}, @endforeach</span>
                    </div>
                </div>
            </div>
            <div class="singleGuideAbout">
                <h2>
                    About
                </h2>
                <div class="guideABoutText">
                    <p>
                       {{$guide->guides->about}}
                    </p>
                </div>
            </div>
            <div class="commentsContainer">
                <h2>Reviews</h2>
                @include('client.clientParts.comments')
                    <div>
                        @guest
                    <a href="{{route('login')}}" class="writeCommentLink">Write Comment</a>
                        @else
                        <button id="commentWirterBtn">Write Comment</button>
                        <div class="commentDiv">
                            <div class="userComment">
                                <div class="userCommentImage">
                                    <img src="{{asset("/images/userImgs/$image")}}" alt="">
                                </div>
                                <form  action="{{route('home.comments.guideComment',['id'=>$guide->id])}}" method="POST">
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
        <div class="guideRightSide">
            <div class="guideActions">
                @guest
                <a href="{{route('login')}}" class="guideSaveLink">Book</a>
                @else
                <a href="{{route('payment.guide',['id'=>$guide->id])}}" class="guideSaveLink">Book</a>
                
                @endguest



                <a class="guideShareLink">Share</a>
            </div>
            <div>
                <h2>More Guide you may like</h2>
                <div class="recommendedGuidesContainer">
                    @foreach($guides as $guide)
                    <div class="oneGuideContainer">
                        <div class="recGuideImage">
                            <a href="{{route('home.guide',['id'=>$guide->id])}}">
                                <img src="{{asset("/images/userImgs/$guide->image")}}"
                                alt="">
                            </a>
                        </div>
                        <div class="recGuideContent">
                            <h3>
                                <a href="{{route('home.guide',['id'=>$guide->id])}}">{{$guide->name}}</a>
                            </h3>
                            <div class="mainLocation">
                                <img src="{{asset("/images/recoloc.svg")}}" alt=""> {{$guide->location}}
                            </div>
                            <div>
                                <span class="guidePriceBlue">{{$guide->guides->price}}$/</span>day
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h2>Places recommended by {{$guide->name}}</h2>
                <div class="recommendedGuidesContainer">
                    @foreach ($places as $item)
                    <div class="oneGuideContainer">
                        <div class="recGuideImage">
                           <a href="{{route('home.place',['id'=>$item->id])}}">
                            <img src="{{asset("/images/imgs/$item->image")}}"
                            alt="">
                           </a>
                        </div>
                        <div class="recGuideContent">
                            <h3>
                                <a href="{{route('home.place',['id'=>$item->id])}}">
                                    {{$item->name}}
                                </a>
                            </h3>
                            <div class="mainLocation">
                                <img src="{{asset("/images/recoloc.svg")}}" alt=""> {{$item->location}}
                            </div>
                            <div>
                                <span class="guidePriceBlue">{{$item->price}}$/</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/client/js/comment.js')}}"></script>
@include('client.clientParts.footer')
